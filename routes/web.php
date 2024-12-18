<?php

use App\Http\Controllers\Delivery\DeliveryController;
use Illuminate\Support\Facades\Route;

Route::get('delivery-method', [DeliveryController::class, 'show'])->name('delivery-method');
