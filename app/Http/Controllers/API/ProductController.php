<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $relations = ['brand', 'category', 'subCategory', 'composition', 'prices', 'images'];
        $products = Product::filter($request->all())->with($relations)->paginate();

        return $this->sendResponse($products, 'All Products list get successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function special()
    {
        $specialTypes = ['Frequently', 'Featured', 'Wellness', 'Men & Woman'];
        $relations = ['brand', 'category', 'subCategory', 'composition', 'prices', 'images'];
        $data = [];

        foreach ($specialTypes as $type) {
            $key = strtolower(str_replace([' & ', ' '], ['And', ''], $type));
            $data[$key] = Product::special($type)->with($relations)->get();
        }
        return $this->sendResponse($data, 'Special Products list get successfully.');
    }
}
