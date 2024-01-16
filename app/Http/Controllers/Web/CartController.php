<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use Illuminate\Http\Request;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::get();

        return view('web.cart.index', compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = auth()->user()->cartProducts()->where('product_id',$request->product_id)->first();
        if ($check) {
            $response = ['state' => 'warning', 'message' => 'Product already exist in cart!'];
        }else{
            auth()->user()->cartProducts()->create($request->all());
            $response = ['state' => 'success', 'cartData' => cart(),'message' => 'Product added to cart successfully!'];
        }
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach (json_decode($request->data, true) as $item) {
            $cart = Cart::find($item['itemId']);
            $cart->update(['price_id' => $item['priceId'], 'quantity' => $item['quantity']]);
        }
        return response()->json(['message' => 'Cart updated successfully!','cartData' => cart(),]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $cart = Cart::find($request->id)->delete();
        return response()->json(['message' => 'Product removed from cart successfully!','cartData' => cart(),]);
    }
}