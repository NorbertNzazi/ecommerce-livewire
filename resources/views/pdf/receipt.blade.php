<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
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

        th, td {
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
            <h1>Invoice Receipt</h1>
        </div>

        <div class="info">
            <p><strong>Invoice Number:</strong> INV-123456</p>
            <p><strong>Date:</strong> December 2, 2023</p>
            <p><strong>Customer:</strong> John Doe</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Item 1</td>
                    <td>Description for Item 1</td>
                    <td>2</td>
                    <td>$20.00</td>
                    <td>$40.00</td>
                </tr>
                <tr>
                    <td>Item 2</td>
                    <td>Description for Item 2</td>
                    <td>1</td>
                    <td>$30.00</td>
                    <td>$30.00</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <p><strong>Total:</strong> $70.00</p>
        </div>
    </div>

</body>
</html>
