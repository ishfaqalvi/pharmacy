<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $sliders    = Slider::all();
        $frequently = Product::special('Frequently')->get();
        $featured   = Product::special('Featured')->get();
        $wellness   = Product::special('Wellness')->get();
        $menWomans  = Product::special('Men & Woman')->get();
        $brands     = Brand::popular()->get();

        return view('web.pages.home', compact('categories','sliders','frequently','featured','wellness','menWomans','brands'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}