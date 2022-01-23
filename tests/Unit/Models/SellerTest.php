<?php

namespace Dealskoo\Seller\Tests\Unit\Models;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Notifications\ResetSellerPassword;
use Dealskoo\Seller\Notifications\VerifySellerEmail;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class SellerTest extends TestCase
{
    use RefreshDatabase;

    public function test_avatar_url()
    {
        $seller = Seller::factory()->create();
        $seller->avatar = 'avatar.png';
        $this->assertEquals($seller->avatar_url, Storage::url($seller->avatar));
    }

    public function test_send_password_reset_notification()
    {
        Notification::fake();
        $seller = Seller::factory()->create();
        $seller->sendPasswordResetNotification('aaa');
        Notification::assertSentTo($seller, ResetSellerPassword::class);
    }

    public function test_send_email_verification_notification()
    {
        Notification::fake();
        $seller = Seller::factory()->create();
        $seller->sendEmailVerificationNotification();
        Notification::assertSentTo($seller, VerifySellerEmail::class);
    }

    public function test_country()
    {
        $seller = Seller::factory()->create();
        $this->assertNotNull($seller->country);
    }
}
