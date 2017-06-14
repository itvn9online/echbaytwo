<?php

/*
* Thiết lập đường dẫn tới các thư mục code
*/
define( 'EB_THEME_URL', dirname( __FILE__ ) . '/' );
//echo 'EB_THEME_URL: ' . EB_THEME_URL . '<br>';

define( 'EB_THEME_PLUGIN_INDEX', dirname ( dirname ( EB_THEME_URL ) ) . '/echbaydotcom/' );
//echo 'EB_THEME_PLUGIN_INDEX: ' . EB_THEME_PLUGIN_INDEX . '<br>';

//
include_once EB_THEME_PLUGIN_INDEX . 'index.php';
