<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\OrderNotification;
use App\Models\{Order, City};
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        return view('web.checkout.index');
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
        if ($user->cartAmount() > $requiredAmount) {
            DB::transaction(function() use($user, $input){
                $order = $user->orders()->create($input);
                foreach($user->cartProducts as $row)
                {
                    $order->details()->create([
                        'product_id' => $row->product_id,
                        'price_id'   => $row->price_id,
                        'price'      => $row->price->new_price,
                        'quantity'   => $row->quantity
                    ]);
                    $row->delete();
                }
                $order->createNotification();
            });
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
