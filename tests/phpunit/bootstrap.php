<?php

define( 'PLUGIN_PHPUNIT', true );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', sys_get_temp_dir() );
}

if ( ! defined( 'PLUGIN_ABSPATH' ) ) {
	define( 'PLUGIN_ABSPATH', sys_get_temp_dir() . '/wp-content/plugins/my-plugin/' );
	//define('PLUGIN_DIR', plugin_dir_path(__FILE__));
}

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/inc/PluginTestCase.php';