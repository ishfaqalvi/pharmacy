<?php

namespace App\Http\Controllers\Admin\Catalog;
use App\Http\Controllers\Controller;

use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * Class SubCategoryController
 * @package App\Http\Controllers
 */
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:subCategories-list',  ['only' => ['index']]);
        $this->middleware('permission:subCategories-view',  ['only' => ['show']]);
        $this->middleware('permission:subCategories-create',['only' => ['create','store']]);
        $this->middleware('permission:subCategories-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:subCategories-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::get();

        return view('admin.catalog.sub-category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategory = new SubCategory();
        return view('admin.catalog.sub-category.create', compact('subCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $subCategory = SubCategory::create($request->all());
        return redirect()->route('sub-categories.index')
            ->with('success', 'SubCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCategory = SubCategory::find($id);

        return view('admin.catalog.sub-category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);

        return view('admin.catalog.sub-category.edit', compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $subCategory->update($request->all());

        return redirect()->route('sub-categories.index')
            ->with('success', 'SubCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::find($id)->delete();

        return redirect()->route('sub-categories.index')
            ->with('success', 'SubCategory deleted successfully');
    }
}