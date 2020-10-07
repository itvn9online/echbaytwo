<?php
/*
* Download echbaydotcom plugin in github
* Download URL: https://github.com/itvn9online/echbaydotcom/archive/master.zip
*/




include EB_THEME_URL . 'install_function.php';





function WGR_install_load_form_get_ftp_account( $ftp_server, $ftp_user_name, $ftp_user_pass, $error_text = 'Set FTP account!' ) {
	
?>
<style>
.ftp-div {
	width: 90%;
	max-width: 500px;
	margin: 25px auto 50px auto;
	box-shadow: 0 0 10px #ccc;
	border: 1px #ccc solid;
	padding: 15px 25px;
}
.ftp-div table { }
.ftp-div tr td:first-child { font-weight: bold; }
.ftp-div td { padding: 12px 6px; }
.ftp-div input[type="text"] {
	padding: 5px 6px;
	width: 90%;
}
.ftp-div button {
	cursor: pointer;
	padding: 10px 20px;
}
</style>
<h1>
	<center>
		<?php echo $error_text; ?>
	</center>
</h1>
<div class="ftp-div">
	<form name="frm_get_ftp_account" method="get">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td>FTP Host</td>
				<td><input type="text" name="ftp_host" value="<?php echo $ftp_server; ?>" /></td>
			</tr>
			<tr>
				<td>FTP User</td>
				<td><input type="text" name="ftp_user" value="<?php echo $ftp_user_name; ?>" /></td>
			</tr>
			<tr>
				<td>FTP Password</td>
				<td><input type="text" name="ftp_pass" value="" placeholder="<?php echo $ftp_user_pass; ?>" /></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><button type="submit">Download and Install Echbaydotcom plugin</button></td>
			</tr>
		</table>
	</form>
</div>
<?php

	exit();
}



function WGR_install_sync_path_for_download ( $a, $b ) {
//	echo '<strong>' . $a . '</strong><br>' . "\n";
	$a = str_replace( '/echbaydotcom/echbaydotcom-master/', '/', $a );
	$a = str_replace( '/echbaydotcom-master/', '/', $a );
//	echo $a . '<br>' . "\n";
	$a = str_replace( $b . '/', EB_THEME_PLUGIN_INDEX, $a );
//	echo $a . '<br>' . "\n";
	
	return $a;
}


// URL download
$url_for_download_ebdotcom = 'https://github.com/itvn9online/echbaydotcom/archive/master.zip';
//echo $url_for_download_ebdotcom . '<br>' . "\n";

// URL download (server 2)
$url2_for_download_ebdotcom = 'http://api.echbay.com/daoloat/echbaydotcom.zip';

// Save to
$dir_for_save_file = EBE_install_get_dir_upload_and_save();
$dir_for_save_dir = $dir_for_save_file . '/echbaydotcom';
$dir_for_save_master_dir = $dir_for_save_dir . '-master';

// Save path
$destination_path = $dir_for_save_file . '/echbaydotcom.zip';
//echo $destination_path . '<br>' . "\n";
	
// check if dir unzip exist -> cancel
if ( is_dir( $dir_for_save_dir ) || is_dir( $dir_for_save_master_dir ) ) {
}
// or download and unzip file
else {
	
	// download if file not exist
	EBE_install_download_and_save_file( $destination_path, $dir_for_save_file, $url_for_download_ebdotcom, $url2_for_download_ebdotcom );
	
}

// re-check dir unzip
// automatic unzip -> trường hợp file download được unzip tự động
if ( is_dir( $dir_for_save_master_dir ) ) {
	$dir_for_save_dir = $dir_for_save_master_dir;
}
// manual unzip -> trường hợp lỗi không unzip được, và đã unzip thủ công
else if ( is_dir( $dir_for_save_dir ) ) {
	chmod($dir_for_save_dir, 0777) or die('ERROR chmod dir: ' . $dir_for_save_dir);
	
	$dir_for_save_dir = $dir_for_save_dir . '/echbaydotcom-master';
}
// ERROR unzip
else {
	die('<h1>ERROR! unzip to ' . $dir_for_save_master_dir . ' or ' . $dir_for_save_dir . '</h1>');
}
chmod($dir_for_save_dir, 0777) or die('ERROR chmod dir: ' . $dir_for_save_dir);

echo 'Unzip in: <strong>' .$dir_for_save_dir . '</strong><br>' . "\n";

// Thư mục sau khi download và giải nén file zip
$dir_source_update = $dir_for_save_dir . '/';
//echo $dir_source_update . '<br>' . "\n";

