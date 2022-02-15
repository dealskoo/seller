<?php

namespace Dealskoo\Seller\Tests;

use Dealskoo\Seller\Facades\SellerMenu;
use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Providers\SellerServiceProvider;
use Dealskoo\Seller\Tests\Http\Kernel;

abstract class TestCase extends \Dealskoo\Admin\Tests\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SellerServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'SellerMenu' => SellerMenu::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('auth.guards.seller', [
            'driver' => 'session',
            'provider' => 'sellers',
        ]);
        $app['config']->set('auth.providers.sellers', [
            'driver' => 'eloquent',
            'model' => Seller::class,
        ]);
        $app['config']->set('auth.passwords.sellers', [
            'provider' => 'sellers',
            'table' => 'seller_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ]);
    }

    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton(\Illuminate\Contracts\Http\Kernel::class, Kernel::class);
    }
}
