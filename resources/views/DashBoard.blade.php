@extends('layouts.app')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="bg-white p-6 rounded shadow">
        @if ($totalPayments > $totalDebts)
            <p class="text-xl text-red-600">You owe ₪{{ number_format($totalPayments - $totalDebts, 2) }}</p>
        @else
            <p class="text-xl text-green-600">You are owed ₪{{ number_format($totalDebts - $totalPayments, 2) }}</p>
        @endif
    </div>

    <div class="mt-6">
        <h2 class="text-lg font-bold mb-4">Customers</h2>
        <table class="min-w-full bg-white shadow">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Customer</th>
                    <th class="border px-4 py-2">Total Payments</th>
                    <th class="border px-4 py-2">Total Debts</th>
                    <th class="border px-4 py-2">Difference</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    @php
                        $customerPayments = $customer->payments->sum('amount');
                        $customerDebts = $customer->debts->sum('amount');
                        $difference = $customerPayments - $customerDebts;
                    @endphp
                    <tr class="even:bg-zinc-200 odd:bg-white">
                        <td class="border px-4 py-2">{{ $customer->name }}</td>
                        <td class="border px-4 py-2">₪{{ number_format($customerPayments, 2) }}</td>
                        <td class="border px-4 py-2">₪{{ number_format($customerDebts, 2) }}</td>
                        @if ($difference < 0)
                            <td class="border px-4 py-2 text-red-600">₪{{ number_format($difference, 2) }}</td>
                        @elseif($difference == 0)
                            <td class="border px-4 py-2">₪{{ number_format($difference, 2) }}</td>
                        @else
                            <td class="border px-4 py-2 text-green-600">₪{{ number_format($difference, 2) }}</td>
                        @endif
                        <td class="border px-4 py-2">
                            <a href="{{ route('customer.details', $customer->id) }}" class="text-blue-500">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
