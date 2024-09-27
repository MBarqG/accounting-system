<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

final class ChartsController extends Controller
{
    public function chart()
    {
        $payments = Payment::select('amount', 'payment_date')->orderBy('payment_date')->get();
        $debts = Debt::select('amount', 'debt_date')->orderBy('debt_date')->get();

        $totalPayments = $payments->sum('amount');
        $totalDebts = $debts->sum('amount');

        // Prepare chart data (example grouping by day)
        $chartData = [];
        foreach ($payments as $payment) {
            $date = $payment->payment_date;
            $chartData[$date]['payments'] = isset($chartData[$date]['payments']) ? $chartData[$date]['payments'] + $payment->amount : $payment->amount;
        }

        foreach ($debts as $debt) {
            $date = $debt->debt_date;
            $chartData[$date]['debts'] = isset($chartData[$date]['debts']) ? $chartData[$date]['debts'] + $debt->amount : $debt->amount;
        }
        ksort($chartData);




        $chartDataType = [];
        $paymentstype = Payment::select('amount', 'type')->get();
        $debtstype = Debt::select('amount', 'type')->get();


        foreach ($paymentstype as $payment) {
            $type = $payment->type;
            $chartDataType[$type]['payments'] = isset($chartDataType[$type]['payments']) ? $chartDataType[$type]['payments'] + $payment->amount : $payment->amount;
        }

        foreach ($debtstype as $debt) {
            $type = $debt->type;
            $chartDataType[$type]['debts'] = isset($chartDataType[$type]['debts']) ? $chartDataType[$type]['debts'] + $debt->amount : $debt->amount;
        }
        return view('charts.chart', compact('totalPayments', 'totalDebts', 'chartData','chartDataType'));
    }
}
