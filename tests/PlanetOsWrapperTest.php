<?php
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: humunuk
 * Date: 5/21/16
 * Time: 11:21 AM
 */
class PlanetOsWrapperTest extends TestCase {

    public function testHasConnnection() {
        $service = new \PlanetOsApi\PlanetOsApiWrapper();
        /** @var \GuzzleHttp\Client $result */
        $result = $service->getDataset("myocean_sst_baltic_daily");

        $this->assertEquals(200, $result->getStatusCode());
    }
    
    public function testCreatesDatasetObject() {
        $dataset = new \PlanetOsApi\Dataset("copernicus_goba_global_weekly");
        Log::debug(print_r($dataset, true));
    }

}