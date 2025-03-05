<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'getVatTaxCalculatorForm']);
Route::post('/', [ProductController::class, 'calculateVatTax'])->name('calculate-vat-tax');
