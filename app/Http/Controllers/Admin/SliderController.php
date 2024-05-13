<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Contracts\SliderInterface;
use App\Http\Controllers\Controller;

/**
 * Class SliderController
 * @package App\Http\Controllers
 */
class SliderController extends Controller
{
    protected $slider;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(SliderInterface $slider)
    {
        $this->slider = $slider;
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
        $sliders = $this->slider->list(true, true);

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
        $slider =  $this->slider->new();
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
        $slider =  $this->slider->store($request->all());
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
        $slider = $this->slider->find($id);

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
        $slider = $this->slider->find($id);

        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider)
    {
        $this->slider->update($request->all(), $slider);

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
        $this->slider->delete($id);

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
        $responce = $this->slider->checkParent($request->all());
        if ($responce) { echo "true"; }else{ echo "false"; }
    }
}
