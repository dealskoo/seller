<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config('seller.route.prefix'))->name('seller.')->group(function () {

    Route::middleware([])->group(function () {

    });
});
