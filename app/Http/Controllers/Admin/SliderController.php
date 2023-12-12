<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class SliderController
 * @package App\Http\Controllers
 */
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:sliders-list',  ['only' => ['index']]);
        $this->middleware('permission:sliders-view',  ['only' => ['show']]);
        $this->middleware('permission:sliders-create',['only' => ['create','store']]);
        $this->middleware('permission:sliders-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:sliders-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->paginate();

        return view('admin.slider.index', compact('sliders'))
        ->with('i', (request()->input('page', 1) - 1) * $sliders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = new Slider();
        return view('admin.slider.create', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $slider = Slider::create($request->all());
        return redirect()->route('sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);

        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->update($request->all());

        return redirect()->route('sliders.index')
            ->with('success', 'Slider updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $slider = Slider::find($id)->delete();

        return redirect()->route('sliders.index')
            ->with('success', 'Slider deleted successfully');
    }

    /**
     * Check the record existance from a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkParent(Request $request)
    {
        if($request->type == 'Brand'){
            $parent = Brand::where('name',$request->parent)->first();
        }elseif($request->type == 'Category'){
            $parent = Category::where('name',$request->parent)->first();
        }elseif($request->type == 'Sub Category'){
            $parent = SubCategory::where('name',$request->parent)->first();
        }elseif($request->type == 'Product'){
            $parent = Product::where('name',$request->parent)->first();
        }else{
            $parent = true;
        }
        if ($parent) { echo "true"; }else{ echo "false"; }
    }
}
