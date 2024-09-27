@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add Customer</h2>

    <form action="{{ route('customer.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Customer Name</label>
            <input type="text" name="name" class="w-full border rounded px-4 py-2" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block">Phone Number</label>
            <input type="text" name="phone" class="w-full border rounded px-4 py-2" value="{{ old('phone') }}">
            @error('phone')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="company" class="block">Company</label>
            <input type="text" name="company" class="w-full border rounded px-4 py-2" value="{{ old('company') }}">
        </div>
        <div class="mb-4">
            <label for="company" class="block">VAT#</label>
            <input type="text" name="company" class="w-full border rounded px-4 py-2" value="{{ old('VAT_Number') }}">
        </div>

        <div class="mb-4">
            <label for="partners" class="block">Partners</label>
            <input type="text" name="partners[]" class="w-full border rounded px-4 py-2" placeholder="Partner 1">
            <input type="text" name="partners[]" class="w-full border rounded px-4 py-2 mt-2" placeholder="Partner 2">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Add Customer</button>
    </form>
@endsection
