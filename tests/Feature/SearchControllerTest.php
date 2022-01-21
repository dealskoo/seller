<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_search()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.search'));
        $response->assertStatus(200);
    }
}
