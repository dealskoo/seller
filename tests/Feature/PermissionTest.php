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
        $this->assertNotNull(PermissionManager::getPermission('sellers.management'));
        $this->assertNotNull(PermissionManager::getPermission('sellers.index'));
        $this->assertNotNull(PermissionManager::getPermission('sellers.show'));
        $this->assertNotNull(PermissionManager::getPermission('sellers.edit'));
    }
}
