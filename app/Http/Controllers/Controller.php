<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Log;
use PlanetOsApi\Dataset;
use PlanetOsApi\PlanetOsApiWrapper;

class Controller extends BaseController {

    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getIndex() {
        $wrapper = new PlanetOsApiWrapper();
        $dataset = new Dataset("copernicus_goba_global_weekly");
        $datasetDetails = $wrapper->getPointDataset($dataset->name, 59.45, 24.76, 1, "all");

        Log::debug(print_r($dataset, true));

        return view('landing')->with(['datasetDetails' => $datasetDetails, 'dataset' => $dataset]);
    }

    public function getDetails(Request $request) {
        $rules = ['api' => 'required|max:100', 'lat' => 'required|numeric', 'lng' => 'required|numeric'];
        $this->validate($request, $rules);

        $inputs = $request->all();

        $wrapper = new PlanetOsApiWrapper();
        $datasetDetails = $wrapper->getPointDataset($inputs['api'], $inputs['lat'], $inputs['lng']);

        return response()->json($datasetDetails);
    }
}
