<?php
/*
Template Name: For Elementor 1024px
Description: Page template for Elementor Page Builder plugin (width and max-width 999px)
*/

// trang nào cho phép cache thì thêm dòng này
define( 'HAS_USING_EBCACHE', true );

//
$act = basename(__FILE__, '.php'); // do not remove this code

// fixed size for page
$__cf_row['cf_custom_page_width_main'] = 'w99'; // do not remove this code

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_top.php'; // do not remove this code

/*
* BEGIN Custom code
*/
the_post();
the_content();
/*
* END Custom code
*/

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_footer.php'; // do not remove this code
