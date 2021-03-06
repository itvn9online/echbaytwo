<?php

/*
 * Thiết lập đường dẫn tới các thư mục code
 */
define( 'EB_THEME_URL', __DIR__ . '/' );
//echo 'EB_THEME_URL: ' . EB_THEME_URL . '<br>';

define( 'EB_THEME_PLUGIN_INDEX', dirname( dirname( EB_THEME_URL ) ) . '/echbaydotcom/' );
//echo 'EB_THEME_PLUGIN_INDEX: ' . EB_THEME_PLUGIN_INDEX . '<br>';

// download echbaydotcom plugin if not exist
//if ( ! is_dir( EB_THEME_PLUGIN_INDEX ) ) {
if ( !file_exists( EB_THEME_PLUGIN_INDEX . 'index.php' ) ) {
    include EB_THEME_URL . 'install.php';
} else {
    //echo __FILE__ . '<br>' . "\n";
    include_once EB_THEME_PLUGIN_INDEX . 'index.php';
}