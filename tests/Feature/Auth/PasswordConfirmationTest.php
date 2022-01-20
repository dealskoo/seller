<?php

namespace Dealskoo\Seller\Tests\Feature\Auth;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered()
    {
        $seller = Seller::factory()->create();

        $response = $this->actingAs($seller, 'seller')->get(route('seller.password.confirm'));

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed()
    {
        $seller = Seller::factory()->create();

        $response = $this->actingAs($seller, 'seller')->post(route('seller.password.confirm'), [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $seller = Seller::factory()->create();

        $response = $this->actingAs($seller, 'seller')->post(route('seller.password.confirm'), [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
