<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;
use App\Models\Customer;
use Illuminate\Routing\Controller;
class DebtController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        return view('debt.create', compact('customers'));
    }

    public function createFromDetails(Customer $customer)
    {
        return view('debt.directAdd', compact('customer'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0',
            'debt_date' => 'required|date',
            'type' => 'nullable|in:cash,check,iou',
            'note' => 'nullable|string|max:255'
        ]);

        Debt::create($validated);

        return redirect()->route('Dashboard')->with('success', 'Debt added successfully.');
    }
}
