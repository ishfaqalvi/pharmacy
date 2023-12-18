<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ProductReview;
use Illuminate\Http\Request;

/**
 * Class ProductReviewController
 * @package App\Http\Controllers
 */
class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:productReviews-list',  ['only' => ['index']]);
        $this->middleware('permission:productReviews-view',  ['only' => ['show']]);
        $this->middleware('permission:productReviews-create',['only' => ['create','store']]);
        $this->middleware('permission:productReviews-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:productReviews-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productReviews = ProductReview::get();

        return view('admin.product-review.index', compact('productReviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productReview = new ProductReview();
        return view('admin.product-review.create', compact('productReview'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $productReview = ProductReview::create($request->all());
        return redirect()->route('product-reviews.index')
            ->with('success', 'ProductReview created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productReview = ProductReview::find($id);

        return view('admin.product-review.show', compact('productReview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productReview = ProductReview::find($id);

        return view('admin.product-review.edit', compact('productReview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductReview $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        $productReview->update($request->all());

        return redirect()->route('product-reviews.index')
            ->with('success', 'ProductReview updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productReview = ProductReview::find($id)->delete();

        return redirect()->route('product-reviews.index')
            ->with('success', 'ProductReview deleted successfully');
    }
}
