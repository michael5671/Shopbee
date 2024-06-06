<?php

use App\Http\Controllers\Sales\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;

Route::get('/payment/index', [PaymentController::class, 'index']);
Route::post('/payment/submit', [PaymentController::class, 'submit']);
