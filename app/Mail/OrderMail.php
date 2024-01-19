<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderMail extends Mailable
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->order->status == 'Pending') {
            $subject= 'Order Recieved';
            $view   = 'admin.order.template.create';
        }else{
            $subject= 'Order Updated';
            $view   = 'admin.order.template.edit';
        }
        return $this->subject($subject)->view($view, ['order' => $this->order]);
    }
}
