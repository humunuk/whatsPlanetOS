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

        return view('landing');
    }

    public function getData() {
        $wrapper = new PlanetOsApiWrapper();
        $datasets = Dataset::all(['name', 'title', 'abstract', 'updateFrequency', 'refreshed', 'resource', 'extentStart', 'extentEnd', 'verticalExtent'])->toArray();
        $datasetDetails = $wrapper->getPointDataset($datasets[0]['name'], 59.45, 24.76, 1, "all");

        return view('data')->with(['datasetDetails' => $datasetDetails, 'datasets' => $datasets]);
    }

    public function postDetails(Request $request) {
        $rules = ['api' => 'required|max:100', 'lat' => 'required|numeric', 'lng' => 'required|numeric'];
        $this->validate($request, $rules);

        $inputs = $request->all();

        $wrapper = new PlanetOsApiWrapper();
        $datasetDetails = $wrapper->getPointDataset($inputs['api'], $inputs['lat'], $inputs['lng']);


        $view = view('elem.table')->with('datasetDetails', $datasetDetails)->render();

        return response()->json($view);
    }
}
