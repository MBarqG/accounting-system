@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-2 gap-6">
        <div class="bg-white shadow-md rounded mb-4">
            <h2 class="ml-4 text-xl font-bold mb-4">{{ $customer->name }}'s Details</h2>
            <h2 class="ml-4 text-xl font-bold mb-4">{{ $customer->name }}'s Phone#: {{ $customer->phone }}</h2>
            <h2 class="ml-4 text-xl font-bold mb-4">{{ $customer->name }}'s Company: {{ $customer->company }}</h2>
            <h2 class="ml-4 text-xl font-bold mb-4">{{ $customer->name }}'s VAT#: {{ $customer->VAT_Number }}</h2>
            <h2 class="ml-4 text-xl font-bold mb-4">{{ $customer->name }}'s partners: {{ $customer->partners }}</h2>
        </div>
        <div class="bg-white shadow-md rounded mb-4 flex flex-col justify-center items-center ">
            <p>Download Profile as PDF </p>
            <a href="{{ route('customers.pdf', $customer->id) }}">
                <button class="py-2 px-4 my-2 bg-zinc-400 hover:bg-zinc-700 rounded">
                    <p class="float-left pt-1 text-white">Download</p>
                </button>
            </a>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-6">
        <!-- Payments List -->
        <div class="bg-white shadow-md rounded">
            <h3 class="text-lg font-bold p-4">Payments</h3>
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer->payments as $payment)
                        <tr class="even:bg-zinc-200 odd:bg-white">
                            <td class="border px-4 py-2">{{ number_format($payment->amount, 2) }}</td>
                            <td class="border px-4 py-2">{{ $payment->payment_date }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($payment->type) }}</td>
                            <td class="border px-4 py-2">{{ $payment->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('add.payment', ['customer' => $customer->id]) }}"><button class="w-full py-2 px-4 bg-slate-100 rounded text-blue-700">
                <p class="float-left pt-1">+ Add Payment</p></button></a>
        </div>

        <!-- Debts List -->
        <div class="bg-white shadow-md rounded">
            <h3 class="text-lg font-bold p-4">Debts</h3>
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer->debts as $debt)
                        <tr class="even:bg-zinc-200 odd:bg-white">
                            <td class="border px-4 py-2">{{ number_format($debt->amount, 2) }}</td>
                            <td class="border px-4 py-2">{{ $debt->debt_date }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($debt->type ?? 'N/A') }}</td>
                            <td class="border px-4 py-2">{{ $debt->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('add.debt', ['customer' => $customer->id])}}"><button class="w-full py-2 px-4 bg-slate-100 rounded text-blue-700">
                <p class="float-left pt-1">+ Add Debt</p></button></a>
        </div>
    </div>
@endsection
