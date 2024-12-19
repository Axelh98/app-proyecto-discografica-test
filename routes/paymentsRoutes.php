
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('/create-payment', [MercadoPagoController::class, 'createPayment'])->name('payment.create');
Route::get('/payment-success', [MercadoPagoController::class, 'success'])->name('payment.success');
Route::get('/payment-failure', [MercadoPagoController::class, 'failure'])->name('payment.failure');
Route::get('/payment-pending', [MercadoPagoController::class, 'pending'])->name('payment.pending');


?>
