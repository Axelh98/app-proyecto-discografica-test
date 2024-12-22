<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\PaypalController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Ruta de paypal


// RUTAS DE MERCADO PAGO
Route::post('/create-preference', [MercadoPagoController::class, 'createPaymentPreference']);
Route::get('/mercadopago/success', [MercadoPagoController::class, 'success'])->name('mercadopago.success');
Route::get('/mercadopago/failed', [MercadoPagoController::class, 'failed'])->name('mercadopago.failed');

// RUTAS DE PAYPAL
Route::post('/create-order', [PaypalController::class, 'createOrder']);
Route::post('/capture-order', [PaypalController::class, 'captureOrder']);

