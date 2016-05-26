<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PlanetOsApi\Dataset;
use PlanetOsApi\DatasetVariable;
use PlanetOsApi\PlanetOsApiWrapper;

class FetchDatasets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:datasets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new or update meta data of datasets';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $datasets = ['copernicus_goba_global_weekly', 'hycom_glbu0.08_91.2_global_0.08d'];
        $service = new PlanetOsApiWrapper();

        foreach($datasets as $dataset) {

            $result = $service->getDataset($dataset);
            $info = json_decode($result->getBody()->getContents(), true);
            $this->createOrUpdate($dataset, $info);
        }
    }

    /**
     * @param $datasets
     * @param $info
     */
    private function createOrUpdate($dataset, $info) {
        $dataset = Dataset::firstOrNew(['name' => $dataset]);

        foreach ($info as $item => $value) {
            switch ($item) {
                case "Title":
                    $dataset->title = $value;
                    break;
                case "Abstract":
                    $dataset->abstract = $value;
                    break;
                case "UpdateFrequency":
                    $dataset->updateFrequency = $value;
                    break;
                case "Refreshed":
                    $dataset->refreshed = $value;
                    break;
                case "VerticalExtent":
                    $dataset->verticalExtent = $value;
                    break;
                case "TemporalExtentStart":
                    $dataset->extentStart = $value;
                    break;
                case "TemporalExtentEnd":
                    $dataset->extentEnd = $value;
                    break;
                case "OnlineResource":
                    if (is_array($value)) {
                        $dataset->resource = $value[0];
                    } else {
                        $dataset->resource = $value;
                    }
                    break;
            }
        }
        $dataset->save();
    }
    
}
