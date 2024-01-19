<?php

namespace App\Listeners;

use App\Events\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class SendOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderNotification  $event
     * @return void
     */
    public function handle(OrderNotification $event)
    {
        Mail::to($event->order->email)->send(new OrderMail($event->order));

        // Admin ko email bhejna
        // Mail::to('admin@example.com')->send(new OrderMail($event->order));
    }
}