<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;

use Illuminate\Http\Request;
use App\Events\OrderNotification;
use App\Models\Order;
use DB;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders()->whereUserState('Show')->with(['details' => function($query) {
            $query->with(['product', 'productPrice']);
        }, 'city'])->get();
        return $this->sendResponse($orders, 'Orders list get successfully.');
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
        if ($user->cartAmount() > $requiredAmount) {
            DB::transaction(function() use($user, $request){
                $order = $user->orders()->create($request->all());
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
                event(new OrderNotification($order));
            });
            return $this->sendResponse($orders, 'Your order have been placed successfully!');
        }else{
            return $this->sendResponse($orders, 'You can not palce order your cart amount is less then minimum order amount!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, Order $order)
    {
        if ($order->status == 'Pending') {
            $order->update(['status' => 'Cancelled']);
            return $this->sendResponse('', 'Your order has been cancelled successfully!');
            event(new OrderNotification($order));  
        }else{
            return $this->sendResponse('', 'You can not cancel order your order is in under process!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if($order->status == 'Cancelled' || $order->status == 'Completed') {
            $order->update(['user_state' => 'Hide']); 
            return $this->sendResponse('', 'Order deleted successfully.');  
        }else{
            return $this->sendResponse('', 'You can not deleted order your order is in under process!');
        }
    }
}
