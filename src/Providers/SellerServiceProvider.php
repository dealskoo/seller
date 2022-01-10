<?php

namespace Dealskoo\Seller\Providers;

use Dealskoo\Seller\Contracts\Dashboard;
use Dealskoo\Seller\Contracts\Searcher;
use Dealskoo\Seller\Contracts\Support\DefaultDashboard;
use Dealskoo\Seller\Contracts\Support\DefaultSearcher;
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
        $this->app->bind(Dashboard::class, DefaultDashboard::class);
        $this->app->bind(Searcher::class, DefaultSearcher::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([

            ]);
        }

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
