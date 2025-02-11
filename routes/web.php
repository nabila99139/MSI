<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;

Route::get('/', [ContractController::class, 'contract'])->name('contract');
Route::post('/contract_hitung', [ContractController::class, 'contract_hitung'])->name('contract_hitung');