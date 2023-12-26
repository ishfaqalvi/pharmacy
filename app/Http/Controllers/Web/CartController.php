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
        auth()->user()->cartProducts()->create($request->all());
        return redirect()->back();
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
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cart = Cart::find($id)->delete();

        return redirect()->back();
    }
}
