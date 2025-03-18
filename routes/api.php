<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::controller(OrderController::class)->group(function() {
    Route::post('/v1/webhook/midtrans',  'webhookPayment')->name('user.payment-status');
});
