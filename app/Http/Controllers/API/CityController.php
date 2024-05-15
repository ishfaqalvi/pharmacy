<?php

namespace App\Http\Controllers\API;
use App\Models\City;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

class CityController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::get();
        return $this->sendResponse($cities, 'Cities list get successfully.');
    }
}
