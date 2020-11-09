<?php
/*
Template Name: For Widget Shortcode
*/
$act = basename(__FILE__, '.php'); // do not remove this code

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_top.php'; // do not remove this code

/*
* BEGIN Custom code
*/
?>

<h1 class="page-details-title"><?php echo $trv_h1_tieude; ?></h1>
<div class="img-max-width l19 for-widget-shortcode">
	<?php
the_post();
the_content();
?>
</div>
<?php
/*
* END Custom code
*/

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_footer.php'; // do not remove this code

