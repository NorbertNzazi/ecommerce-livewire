<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            width: 90%;
            margin: 0 auto;
            padding: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="invoice">
        <div class="header">
            <h1>Order Summary</h1>
        </div>

        <div class="info">
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><strong>Customer:</strong> {{ $customer->name . ' ' . $customer->surname }}</p>
            <strong>{{ $customer->email }}</strong>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->product->description }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->product->price }}</td>
                        <td>{{ $product->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <p><strong>Total:</strong> R{{ $amount }}</p>
        </div>
    </div>

</body>

</html>
