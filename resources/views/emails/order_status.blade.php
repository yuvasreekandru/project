@component('mail::message')
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .header img {
            max-width: 150px;
        }

        .details {
            margin: 20px 0;
        }

        .details h2 {
            margin-top: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
    Hi <b>{{ $order->first_name }}</b>,
    <p>
        Order Status:
        @if ($order->status == 0)
        Pending
        @elseif($order->status == 1)
        In Progress
        @elseif ($order->status == 2)
        Delivered
        @elseif ($order->status == 3)
        Completed
        @elseif ($order->status == 4)
        Cancelled
        @endif

    </p>
    <div class="container">
        <div class="header">
            <img src="https://example.com/logo.png" alt="Company Logo">
            <h1>Invoice</h1>
        </div>

        <div class="details">
            <h2>Order Details</h2>
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at }}</p>
            {{-- <p><strong>Customer Name:</strong> {{$order->first_name}} {{$order->last_name}}</p>
            <p><strong>Shipping Address:</strong> {{$order->address_one}}{{$order->address_two}}</p> --}}
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->getItem as $item)
                    <tr>
                        <td>
                            {{ $item->getProduct->title }}
                            <br>
                            Color : {{ $item->color_name }}
                            @if (!empty($item->size_name))
                            <br>

                            Size : {{$item->size_name}}
                            <br>
                            Size Amount : ${{number_format($item->size_amount, 2)}}
                            @endif



                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>${{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="total">
            @if (!empty($order->discount_code))

            <p><strong>Discount:</strong> ${{ number_format($order->discount_amount, 2) }}</p>
            @endif
            <p><strong>Shipping:</strong> ${{ number_format($order->shipping_amount, 2) }}</p>
            <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
        </div>

        <div class="footer">
            <p>Thank you for your order!</p>
            <p>If you have any questions, please contact us at support@example.com.</p>
        </div>
    </div>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
