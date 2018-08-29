<?php


// lấy danh sách các file trong thư mục giải nén
function EBE_get_list_file_install_echbay_core ( $dir, $arr_dir = array(), $arr_file = array() ) {
	
	if ( substr( $dir, -1 ) == '/' ) {
		$dir = substr( $dir, 0, -1 );
	}
	
	$arr = glob ( $dir . '/*' );
//	$arr = EBE_get_file_in_folder ( $dir . '/' );
//	print_r( $arr );
	
	//
	foreach ( $arr as $v ) {
		if ( is_dir( $v ) ) {
			$arr_dir[] = $v;
			
			$a = EBE_get_list_file_install_echbay_core( $v, $arr_dir, $arr_file );
			$arr_dir += $a[0];
			$arr_file += $a[1];
		}
		else if ( is_file( $v ) ) {
			$arr_file[] = $v;
		}
	}
	
	return array(
		$arr_dir,
		$arr_file
	);
}


// tạo thư mục lưu file nén để còn xử lý
function EBE_install_get_dir_upload_and_save () {
	// Download path
	$a = wp_upload_dir();
//	print_r( $a );
	
	//
	$d = $a['basedir'] . '/ebcache';
	//echo $dir_for_save_file . '<br>' . "\n";
	if ( ! is_dir( $d ) ) {
		if ( ! mkdir($d, 0777) ) {
			echo '<!-- ERROR create dir cache: ' . $d . ' -->';
			return false;
		}
		chmod($d, 0777) or die('ERROR chmod dir: ' . $d);
	}
	
	return $d;
}


//
function EBE_install_download_and_save_file (
	// tên file sẽ lưu trữ
	$destination_path,
	// thư mục lưu file
	$dir_for_save_file,
	// url download
	$url,
	// url download dự phòng trong trường hợp url 1 lỗi
	$url2 = ''
) {
	
	if ( ! file_exists( $destination_path ) ) {
		
		// download in github (recommendation)
		if ( copy( $url, $destination_path ) ) {
		}
		// or download in echbay server
		else if ( $url2 != '' && copy( $url2, $destination_path ) ) {
		}
		else {
			die('Could not download file for unzip!');
		}
		chmod( $destination_path, 0777 );
		
	}
	
	// re-check file download
	if ( ! file_exists( $destination_path ) ) {
		die('<h1>ERROR! download plugin echbaydotcom</h1>');
	}
	
	// kết quả giải nén
	$unzipfile = false;
	
	// using zip by php
	if ( class_exists( 'ZipArchive' ) ) {
		echo '<div>Using: <strong>ZipArchive</strong></div>'; 
		
		$zip = new ZipArchive;
		if ($zip->open( $destination_path ) === TRUE) {
			$zip->extractTo( $dir_for_save_file );
			$zip->close();
			
			// unzip done
			$unzipfile = true;
		}
	}
	// using unzip by wordpress
	else if ( function_exists('unzip_file') ) {
		echo '<div>Using: <strong>unzip_file (wordpress)</strong></div>'; 
		
		$unzipfile = unzip_file( $destination_path, $dir_for_save_file );
	}
	else {
		die('<div style="color:#f00;">Function or class unzip not exist. Check file in <strong>' . $destination_path . '</strong> and manual unzip.</div>');
	}
	
	//
	if ( $unzipfile == true ) {
		echo '<div>Unzip to: <strong>' . $dir_for_save_file . '</strong></div>'; 
	} else {
		echo '<div>Do not unzip file, update faild!</div>';
	}
	
	// remove file zip after unzip
	if ( unlink( $destination_path ) ) {
		echo '<div>Remove zip file for re-download!</div>';
	}
	
	//
	return $unzipfile;
	
}




