<?php

namespace Dealskoo\Seller\Tests\Feature\Auth;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get(route('seller.login'));

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $seller = Seller::factory()->create();

        $response = $this->post(route('seller.login'), [
            'email' => $seller->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('seller');
        $response->assertRedirect(route('seller.dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $seller = Seller::factory()->create();

        $this->post(route('seller.login'), [
            'email' => $seller->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_user_not_authenticate_inactive()
    {
        $response = $this->get(route('seller.banned'));
        $response->assertStatus(200);
    }

    public function test_user_authenticate_inactive()
    {
        $seller = Seller::factory()->inactive()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.dashboard'));
        $response->assertRedirect(route('seller.banned'));
    }

    public function test_user_logout()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->post(route('seller.logout'));
        $response->assertRedirect(route('seller.login'));
    }
}
