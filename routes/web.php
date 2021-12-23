<?php

use Dealskoo\Seller\Http\Controllers\Auth\AuthenticatedSessionController;
use Dealskoo\Seller\Http\Controllers\Auth\RegisteredSellerController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('seller.route.prefix'))->name('seller.')->group(function () {

    Route::get('/register', [RegisteredSellerController::class, 'create']);
    Route::post('/register', [RegisteredSellerController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::middleware([])->group(function () {

    });
});
