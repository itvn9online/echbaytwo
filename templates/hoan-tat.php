<?php
/*
Template Name: WGR Booking done
Description: Sử dụng khi muốn tùy chỉnh URL trang liên hệ hoặc sử dụng các công cụ SEO khác
*/
$act = basename(__FILE__, '.php'); // do not remove this code

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

// get custom content
$main_content = ob_get_contents();

//
ob_end_clean();
//echo $main_content;



//
include EB_THEME_PLUGIN_INDEX . 'global/hoan-tat.php'; // do not remove this code




ob_start();


//
echo $main_content;


//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_footer.php'; // do not remove this code
