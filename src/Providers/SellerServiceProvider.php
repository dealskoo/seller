<?php

namespace Dealskoo\Seller\Providers;

use Illuminate\Support\ServiceProvider;

class SellerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/seller.php', 'seller');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'seller');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'seller');
        $this->publishes([
            __DIR__ . '/../../config/seller.php' => config_path('seller.php')
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/seller')
        ], 'public');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/seller'),
        ], 'lang');
    }
}
