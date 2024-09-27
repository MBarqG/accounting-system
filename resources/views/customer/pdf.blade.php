<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .details-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .details-table th, .details-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .details-table th {
            background-color: #f2f2f2;
        }
        .section-title {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Customer Details</h2>
        </div>

        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Phone Number:</strong> {{ $customer->phone }}</p>
        <p><strong>Owner Company:</strong> {{ $customer->company }}</p>
        <p><strong>VAT#:</strong> {{ $customer->VAT_Number }}</p>

        <!-- Payments Table -->
        <h3 class="section-title">Payments</h3>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->payment_date }}</td>
                        <td>{{ number_format($payment->amount, 2) }} Shekel</td>
                        <td>{{ ucfirst($payment->type) }}</td>
                        <td>{{ $payment->note }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Debts Table -->
        <h3 class="section-title">Debts</h3>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($debts as $debt)
                    <tr>
                        <td>{{ $debt->debt_date }}</td>
                        <td>{{ number_format($debt->amount, 2) }} Shekel</td>
                        <td>{{ $debt->type }}</td>
                        <td>{{ $debt->note }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
