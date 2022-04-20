<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Seller\Facades\SellerMenu;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_menu()
    {
        $this->assertNotNull(AdminMenu::findBy('title', 'seller::seller.sellers'));
        $this->assertNotNull(SellerMenu::findBy('title', 'seller::seller.dashboard'));
    }
}
