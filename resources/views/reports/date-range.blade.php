@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-6">Select Date Range</h2>

    <!-- Form for selecting date range -->
    <form action="{{ route('report.results') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-bold mb-2">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-bold mb-2">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Get Report
        </button>
    </form>
</div>
@endsection
