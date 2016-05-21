<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class PlanetOsApiWrapper {
    
    private $apiKey;
    private $url;

    public function __construct() {
        $this->apiKey = Config::get('custom.planetOsApiKey');
        $this->url = "http://api.planetos.com/v1/datasets/";
        $this->client = new Client();
    }

    public function getDataset($dataset, $longitude, $latitude) {
        $fullUrl = $this->url . "$dataset/" . "point?lon=".$longitude."&"."lat=".$latitude."&apikey=".$this->apiKey;
        $result = $this->client->request("GET", $fullUrl);

        return $result->getBody();
    }

}