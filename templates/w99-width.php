<?php
/*
Template Name: Table size (999px)
*/
$act = basename(__FILE__, '.php'); // do not remove this code

// fixed size for page
$__cf_row['cf_custom_page_width_main'] = 'w99'; // do not remove this code

//
include EB_THEME_PLUGIN_INDEX . 'global/page_templates_top.php'; // do not remove this code

/*
* BEGIN Custom code
*/
?>

<h1 class="page-details-title"><?php echo $trv_h1_tieude; ?></h1>
<div class="img-max-width l19 page-details-content ul-default-style">
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