// remove github file
if ( file_exists( $dir_source_update . '.gitattributes' ) ) {
	unlink($dir_source_update . '.gitattributes') or die('ERROR unlink file: ' . $dir_source_update . '.gitattributes');
}

//exit();





// lấy danh sách file và thư mục (thư mục mới)
$a = EBE_get_list_file_install_echbay_core( $dir_source_update );
$list_dir_for_update_eb_core = $a[0];
$list_file_for_update_eb_core = $a[1];
//print_r( $list_dir_for_update_eb_core );
//print_r( $list_file_for_update_eb_core );
//exit();

// set permission 777 for all file and folder
foreach ( $list_dir_for_update_eb_core as $v ) {
	chmod($v, 0777) or die('ERROR chmod dir: ' . $v);
}
foreach ( $list_file_for_update_eb_core as $v ) {
	chmod($v, 0777) or die('ERROR chmod file: ' . $v);
}


//
$install_via_ftp_with_php = false;



// if create dir with php -> create now
//if ( 1 == 1 ) {
//if ( 1 == 2 ) {
if ( mkdir(EB_THEME_PLUGIN_INDEX, 0755) ) {
	// server window ko cần chmod
	chmod(EB_THEME_PLUGIN_INDEX, 0755) or die('ERROR chmod dir: ' . EB_THEME_PLUGIN_INDEX);
	
	
	// install directory
	foreach ( $list_dir_for_update_eb_core as $v ) {
		$v = WGR_install_sync_path_for_download( $v, $dir_for_save_file );
		
		if ( ! is_dir( $v ) ) {
			if ( mkdir($v, 0755) ) {
				// server window ko cần chmod
				chmod($v, 0755) or die('ERROR chmod dir: ' . $v);
			}
			else {
				die('ERROR create dir: ' . $v);
			}
		}
		else {
			echo 'dir exist <strong>' . $v . '</strong><br>' . "\n";
		}
	}
	
	
}
// or using ftp account for create dir
else {
	
	// get ftp accountin config
//	$ftp_server = $_SERVER['HTTP_HOST'];
	$ftp_server = $_SERVER['SERVER_ADDR'];
	if ( isset( $_GET['ftp_host'] ) ) {
		$ftp_server = $_GET['ftp_host'];
	}
	else if ( defined('FTP_HOST') ) {
		$ftp_server = FTP_HOST;
	}
//	echo $ftp_server . '<br>' . "\n";
	
	//
	$ftp_user_name = '';
	if ( isset( $_GET['ftp_user'] ) ) {
		$ftp_user_name = $_GET['ftp_user'];
	}
	else if ( defined('FTP_USER') ) {
		$ftp_user_name = FTP_USER;
	}
	
	$ftp_user_pass = '';
	if ( isset( $_GET['ftp_pass'] ) ) {
		$ftp_user_pass = $_GET['ftp_pass'];
	}
	else if ( defined('FTP_PASS') ) {
		$ftp_user_pass = FTP_PASS;
	}
	
	// show form get ftp account if not parameter
	if ( $ftp_server == '' || $ftp_user_name == '' || $ftp_user_pass == '' ) {
		WGR_install_load_form_get_ftp_account( $ftp_server, $ftp_user_name, $ftp_user_pass );
	}
	
	
	//
	$conn_id = ftp_connect($ftp_server);
	if ( ! $conn_id ) {
		WGR_install_load_form_get_ftp_account( $ftp_server, $ftp_user_name, $ftp_user_pass, 'ERROR FTP connect to server' );
	}
	
	//
	if ( ! ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) ) {
		WGR_install_load_form_get_ftp_account( $ftp_server, $ftp_user_name, $ftp_user_pass, 'ERROR FTP login to server' );
	}
	
	// cache file for get ftp root dir
	$cache_for_ftp = $dir_for_save_file . '/cache_for_ftp.txt';
//	echo $cache_for_ftp . '<br>' . "\n";
	
	if ( ! file_exists( $cache_for_ftp ) ) {
		$filew = fopen( $cache_for_ftp, 'x+' );
		if ( ! $filew ) {
			die('ERROR create file and get FTP root dir');
		}
		else {
			// nhớ set 777 cho file
			chmod($cache_for_ftp, 0777);
		}
		fclose($filew);
		
		//
		file_put_contents( $cache_for_ftp, date( 'r', time() ) );
	}
	$check_ftp_root_dir = explode( '/', $cache_for_ftp );
