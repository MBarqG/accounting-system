@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add Debt</h2>

    <form action="{{ route('debt.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="customer_id" class="block">Select Customer</label>
            <select name="customer_id" class="w-full border rounded px-4 py-2">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="amount" class="block">Amount</label>
            <input type="text" name="amount" class="w-full border rounded px-4 py-2" value="{{ old('amount') }}"
                required>
            @error('amount')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="debt_date" class="block">Debt Date</label>
            <input type="date" name="debt_date" class="w-full border rounded px-4 py-2" value="{{ old('debt_date') }}"
                required>
            @error('debt_date')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="type" class="block">Debt Type (Optional)</label>
            <select name="type" class="w-full border rounded px-4 py-2">
                <option value="">None</option>
                <option value="cash">Cash</option>
                <option value="check">Check</option>
                <option value="iou">IOU</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="note" class="block">Note (Optional)</label>
            <input type="text" name="note" class="w-full border rounded px-4 py-2" value="{{ old('note') }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add Debt</button>
    </form>
@endsection
