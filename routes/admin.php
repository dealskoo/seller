<?php

use Dealskoo\Seller\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'admin_locale'])->prefix(config('admin.route.prefix'))->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {

    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::resource('sellers', SellerController::class)->except(['create', 'store', 'destroy']);
    });

});
