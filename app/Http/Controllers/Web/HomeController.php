<?php

namespace App\Http\Controllers\Web;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Contracts\SliderInterface;
use App\Contracts\ProductInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $slider;
    protected $product;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(
        SliderInterface $slider,
        ProductInterface $product
    )
    {
        $this->slider = $slider;
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders    = $this->slider->list(false, true);
        $featured   = $this->product->list([], 'Featured');
        $frequently = $this->product->list([], 'Frequently');
        $wellness   = $this->product->list([], 'Wellness');
        $menWomans  = $this->product->list([], 'Men & Woman');
        $brands     = Brand::popular()->get();

        return view('website.home.index', compact('sliders','featured','frequently','wellness','menWomans','brands'));
    }
}