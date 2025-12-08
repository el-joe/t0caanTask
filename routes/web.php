<?php

use App\Http\Controllers\Site\PaymentController;
use Illuminate\Support\Facades\Route;


Route::get('payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('payment-callback/{status}', [PaymentController::class, 'callbackStatus'])->name('payment.callbackStatus');
Route::get('payment/{slug}', [PaymentController::class, 'show'])->name('payment.show');
Route::post('payment/pay-now/{order}', [PaymentController::class, 'payNow'])->name('payment.payNow');
