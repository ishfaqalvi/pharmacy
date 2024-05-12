<?php

namespace App\Repositories;
use App\Models\User;
use App\Mail\AdminOrderMail;
use App\Models\{Cart,Order};
use App\Mail\CustomerOrderMail;
use App\Contracts\OrderInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderNotification;

class OrderRepository implements OrderInterface
{
    public function list($guard, $pagination = false)
    {
        $query = Order::query();
        if($guard == 'web'){
            $query->whereNull('admin_deleted_at');
        }else{
            $customer = Auth::guard($guard)->user();
            $query->whereNull('customer_deleted_at')->whereCustomerId($customer->id);
        }
        $query->with(['city','customer','details.product']);
        return $pagination ? $query->paginate() : $query->get();
    }

    public function store($guard, $data)
    {
        /**
         * Calculate the cart amount.
         */
        $orderDetails = [];
        $cartAmount = 0;
        $discount = 0;
        foreach(Cart::whereSession($data['session'])->get() as $row){
            $orderDetails[] = [
                'product_id' => $row->product_id,
                'price_id'   => $row->price_id,
                'price'      => $row->price->new_price,
                'discount'   => $row->product->discount($row->price_id),
                'quantity'   => $row->quantity
            ];
            $cartAmount += $row->price->new_price * $row->quantity;
            $discount += $row->product->discount($row->price_id) * $row->quantity;
        }
        $data['discount'] += $discount;
        /**
         * Check the cart amount is greater then required amount.
         */
        $customer = Auth::guard($guard)->user();
        $minimuStrVal = settings('minimum_receiving_order_amount');
        $requiredAmount = isset($minimuStrVal) ? intval($minimuStrVal) : 1000;
        if($cartAmount <= $requiredAmount){
            return ['status' => false, 'message' => 'You can not palce order your cart amount is less then minimum order amount!'];
        }

        /**
         * Now place order everything is fine.
         */
        DB::transaction(function () use($customer, $data, $orderDetails) 
        {    
            $newOrder = $customer->orders()->create($data);
            $newOrder->details()->createMany($orderDetails);
            Cart::whereSession($data['session'])->delete();
            $order = Order::find($newOrder->id);
            /**
             * Send Notifications to relevent users.
             */
            $admins = User::whereStatus('active')->get();
            foreach ($admins as $admin) {
                $admin->notify(new OrderNotification($order));
            }
            
            if(!empty(settings('admin_email_order_receive1')))
            {   
                Mail::to(settings('admin_email_order_receive1'))->send(new AdminOrderMail($order));
            }
            if(!empty(settings('admin_email_order_receive2')))
            {
                Mail::to(settings('admin_email_order_receive2'))->send(new AdminOrderMail($order));
            }
            if(!empty($order->email)){
                Mail::to($order->email)->send(new CustomerOrderMail($order));
            }
        });
        return ['status' => true, 'message' => 'Your order have been placed successfully!'];
    }

	public function update($data, $id)
    {
        DB::transaction(function () use($data, $id) 
        {    
            $order = Order::find($id)->update($data);
            /**
             * Send Notifications to relevent users.
             */
            $admins = User::whereStatus('active')->get();
            foreach ($admins as $admin) {
                $admin->notify(new OrderNotification($order));
            }
            if(!empty($order->email)){
                Mail::to($order->email)->send(new CustomerOrderMail($order));
            }
        });
    }

	public function cancel($guard, $id)
    {
        $order = Order::find($id);
        if($guard != 'web' && $order->status != 'Pending'){
            return false;
        }else{
            $order->update(['status' => 'Canceled']);
        }
        return true;
    }

    public function delete($guard, $id)
    {
        $order = Order::find($id);
        if($order->status == 'Canceled' || $order->status == 'Delivered'){
            if($guard == 'web'){
                $order->update(['admin_deleted_at' => now()]);
            }else{
                $order->update(['customer_deleted_at' => now()]);
            }
            return true;
        }else{
            return false;
        }
    }
}
