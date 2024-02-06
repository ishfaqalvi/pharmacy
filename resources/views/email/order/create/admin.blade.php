<!DOCTYPE html>
<html>
<head>
    <style>
        .email-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            color: #333;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #aaa;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            New Order Received
        </div>
        <div class="content">
            <p>A new order has been placed by <strong>{{ $order->name }}</strong>.</p>
            <p>Here are the order details for your review and processing:</p>
            <table>
                <tr>
                    <td>Order ID:</td>
                    <td>{{ $order->order_number }}</td>
                </tr>
                <tr>
                    <td>Contact #:</td>
                    <td>{{ $order->contact_number }}</td>
                </tr>
                <tr>
                    <td>Shipping Address:</td>
                    <td>{{ $order->address }}</td>
                </tr>
                <tr>
                    <td>Total Amount:</td>
                    <td>&#8360;{{ $order->totalAmount + $order->shipping_cost }}</td>
                </tr>
            </table>
            <p>Items Ordered:</p>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
                @foreach ($order->details as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>&#8360;{{ $item->quantity * $item->price }}</td>
                </tr>
                @endforeach
            </table>
            <p>Please review the order and proceed with the necessary actions for processing and shipment.</p>
            <p><a href="{{ route('orders.show',$order->id) }}">Manage Order</a></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>