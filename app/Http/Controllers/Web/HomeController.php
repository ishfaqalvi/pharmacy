<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $sliders    = Slider::all();
        $frequently = Product::special('Frequently')->get();
        $featured   = Product::special('Featured')->get();
        $wellness   = Product::special('Wellness')->get();
        $menWomans  = Product::special('Men & Woman')->get();
        $brands     = Brand::popular()->get();

        return view('web.home.index', compact('sliders','frequently','featured','wellness','menWomans','brands'));
    }
}