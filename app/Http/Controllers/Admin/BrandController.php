<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Http\Request;

/**
 * Class BrandController
 * @package App\Http\Controllers
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:brands-list',         ['only' => ['index']]);
        $this->middleware('permission:brands-view',         ['only' => ['show']]);
        $this->middleware('permission:brands-create',       ['only' => ['create','store']]);
        $this->middleware('permission:brands-edit',         ['only' => ['edit','update']]);
        $this->middleware('permission:brands-delete',       ['only' => ['destroy']]);
        $this->middleware('permission:brands-popularList',  ['only' => ['popular']]);
        $this->middleware('permission:brands-popularCreate',['only' => ['popularStore']]);
        $this->middleware('permission:brands-popularDelete',['only' => ['popularDestroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::AcceptRequest(['popular','search_like'])->filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;
        
        return view('admin.brand.index', compact('brands','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $brands->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return view('admin.brand.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $brand = Brand::create($request->all());
        return redirect()->route('brands.all.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());

        return redirect()->route('brands.all.index')
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $brand = Brand::find($id)->delete();

        return redirect()->route('brands.all.index')
            ->with('success', 'Brand deleted successfully.');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $parameter= $request->q;
        $page     = $request->page;
        $brans    = Brand::where('name', 'LIKE', '%' . $parameter . '%')
                    ->paginate(10, ['*'], 'page', $page)->toArray();
        return $brans;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular(Request $request)
    {
        $brands = Brand::AcceptRequest(['search_like'])->popular()->filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.brand.popular.index', compact('brands','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $brands->perPage());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function popularStore(Request $request)
    {
        $brand = Brand::find($request->brand_id);
        $brand->update(['popular' => 'Yes']);

        return redirect()->back()->with('success', 'Brand added successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function popularDestroy($id)
    {
        $brand = Brand::find($id);
        $brand->update(['popular' => 'No']);

        return redirect()->back()->with('success', 'Brand removed successfully.');
    }

    /**
     * Check the record existance from a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkBrand(Request $request)
    {
        $brand = Brand::find($request->brand);
        if ($brand->popular == 'Yes') { echo "false"; }else{ echo "true"; }
    }
}
