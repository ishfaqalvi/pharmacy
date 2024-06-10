<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Contracts\ProductInterface;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
    public function index(Request $request)
    {
        $filters = $request->all();
        $products = $this->product->list($filters, null, true);

        return view('website.product.index', compact('products','filters'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('web.product.show', compact('product'));
    }
}
