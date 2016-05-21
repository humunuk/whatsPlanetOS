<?php

/**
 * Created by PhpStorm.
 * User: humunuk
 * Date: 5/21/16
 * Time: 11:21 AM
 */
class PlanetOsWrapperTest extends TestCase {

    public function testHasConnnection() {
        $service = new \App\Services\PlanetOsApiWrapper();
        $key = $service->getDataset("noaa_ww3_global_1.25x1d", "-50.5", "49.5");
        \Illuminate\Support\Facades\Log::debug($key);
    }

}