<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contracts\CartInterface;
use App\Http\Controllers\API\BaseController;

class CartController extends BaseController
{
    protected $cart;

    function __construct(CartInterface $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = $this->cart->list($request->session);
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
        $responce = $this->cart->store($request->all());
        if (!$responce) {
            return $this->sendResponse('', 'Product already exist in cart!');
        }
        return $this->sendResponse($responce, 'Product add to cart successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->cart->update($request->all(), $id);
        return $this->sendResponse('', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cart->delete($id);
        return $this->sendResponse('', 'Item removed from cart successfully.');
    }
}
