<?php
/*
Template Name: Landing page
*/
$act = basename(__FILE__, '.php'); // do not remove this code

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_top.php'; // do not remove this code

/*
* BEGIN Custom code
*/
?>
<h1><?php echo $post->post_title; ?></h1>
<?php
/*
* END Custom code
*/

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_footer.php'; // do not remove this code
