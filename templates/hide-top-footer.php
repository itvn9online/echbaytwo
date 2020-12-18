<?php
/*
Template Name: Hide top, footer
*/
$act = basename(__FILE__, '.php'); // do not remove this code


//
function EBE_wgr_demo_register_scripts () {
	$d = __DIR__ . '/';
	
	wp_register_style( 'hide-top-footer', str_replace( ABSPATH, web_link, $d ) . 'hide-top-footer.css', array(), filemtime( $d . 'hide-top-footer.css' ) );
	
	wp_enqueue_style('hide-top-footer');
}

add_filter( 'wp_enqueue_scripts', 'EBE_wgr_demo_register_scripts' );

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
