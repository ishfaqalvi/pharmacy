<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ProductPrice;
use Illuminate\Http\Request;

/**
 * Class ProductPriceController
 * @package App\Http\Controllers
 */
class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:productPrices-list',  ['only' => ['index']]);
        $this->middleware('permission:productPrices-view',  ['only' => ['show']]);
        $this->middleware('permission:productPrices-create',['only' => ['create','store']]);
        $this->middleware('permission:productPrices-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:productPrices-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productPrices = ProductPrice::get();

        return view('admin.product-price.index', compact('productPrices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productPrice = new ProductPrice();
        return view('admin.product-price.create', compact('productPrice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $productPrice = ProductPrice::create($request->all());
        return redirect()->route('product-prices.index')
            ->with('success', 'ProductPrice created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productPrice = ProductPrice::find($id);

        return view('admin.product-price.show', compact('productPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productPrice = ProductPrice::find($id);

        return view('admin.product-price.edit', compact('productPrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductPrice $productPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPrice $productPrice)
    {
        $productPrice->update($request->all());

        return redirect()->route('product-prices.index')
            ->with('success', 'ProductPrice updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productPrice = ProductPrice::find($id)->delete();

        return redirect()->route('product-prices.index')
            ->with('success', 'ProductPrice deleted successfully');
    }
}
