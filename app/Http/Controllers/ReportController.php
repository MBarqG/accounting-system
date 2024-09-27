<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Debt;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller{
    public function showForm()
    {
        return view('reports.date-range');
    }

    // Handle the form submission and get the results between the selected dates
    public function getResults(Request $request)
    {
        // Validate the form input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Fetch all payments and debts between the given dates
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $payments = Payment::whereBetween('payment_date', [$startDate, $endDate])->orderBy('payment_date')->get();
        $debts = Debt::whereBetween('debt_date', [$startDate, $endDate])->orderBy('debt_date')->get();

        return view('reports.results', compact('payments', 'debts', 'startDate', 'endDate'));
    }

    public function downloadPDF(Request $request)
    {
        // Validate the input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Fetch payments and debts between the given dates
        $payments = Payment::whereBetween('payment_date', [$startDate, $endDate])->orderBy('payment_date')->get();
        $debts = Debt::whereBetween('debt_date', [$startDate, $endDate])->orderBy('debt_date')->get();

        // Generate PDF using a Blade view
        $pdf = PDF::loadView('reports.pdf', compact('payments', 'debts', 'startDate', 'endDate'));

        // Download the PDF file
        return $pdf->download('report_'.$startDate.'_to_'.$endDate.'.pdf');
    }

}
