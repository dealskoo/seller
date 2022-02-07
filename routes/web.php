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
use Dealskoo\Seller\Http\Controllers\DashboardController;
use Dealskoo\Seller\Http\Controllers\LocalizationController;
use Dealskoo\Seller\Http\Controllers\NotificationController;
use Dealskoo\Seller\Http\Controllers\SearchController;
use Dealskoo\Seller\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'seller_locale'])->prefix(config('seller.route.prefix'))->name('seller.')->group(function () {

    Route::get('/locale/{locale}', [LocalizationController::class, '__invoke'])->name('locale');

    Route::view('/banned', 'seller::auth.banned')->name('banned');

    Route::middleware(['guest:seller'])->group(function () {
        Route::get('/', [WelcomeController::class, 'handle'])->name('welcome');

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

    Route::middleware(['auth:seller', 'verified:seller.verification.notice', 'seller_active'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'handle'])->name('dashboard');

        Route::get('/search', [SearchController::class, 'handle'])->name('search');

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

        Route::middleware(['throttle:6,1'])->post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::prefix('/account')->name('account.')->group(function () {
            Route::view('/', 'seller::account.profile')->name('profile');

            Route::post('/', [AccountController::class, 'store'])->name('profile');

            Route::post('/avatar', [AccountController::class, 'avatar'])->name('avatar');

            Route::view('/email', 'seller::account.email')->name('email');

            Route::middleware(['throttle:6,1'])->post('/email', [AccountController::class, 'email'])->name('email');

            Route::middleware(['signed', 'throttle:6,1'])->get('/email/verify/{hash}', [AccountController::class, 'emailVerify'])->name('email.verify');

            Route::view('/password', 'seller::account.password')->name('password');

            Route::post('/password', [AccountController::class, 'password'])->name('password');
        });

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::name('notification.')->group(function () {
            Route::get('/notifications', [NotificationController::class, 'list'])->name('list');
            Route::get('/notifications/unread', [NotificationController::class, 'unread'])->name('unread');
            Route::get('/notifications/all_read', [NotificationController::class, 'allRead'])->name('all_read');
            Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('show');
        });

        Route::middleware(['password.confirm:seller.password.confirm'])->group(function () {

        });

    });
});
