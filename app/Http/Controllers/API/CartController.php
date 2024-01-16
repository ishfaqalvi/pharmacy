<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::with(['product' => function($query) {
            $query->with(['brand', 'category', 'subCategory', 'composition', 'prices', 'images']);
        }, 'price'])->get();
        return $this->sendResponse($cart, 'Cart Product list get successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = auth()->user()->cartProducts()->where('product_id',$request->product_id)->first();
        if ($check) {
            return $this->sendResponse('', 'Product already exist in cart!');
        }else{
            auth()->user()->cartProducts()->create($request->all());
        }
        return $this->sendResponse('', 'Product add to cart successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $item)
    {
        $item->update(['price_id', $request->price_id, 'quantity' => $request->quantity]);
        return $this->sendResponse($item, 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::find($id)->delete();
        return $this->sendResponse('', 'Item removed from cart successfully.');
    }
}
