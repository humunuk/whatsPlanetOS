<?php

namespace PlanetOsApi;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Config;

class PlanetOsApiWrapper {
    
    private $apiKey;
    private $url;

    public function __construct() {
        $this->apiKey = Config::get('custom.planetOsApiKey');
        $this->url = "http://api.planetos.com/v1/datasets/";
        $this->client = new Client();
    }

    public function getPointDataset($dataset, $latitude, $longitude, $count = 1, $z = 'first') {
        $fullUrl = $this->url . "$dataset/" . "point?lon=".$longitude."&"."lat=".$latitude."&count=".$count."&z=".$z."&apikey=".$this->apiKey;
        $result = $this->client->request("GET", $fullUrl);
        $result = json_decode($result->getBody()->getContents(), true);

        return $result;
    }

    public function getDataset($dataset) {
        $fullUrl = $this->url . "$dataset?apikey=".$this->apiKey;
        $result = $this->client->request("GET", $fullUrl);

        return $result;
    }

}