<?php
/**
 * Created by PhpStorm.
 * User: humunuk
 * Date: 5/22/16
 * Time: 1:34 PM
 */

namespace PlanetOsApi;


class Dataset {

    public $name;
    public $title;
    public $abstract;
    public $updateFrequency;
    public $refreshed;
    public $resource;
    public $extentStart;
    public $extentEnd;
    public $verticalExtent;
    public $variables;

    public function __construct($apiName) {
        $this->name = $apiName;
        $this->getInfo();
    }

    private function getInfo() {
        $service = new PlanetOsApiWrapper();
        $info = $service->getDataset($this->name);
        $this->setProperties($info);
    }

    private function setProperties($info) {
        $info = json_decode($info->getBody()->getContents(), true);

        foreach ($info as $item => $value) {
            switch ($item) {
                case "Title":
                    $this->title = $value;
                    break;
                case "Abstract":
                    $this->abstract = $value;
                    break;
                case "UpdateFrequency":
                    $this->updateFrequency = $value;
                    break;
                case "Refreshed":
                    $this->refreshed = $value;
                    break;
                case "VerticalExtent":
                    $this->verticalExtent = $value;
                    break;
                case "TemporalExtentStart":
                    $this->extentStart = $value;
                    break;
                case "TemporalExtentEnd":
                    $this->extentEnd = $value;
                    break;
                case "OnlineResource":
                    $this->resource = $value;
                    break;
                case "Variables":
                    $this->variables = $value;
                    break;
            }
        }

    }
}