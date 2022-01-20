<?php

namespace Dealskoo\Seller\Tests\Feature\Auth;

use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get(route('seller.register'));

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post(route('seller.register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'country_id' => 1
        ]);

        $this->assertAuthenticated('seller');
        $response->assertRedirect(route('seller.dashboard'));
    }
}
