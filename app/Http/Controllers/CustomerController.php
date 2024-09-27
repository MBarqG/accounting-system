<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'company' => 'nullable|string|max:255',
            'VAT_Number' => 'nullable|string|max:255',
            'partners' => 'nullable|array'
        ]);

        $validated['partners'] = json_encode($request->input('partners', []));

        Customer::create($validated);

        return redirect()->route('Dashboard')->with('success', 'Customer added successfully.');
    }


    public function dashboard()
    {
        $customers = Customer::with('payments', 'debts')->get();
        $totalPayments = Payment::sum('amount');
        $totalDebts = Debt::sum('amount');

        return view('Dashboard', compact('customers', 'totalPayments', 'totalDebts'));
    }

    public function show($id)
    {
        $customer = Customer::with('payments', 'debts')->findOrFail($id);
        return view('customer.details', compact('customer'));
    }

    public function search(Request $request)
    {
        $totalPayments = Payment::sum('amount');
        $totalDebts = Debt::sum('amount');
        $searchTerm = $request->input('search');
        $customers = Customer::where('name', 'LIKE', "%{$searchTerm}%")
        ->orWhere('phone', 'LIKE', "%{$searchTerm}%")
        ->orWhere('company', 'LIKE', "%{$searchTerm}%")
        ->orWhere('vat_number', 'LIKE', "%{$searchTerm}%")
        ->orWhere('partners', 'LIKE', "%{$searchTerm}%")->get();

        return view('dashboard', compact('customers','totalDebts','totalPayments'));
    }

    public function generatePDF($id)
    {

        $customer = Customer::findOrFail($id);
        $payments = Payment::where('customer_id', $id)->orderBy('payment_date')->get();
        $debts = Debt::where('customer_id', $id)->orderby('debt_date')->get();

        $pdf = PDF::loadView('customer.pdf', compact('customer', 'payments', 'debts'));


        return $pdf->download('Customer_Details_' . $customer->name . '.pdf');
    }
}
