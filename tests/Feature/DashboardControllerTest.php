<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.dashboard'));
        $response->assertStatus(200);
    }
}
