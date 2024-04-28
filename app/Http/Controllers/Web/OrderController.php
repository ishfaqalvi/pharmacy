<?php

namespace App\Http\Controllers\Web;

use DB;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use App\Models\{Order, City};
use App\Events\OrderNotification;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $cart = [];
        $amount = 0;
        foreach(session()->get('cart', []) as $key => $row){
            $product = Product::find($key);
            $price = ProductPrice::find($row['price_id']);
            $quantity = $row['quantity'];
            $cart[] = [$product, $price, $quantity];
            $amount += $row['quantity'] * $price->new_price;
        }
        return view('web.checkout.index', compact('cart', 'amount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $minimuStrVal = settings('minimun_receiving_order_amount');
        $requiredAmount = isset($minimuStrVal) ? intval($minimuStrVal) : 100;
        $city = City::whereName($request->city)->first();
        if (!$city) {
            return response()->json(['state' => 'warning', 'message' => 'City not found!']);
        }
        $input = $request->all();
        $input['city_id'] = $city->id;
        $cart = [];
        $amount = 0;
        foreach(session()->get('cart', []) as $key => $row){
            $product = Product::find($key);
            $price = ProductPrice::find($row['price_id']);
            $quantity = $row['quantity'];
            $cart[] = [$product, $price, $quantity];
            $amount += $row['quantity'] * $price->new_price;
        }
        if ($amount > $requiredAmount) {
            DB::transaction(function() use($user, $input, $cart){
                $order = $user->orders()->create($input);
                foreach($cart as $row)
                {
                    $order->details()->create([
                        'product_id' => $row[0]->id,
                        'price_id'   => $row[1]->id,
                        'price'      => $row[1]->new_price,
                        'quantity'   => $row[2]
                    ]);
                }
                $order->createNotification();
            });
            session()->forget('cart');
            $response = ['state' => 'success', 'message' => 'Your order have been placed successfully!'];
        }else{
            $response = ['state' => 'warning', 'message' => 'You can not palce order your cart amount is less then minimum order amount!'];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $order = Order::find($request->id);
        if($order->status == 'Cancelled' || $order->status == 'Completed') {
            $order->update(['user_state' => 'Hide']);
            $response = [
                'data' => orders(),
                'state' => 'success',
                'message' => 'Your order has been deleted successfully!'
            ];
        }else{
            $response = ['state' => 'warning', 'message' => 'You can not deleted order your order is in under process!'];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request)
    {
        $order = Order::find($request->id);
        if ($order->status == 'Pending') {
            $order->update(['status' => 'Cancelled']);
            $response = [
                'data' => orders(),
                'state' => 'success',
                'message' => 'Your order has been cancelled successfully!'
            ];
            // event(new OrderNotification($order));
        }else{
            $response = ['state' => 'warning', 'message' => 'You can not cancel order your order is in under process!'];
        }
        return response()->json($response);
    }
}
