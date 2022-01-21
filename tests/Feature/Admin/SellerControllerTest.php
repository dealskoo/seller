<?php

namespace Dealskoo\Seller\Tests\Feature\Admin;

use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SellerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $this->get(route('seller.sellers.index'));
    }

    public function test_table()
    {
        $this->get(route('seller.sellers.index', ['HTTP_X-Requested-With' => 'XMLHttpRequest']));
    }

    public function test_show()
    {
        $this->get(route('seller.sellers.show'));
    }

    public function test_edit()
    {
        $this->get(route('seller.sellers.edit'));
    }

    public function test_update()
    {
        $this->put(route('seller.sellers.update'));
    }
}
