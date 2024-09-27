@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-6">Report from {{ $startDate }} to {{ $endDate }}</h2>

    <form action="{{ route('report.pdf') }}" method="GET">
        @csrf
        <input type="hidden" name="start_date" value="{{ $startDate }}">
        <input type="hidden" name="end_date" value="{{ $endDate }}">
        <button type="submit" class="bg-zinc-400 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded mb-4">
            Download PDF
        </button>
    </form>

    <!-- Payments Table -->
    <div class="mb-8">
        <h3 class="text-xl font-bold mb-4">Payments</h3>
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Amount</th>
                    <th class="py-2 px-4 border-b">Type</th>
                    <th class="py-2 px-4 border-b">note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="{{ $loop->index % 2 === 0 ? 'bg-gray-100' : '' }}">
                        <td class="py-2 px-4 border-b">{{ $payment->payment_date }}</td>
                        <td class="py-2 px-4 border-b">₪{{ number_format($payment->amount, 2) }}</td>
                        <td class="py-2 px-4 border-b">{{ ucfirst($payment->type) }}</td>
                        <td class="py-2 px-4 border-b">{{ $payment->note }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Debts Table -->
    <div>
        <h3 class="text-xl font-bold mb-4">Debts</h3>
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Amount</th>
                    <th class="py-2 px-4 border-b">Type</th>
                    <th class="py-2 px-4 border-b">Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($debts as $debt)
                    <tr class="{{ $loop->index % 2 === 0 ? 'bg-gray-100' : '' }}">
                        <td class="py-2 px-4 border-b">{{ $debt->debt_date }}</td>
                        <td class="py-2 px-4 border-b">₪{{ number_format($debt->amount, 2) }}</td>
                        <th class="py-2 px-4 border-b">{{ ucfirst($debt->type) }}</th>
                        <td class="py-2 px-4 border-b">{{ $debt->note }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
