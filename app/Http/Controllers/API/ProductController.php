<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contracts\ProductInterface;
use App\Http\Controllers\API\BaseController;

class ProductController extends BaseController
{
    protected $product;

    function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $products = $this->product->list($request->all(), true);

        return $this->sendResponse($products, 'All Products list get successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function special(Request $request)
    {
        $specialTypes = ['Frequently', 'Featured', 'Wellness', 'Men & Woman'];
        $data = [];
        foreach ($specialTypes as $type) {
            $key = strtolower(str_replace([' & ', ' '], ['And', ''], $type));
            $data[$key] = $this->product->list($request->all(), $type);
        }
        return $this->sendResponse($data, 'Special Products list get successfully.');
    }
}
