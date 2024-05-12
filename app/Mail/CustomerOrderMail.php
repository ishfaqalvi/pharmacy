<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the message detail.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        if($this->order->status == 'Pending'){
            $subject = 'Your order has been placed!';
            $view = 'template.order.customer.create';
        }else{
            $subject = 'Your order has been updated!';
            $view = 'template.order.customer.update';
        }
        return $this->subject($subject)->view($view, ['order' => $this->order]);
    }
}
