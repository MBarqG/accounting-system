<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ReportController;


Route::get('/customer/add', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');


Route::get('/', [CustomerController::class, 'Dashboard'])->name('Dashboard');
Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.details');
Route::get('/search', [CustomerController::class, 'search'])->name('search.customers');



Route::get('/payment/add', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');

Route::get('/debt/add', [DebtController::class, 'create'])->name('debt.create');
Route::post('/debt/store', [DebtController::class, 'store'])->name('debt.store');

Route::get('/charts', [ChartsController::class, 'chart'])->name('charts.chart');


Route::get('/customers/{id}/pdf', [CustomerController::class, 'generatePDF'])->name('customers.pdf');


Route::get('/report', [ReportController::class, 'showForm'])->name('report.form');
Route::post('/report/results', [ReportController::class, 'getResults'])->name('report.results');
Route::get('/report/pdf', [ReportController::class, 'downloadPDF'])->name('report.pdf');
