<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Seller\Tests\TestCase;

class PermissionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_permissions()
    {
        self::assertNotNull(PermissionManager::getPermission('sellers.index'));
        self::assertNotNull(PermissionManager::getPermission('sellers.show'));
        self::assertNotNull(PermissionManager::getPermission('sellers.edit'));
    }
}
