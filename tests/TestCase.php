<?php

namespace Dealskoo\Seller\Tests;


use Dealskoo\Seller\Facades\SellerMenu;
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
