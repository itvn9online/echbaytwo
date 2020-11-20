<?php
/*
Template Name: For Widget Shortcode
*/
$act = basename( __FILE__, '.php' ); // do not remove this code

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_top.php'; // do not remove this code

// tách chức năng kiểm tra category in list ra đây để gọi cho đỡ bị trùng lặp
include_once EB_THEME_PLUGIN_INDEX . 'common_category_list.php';


/*
 * BEGIN Custom code
 */
?>
<div class="main-widget-shortcode">
	<h1 class="page-details-title"><?php echo $trv_h1_tieude; ?></h1>
	<div class="img-max-width l19 for-widget-shortcode">
		<?php
		the_post();
		the_content();
		?>
	</div>
</div>
<?php
/*
 * END Custom code
 */

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_footer.php'; // do not remove this code
