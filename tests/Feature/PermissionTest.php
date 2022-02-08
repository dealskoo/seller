<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions()
    {
        self::assertNotNull(PermissionManager::getPermission('sellers.index'));
        self::assertNotNull(PermissionManager::getPermission('sellers.show'));
        self::assertNotNull(PermissionManager::getPermission('sellers.edit'));
    }
}
