<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        /* Add your custom styles for the PDF receipt here */
        body {
            font-family: Arial, sans-serif;
        }

        .receipt {
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .details {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="header">
            <h1>Payment Receipt</h1>
        </div>

        <div class="details">
            <p><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</p>
            <p><strong>Description:</strong> {{ $payment->description }}</p>
            <p><strong>Date:</strong> {{ $payment->created_at->toDateString() }}</p>
            <p><strong>Amount:</strong> ${{ $payment->amount }}</p>
            <!-- Add more details as needed -->
        </div>
    </div>
</body>

</html>
