<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Tests\Notifications\SellerNotificationDemo;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.notification.list'));
        $response->assertStatus(200);
    }

    public function test_unread()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.notification.unread'));
        $response->assertStatus(200);
    }

    public function test_all_read()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.notification.all_read'));
        $response->assertStatus(302);
    }

    public function test_show()
    {
        $seller = Seller::factory()->create();
        $seller->notify(new SellerNotificationDemo());
        $notification = $seller->notifications->last();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.notification.show', $notification));
        $response->assertStatus(200);
    }
}
