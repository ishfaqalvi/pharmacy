<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main()
    {
        return $this->sendResponse(Category::with('sub')->get(), 'Main Category list get successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sub()
    {
        return $this->sendResponse(SubCategory::with('category')->get(), 'Sub Category list get successfully.');
    }
}
