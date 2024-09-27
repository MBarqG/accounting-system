<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h2,
        h3 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Report from {{ $startDate }} to {{ $endDate }}</h2>

    <!-- Payments Table -->
    <h3>Payments</h3>
    <table>
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
                    <td>{{ number_format($payment->amount, 2) }}</td>
                    <td>{{ ucfirst($payment->type) }}</td>
                    <td>{{ $payment->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Debts Table -->
    <h3>Debts</h3>
    <table>
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
                    <td>{{ number_format($debt->amount, 2) }}</td>
                    <td>{{ $debt->type }}</td>
                    <td>{{ $debt->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
