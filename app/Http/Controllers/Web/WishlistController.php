<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use App\Models\Wishlist;
use Illuminate\Http\Request;

/**
 * Class WishlistController
 * @package App\Http\Controllers
 */
class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.wishlist.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Wishlist::create(['user_id'=>auth()->user()->id, 'product_id'=>$request->id]);
        return response()->json(['message' => 'Product added to wishlist successfully!']);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $wishlist = Wishlist::find($request->id)->delete();
        return response()->json(['message' => 'Product removed from wishlist successfully!']);
    }
}
