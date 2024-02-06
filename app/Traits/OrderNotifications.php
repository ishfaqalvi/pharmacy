<?php

namespace App\Traits;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderNotification;
use App\Models\Admin;

trait OrderNotifications {

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createNotification()
    {
        $type = 'CustomerOrderCreate';
        Notification::route('mail', $this->email)->notify(new OrderNotification($this, $type));

        $type = 'AdminOrderReceive';
        $admin1 = settings('admin_email_order_receive1');
        if (isset($admin1)) {
            Notification::route('mail', $admin1)->notify(new OrderNotification($this, $type));
        }

        $admin2 = settings('admin_email_order_receive2');
        if (isset($admin2)) {
            Notification::route('mail', $admin2)->notify(new OrderNotification($this, $type));
        }

        // $admins = Admin::all()->pluck('id');
        // Notification::route('database', $admins)->notify(new OrderReceivedNotification($order));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateNotification()
    {
        $type = 'CustomerOrderUpdate';
        Notification::route('mail', $this->email)->notify(new OrderNotification($this, $type));
    }
}