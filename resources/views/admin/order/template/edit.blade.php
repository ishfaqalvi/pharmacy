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
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            Order Update Notification
        </div>

        <div class="content">
            <p>Dear {{ $order->name }},</p>
            <p>Your order with ID #{{ $order->order_number }} has been updated. Here are the details:</p>
            <table>
                <tr>
                    <td>Order ID:</td>
                    <td>{{ $order->order_number }}</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>{{ $order->status }}</td>
                </tr>
            </table>
            <p>Thank you for shopping with us!</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>