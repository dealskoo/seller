<?php

namespace Dealskoo\Seller\Tests\Feature\Auth;

use Dealskoo\Seller\Events\SellerEmailVerified;
use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Notifications\VerifySellerEmail;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $seller = Seller::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($seller, 'seller')->get(route('seller.verification.notice'));

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        $seller = Seller::factory()->create([
            'email_verified_at' => null,
        ]);

        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            'seller.verification.verify',
            now()->addMinutes(60),
            ['id' => $seller->id, 'hash' => sha1($seller->email)]
        );

        $response = $this->actingAs($seller, 'seller')->get($verificationUrl);

        Event::assertDispatched(SellerEmailVerified::class);
        $this->assertTrue($seller->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('seller.dashboard'));
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $seller = Seller::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'seller.verification.verify',
            now()->addMinutes(60),
            ['id' => $seller->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($seller, 'seller')->get($verificationUrl);

        $this->assertFalse($seller->fresh()->hasVerifiedEmail());
    }

    public function test_resend_email()
    {
        Notification::fake();
        $seller = Seller::factory()->unverified()->create();

        $this->actingAs($seller, 'seller')->post(route('seller.verification.send'));

        Notification::assertSentTo($seller, VerifySellerEmail::class);
    }
}
