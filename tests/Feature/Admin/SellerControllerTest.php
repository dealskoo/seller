<?php

namespace Dealskoo\Seller\Tests\Feature\Admin;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SellerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.sellers.index'));
        $response->assertStatus(200);
    }

    public function test_table()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.sellers.index', ['HTTP_X-Requested-With' => 'XMLHttpRequest']));
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $admin = Admin::factory()->isOwner()->create();
        $seller = Seller::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.sellers.show', $seller));
        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $admin = Admin::factory()->isOwner()->create();
        $seller = Seller::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.sellers.edit', $seller));
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $admin = Admin::factory()->isOwner()->create();
        $seller = Seller::factory()->create();
        $response = $this->actingAs($admin, 'admin')->put(route('admin.sellers.update', $seller), [
            'status' => false
        ]);
        $response->assertStatus(302);
        $seller->refresh();
        $this->assertEquals(false, $seller->status);
    }
}
