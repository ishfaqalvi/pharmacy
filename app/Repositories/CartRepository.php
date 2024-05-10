<?php

namespace App\Repositories;
use App\Models\Cart;
use Illuminate\Support\Str;
use App\Contracts\CartInterface;

class CartRepository implements CartInterface
{
    public function list($token)
    {
        $cart = Cart::whereSession($token)->with(['product' => function($query) {
            $query->with(['brand', 'category', 'subCategory', 'composition', 'prices', 'images']);
        }, 'price'])->get();
        return $cart;
    }

    public function store($data)
    {
        if(isset($data['session'])){
            $check = Cart::whereSession($data['session'])->where('product_id',$data['product_id'])->first();
            if ($check) {
                return false;
            }
        }else{
            $data['session'] = Str::uuid()->toString();
        }
        return Cart::create($data);
    }

	public function update($data, $id)
    {
        $item = Cart::find($id);
        $item->update($data);
        return $item;
    }

	public function delete($id)
    {
        $item = Cart::find($id);
        $session = $item->session;
        $item->delete();
        return $session;
    }
}
