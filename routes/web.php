<?php

use Dealskoo\Seller\Http\Controllers\AccountController;
use Dealskoo\Seller\Http\Controllers\Auth\AuthenticatedSessionController;
use Dealskoo\Seller\Http\Controllers\Auth\ConfirmablePasswordController;
use Dealskoo\Seller\Http\Controllers\Auth\EmailVerificationNotificationController;
use Dealskoo\Seller\Http\Controllers\Auth\EmailVerificationPromptController;
use Dealskoo\Seller\Http\Controllers\Auth\NewPasswordController;
use Dealskoo\Seller\Http\Controllers\Auth\PasswordResetLinkController;
use Dealskoo\Seller\Http\Controllers\Auth\RegisteredSellerController;
use Dealskoo\Seller\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->prefix(config('seller.route.prefix'))->name('seller.')->group(function () {

    Route::middleware(['guest:seller'])->group(function () {
        Route::get('/', function () {
            return redirect(\route('seller.dashboard'), 301);
        });

        Route::get('/register', [RegisteredSellerController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredSellerController::class, 'store']);
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware(['auth:seller'])->get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');

    Route::middleware(['auth:seller', 'signed', 'throttle:6,1'])->get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->name('verification.verify');

    Route::middleware(['auth:seller', 'throttle:6,1'])->post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->name('verification.send');

    Route::middleware(['auth:seller', 'verified:seller.verification.notice'])->group(function () {
        Route::get('/dashboard', function () {
            return view('seller::dashboard');
        })->name('dashboard');

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::middleware(['throttle:6,1'])->post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/account', [AccountController::class, 'create'])->name('account');

        Route::middleware(['password.confirm:seller.password.confirm'])->group(function () {

        });
    });
});