//	print_r ( $check_ftp_root_dir );
	
	//
	$ftp_dir_root = '';
	foreach ( $check_ftp_root_dir as $v ) {
//		echo $v . "\n";
		if ( $ftp_dir_root == '' && $v != '' ) {
			$file_test = strstr( $cache_for_ftp, '/' . $v . '/' );
//			echo $file_test . " - \n";
			
			//
			if ( $file_test != '' ) {
				if ( ftp_nlist($conn_id, '.' . $file_test) != false ) {
					$ftp_dir_root = $v;
					break;
				}
			}
		}
	}
	echo 'FTP root dir: <strong>' . $ftp_dir_root . '</strong><br><br>' . "\n";
	
	
	// install directory
	$create_dir = '.' . strstr( EB_THEME_PLUGIN_INDEX, '/' . $ftp_dir_root . '/' );
	echo '<strong>Create dir:</strong> ' . $create_dir . '<br>' . "\n";
	if ( ftp_mkdir($conn_id, $create_dir) ) {
		ftp_chmod($conn_id, 0777, $create_dir);
	}
	else {
		die('ERROR FTP create dir: ' . $create_dir);
	}
	
	//
	foreach ( $list_dir_for_update_eb_core as $v ) {
		$v = WGR_install_sync_path_for_download( $v, $dir_for_save_file );
		
		if ( ! is_dir( $v ) ) {
			$create_dir = '.' . strstr( $v, '/' . $ftp_dir_root . '/' );
			echo '<strong>Create dir:</strong> ' . $create_dir . '<br>' . "\n";
			if ( ftp_mkdir($conn_id, $create_dir) ) {
				ftp_chmod($conn_id, 0777, $create_dir);
			}
			else {
				die('ERROR FTP create dir: ' . $create_dir);
			}
		}
		else {
			echo 'dir exist <strong>' . $v . '</strong><br>' . "\n";
		}
	}
	
	
	
	
	// close via install_via_ftp_with_php
//	ftp_close($conn_id);
	
	
	//
	$install_via_ftp_with_php = true;
	
}
//exit();


// install file -> chạy lại lần nữa cho chắc ăn -> trường hợp sử dụng FTP ở trên bị lỗi
foreach ( $list_file_for_update_eb_core as $v ) {
	$v2 = WGR_install_sync_path_for_download( $v, $dir_for_save_file );
	
	//
	if ( ! file_exists( $v2 ) && file_exists( $v ) ) {
		if ( copy( $v, $v2 ) ) {
			// server window ko cần chmod
			chmod($v2, 0644) or die('ERROR chmod file: ' . $v2);
		}
		else {
			die('ERROR copy file: ' . $v2);
		}
	}
	else {
		echo 'file exist <em>' . $v2 . '</em><br>' . "\n";
	}
}





// chmod dir to 0755 if using ftp
if ( $install_via_ftp_with_php == true ) {
	
	//
	foreach ( $list_dir_for_update_eb_core as $v ) {
		$v = WGR_install_sync_path_for_download( $v, $dir_for_save_file );
		
		if ( is_dir( $v ) ) {
			$create_dir = '.' . strstr( $v, '/' . $ftp_dir_root . '/' );
			ftp_chmod($conn_id, 0755, $create_dir);
		}
	}
	
	//
	$create_dir = '.' . strstr( EB_THEME_PLUGIN_INDEX, '/' . $ftp_dir_root . '/' );
	echo '<strong>Create dir:</strong> ' . $create_dir . '<br>' . "\n";
	ftp_chmod($conn_id, 0755, $create_dir);
	
	
	//
	ftp_close($conn_id);
}





// remove file and folder after install
foreach ( $list_file_for_update_eb_core as $v ) {
	unlink($v) or die('ERROR unlink file: ' . $v);
}
$list_dir_for_update_eb_core = array_reverse( $list_dir_for_update_eb_core );
foreach ( $list_dir_for_update_eb_core as $v ) {
	rmdir($v) or die('ERROR rmdir dir: ' . $v);
}

// remove root unzip
rmdir($dir_source_update) or die('ERROR rmdir dir: ' . $dir_source_update);

// root unzip inlocalhost and using manual unzip
$dir_for_localhost_unzip = $dir_for_save_file . '/echbaydotcom';
if ( is_dir( $dir_for_localhost_unzip ) ) {
	rmdir($dir_for_localhost_unzip) or die('ERROR rmdir dir: ' . $dir_for_localhost_unzip);
}



echo '<h1>All done ^^!</h1>';





