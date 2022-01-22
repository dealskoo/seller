<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Seller\Facades\SellerMenu;
use Dealskoo\Seller\Tests\TestCase;

class MenuTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_menu()
    {
        self::assertNotNull(AdminMenu::findBy('title', 'seller::seller.sellers'));
        self::assertNotNull(SellerMenu::findBy('title', 'seller::seller.dashboard'));
    }
}
