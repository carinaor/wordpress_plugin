<?php

declare(strict_types=1);
namespace main;

defined('ABSPATH') or die();

class Settings
{
    private $endpoint;
    private $db;

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        //$this->DEFAULT_ENDPOINT = "my-lovely-users-table";
        $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}plugin_settings` (
            `id` int(11) NOT NULL,
            `url_endpoint` varchar(250) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $wpdb->query($sql);
    }

    public function saveUrl($url = "my-lovely-users-table")
    {
        $this->endpoint = $url;

        $sql = "INSERT `{$this->db->prefix}plugin_settings`(`id`, `url_endpoint`) VALUES (1,'{$url}');";
        $this->db->query($sql);

        set_transient('url_cache', $this->endpoint, 3600 * 24);

        return $this->endpoint;
    }

    public function getUrl()
    {
        $url = get_transient('url_cache');

        if ($url === false) {
            $sql = "SELECT url_endpoint FROM `{$this->db->prefix}plugin_settings` LIMIT 1";
            $data = $this->db->get_results($sql, ARRAY_A);
            //set_transient('url_cache', $data, 3600 * 24);

            if (empty($data)) {
                //echo "empty";
                $this->endpoint = "";
            } else {
                //echo "url";
                foreach ($data as $key => $value) {
                    $this->endpoint = $value["url_endpoint"];
                }
                //echo "no cached";
                set_transient('url_cache', $this->endpoint, 3600 * 24);
            }
        } else {
            //echo "cached";
            //var_dump($url);
            //echo $url;
            $this->endpoint = $url;
        }

        return $this->endpoint;
    }

    public function setUrl($url)
    {
        $this->endpoint = $url;

        $sql = "UPDATE `{$this->db->prefix}plugin_settings` SET url_endpoint='{$url}' WHERE id = 1 ";
        $this->db->query($sql);
        set_transient('url_cache', $this->endpoint, 3600 * 24);
        return $this->endpoint;
    }
}
