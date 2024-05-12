<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Order;

class OrderNotification extends Notification
{
    use Queueable;

    protected $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($this->type === 'CustomerOrderCreate') {
            return (new MailMessage)
            ->subject('Order Placed')
            ->markdown('email.order.create.customer', ['order' => $this->order]);
        }elseif($this->type === 'AdminOrderReceive'){
            return (new MailMessage)
            ->subject('New Order Received')
            ->markdown('email.order.create.admin', ['order' => $this->order]);
        }elseif($this->type == 'CustomerOrderUpdate'){
            return (new MailMessage)
            ->subject('Order Update')
            ->markdown('email.order.update.customer', ['order' => $this->order]);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        if($this->order->status == 'Pending'){
            return [
                'title' => 'New Order Received',
                'message' => $this->order->name.' placed a new order'
            ];
        }
        else{
            return [
                'title' => 'Order Updated',
                'message' => $this->order->order_number. ' order updated.'
            ];
        }
    }
}
