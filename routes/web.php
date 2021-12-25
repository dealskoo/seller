<?php

use Dealskoo\Seller\Http\Controllers\Auth\AuthenticatedSessionController;
use Dealskoo\Seller\Http\Controllers\Auth\RegisteredSellerController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('seller.route.prefix'))->name('seller.')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [RegisteredSellerController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredSellerController::class, 'store'])->name('register');
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    });

    Route::middleware([])->group(function () {

    });
});
