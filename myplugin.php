<?php

/**
* Plugin Name: My Plugin
* Description: Show a users list in a custom endpoint
* Version: 1.0.0
* License: GPLv2
* Text Domain: My-plugin
* Author: Carina Ormeno
* Author URI: https://github.com/carinaor
*/

declare(strict_types=1);
namespace main;

define('MYPLUGIN_DIR', plugin_dir_path(__FILE__));
defined('ABSPATH') or die();

require MYPLUGIN_DIR . 'src/Settings.php';
require MYPLUGIN_DIR . 'src/Request.php';
//require MYPLUGIN_DIR . 'class.my-plugin.php';


class MyPlugin
{
    function __constructor(){
        add_filter( 'my_plugin', [ $this, 'MyPlugin' ] );
    }

    public function activate()
    {
        $settings = new Settings();
        $pageurl = $settings->getUrl();

        if ($pageurl === "") {
            $pageurl = $settings->saveUrl("my-lovely-users-table");
        }
    }

    public function disactivate()
    {
        flush_rewrite_rules();
    }

    public function createMenuItem()
    {
        add_menu_page(
            'My Plugin',
            'My Plugin',
            'manage_options',
            MYPLUGIN_DIR . 'views/admin.php',
            null,
            '',
            '1'
        );
    }

    public function createAppPage()
    {
        $settings = new Settings();
        $url = $settings->getUrl();

        switch (get_query_var('name', '')) {
            case $url:
                include('views/page.php');
                exit;
        }
    }
}

//security

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

register_activation_hook(__FILE__, ['main\MyPlugin', 'activate']);
register_deactivation_hook(__FILE__, ['main\MyPlugin', 'disactivate']);

add_action('admin_menu', ['main\MyPlugin', 'createMenuItem']);
add_action('template_redirect', ['main\MyPlugin', 'createAppPage']);
