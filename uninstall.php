<?php

declare(strict_types=1);

namespace MyPlugin;

if (!defined("WP_UNINSTALL_PLUGIN")) {
    die;
}

//Unistall
//Clean transient cache
delete_transient('url_cache');
delete_transient('users_list');
//Clean DB
global $wpdb;
$wpdb->query($wpdb->prepare("DROP TABLE `%dplugin_settings`", $wpdb->prefix));
