<?php
/*
Template Name: For Elementor
Description: Page template for Elementor Page Builder plugin (full size)
*/

// trang nào cho phép cache thì thêm dòng này
define( 'HAS_USING_EBCACHE', true );

//
$act = basename( __FILE__, '.php' ); // do not remove this code

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