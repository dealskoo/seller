<?php

namespace Dealskoo\Seller\Tests;


use Dealskoo\Seller\Facades\SellerMenu;
use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Providers\SellerServiceProvider;
use Dealskoo\Seller\Tests\Http\Kernel;

abstract class TestCase extends \Orchestra\Testbench\TestCase
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

    public function ignorePackageDiscoveriesFrom()
    {
        return [];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => ''
        ]);
        $app['config']->set('auth.guards.admin', [
            'driver' => 'session',
            'provider' => 'admins',
        ]);
        $app['config']->set('auth.providers.admins', [
            'driver' => 'eloquent',
            'model' => \Dealskoo\Admin\Models\Admin::class,
        ]);
        $app['config']->set('auth.passwords.admins', [
            'provider' => 'admins',
            'table' => 'admin_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ]);

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

        $app['config']->set('auth.password_length', 8);
    }

    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton(\Illuminate\Contracts\Http\Kernel::class, Kernel::class);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
