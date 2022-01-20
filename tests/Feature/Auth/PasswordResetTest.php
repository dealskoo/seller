<?php

namespace Dealskoo\Seller\Tests\Feature\Auth;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Notifications\ResetSellerPassword;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get(route('seller.password.request'));

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $seller = Seller::factory()->create();

        $this->post(route('seller.password.email'), ['email' => $seller->email]);

        Notification::assertSentTo($seller, ResetSellerPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $seller = Seller::factory()->create();

        $this->post(route('seller.password.email'), ['email' => $seller->email]);

        Notification::assertSentTo($seller, ResetSellerPassword::class, function ($notification) {
            $response = $this->get(route('seller.password.reset', $notification->token));

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $seller = Seller::factory()->create();

        $this->post(route('seller.password.email'), ['email' => $seller->email]);

        Notification::assertSentTo($seller, ResetSellerPassword::class, function ($notification) use ($seller) {
            $response = $this->post(route('seller.password.update'), [
                'token' => $notification->token,
                'email' => $seller->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
