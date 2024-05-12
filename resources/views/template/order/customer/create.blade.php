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
            New Order Placed
        </div>
        <div class="content">
            <p>Hi {{ $order->name }},</p>
            <p>Thank you for your order! We have received your order and it is now being processed. Here are the details:</p>
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
                    <td>Address:</td>
                    <td>{{ $order->address }}</td>
                </tr>
            </table>
            <p>Here are the details of the items you have ordered:</p>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount(Per Item)</th>
                    <th>Amount</th>
                </tr>
                @foreach ($order->details as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->discount }}</td>
                    <td>&#8360; {{ ($item->quantity * $item->price) - ($item->quantity * $item->discount) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                    <td>&#8360; {{ $order->totalAmount }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Shipment Charges:</strong></td>
                    <td>&#8360; {{ $order->shipping_cost }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Total Discount:</strong></td>
                    <td>&#8360; {{ $order->discount }}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><strong>Grand Total:</strong></td>
                    <td><strong>&#8360; {{ $order->totalAmount + $order->shipping_cost - $order->discount }}</strong></td>
                </tr>
            </table>
            <p>We will send you an update when your order status has been updated.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>