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
            Order Update
        </div>
        <div class="content">
            <p>Hi {{ $order->name }},</p>
            <p>Your order with ID #{{ $order->order_number }} has been updated. Here are the latest details:</p>
            
            <!-- Example of an order status update -->
            <p>Status: <strong>{{ $order->status }}</strong></p>
            
            <!-- Example of shipping information, if applicable -->
            @if($order->shipping_info)
            <p>Shipping Information:</p>
            <table>
                <tr>
                    <td>Carrier:</td>
                    <td>{{ $order->shipping_info->carrier }}</td>
                </tr>
                <tr>
                    <td>Tracking Number:</td>
                    <td>{{ $order->shipping_info->tracking_number }}</td>
                </tr>
                <tr>
                    <td>Estimated Delivery:</td>
                    <td>{{ $order->shipping_info->estimated_delivery }}</td>
                </tr>
            </table>
            @endif
            
            <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>