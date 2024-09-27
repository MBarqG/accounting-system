<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Routing\Controller;
class PaymentController extends Controller
{

    public function create()
    {
        $customers = Customer::all(); // Get all customers to link payments
        return view('payment.create', compact('customers'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'type' => 'required|in:cash,check,iou',
            'note' => 'nullable|string|max:255'
        ]);

        Payment::create($validated);

        return redirect()->route('Dashboard')->with('success', 'Payment added successfully.');
    }
}
