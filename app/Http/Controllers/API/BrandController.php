<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $brands = Brand::paginate();
        return $this->sendResponse($brands, 'All Brands list get successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular()
    {
        $brands = Brand::popular()->paginate();
        return $this->sendResponse($brands, 'Popular Brands list get successfully.');
    }
}