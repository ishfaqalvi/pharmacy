<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;

use App\Models\{Cart,Product};
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
        $product = Product::find($request->product_id);
        $cart = session()->get('cart', []);
        if(isset($cart[$product->id])) {
            $response = ['state' => 'warning', 'message' => 'Product already exist in cart!'];
        }
        elseif($product->in_stock == "false")
        {
            $response = ['state' => 'warning', 'message' => 'Product is out of stock!'];
        }
        else
        {
            $cart[$product->id] = ["price_id" => $request->price_id, "quantity" => $request->quantity];
            session()->put('cart', $cart);
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
        $cart = session()->get('cart', []);
        foreach (json_decode($request->data, true) as $item) {
            if(isset($cart[$item['itemId']])) {
                $cart[$item['itemId']]['quantity'] = $item['quantity'];
                $cart[$item['itemId']]['quantity'] = $item['quantity'];
                session()->put('cart', $cart);
            }
        }
        return response()->json(['message' => 'Cart updated successfully!','cartData' => cart()]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Product removed from cart successfully!','cartData' => cart()]);
    }
}
