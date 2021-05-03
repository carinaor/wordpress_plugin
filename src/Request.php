<?php

declare(strict_types=1);
namespace main;

defined('ABSPATH') or die();

class Request
{
    private $endpoint;
    public function __construct($endp)
    {
        $this->endpoint = $endp;
    }

    public function getData()
    {
        $data = get_transient('users_list');

        try {
            if ($data === false) {
                $jsonData = file_get_contents($this->endpoint);
                $data = json_decode($jsonData);
                set_transient('users_list', $data, 3600 * 24);
            }

            return $data;
        } catch (Exception $ex) {
            return "";
        }
        //var_dump($response_data);
        //$data = $response_data->data;
    }

    public function getJsonData($id)
    {
        try {
            if (!$jsonData = wp_cache_get($id, 'getJsonData')) {
                $jsonData = file_get_contents($this->endpoint . "/" . $id);
                wp_cache_add($id, $jsonData, 'getJsonData');
            }
            return $jsonData;
        } catch (Exception $ex) {
            return "";
        }
    }
}
