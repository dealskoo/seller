<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Notifications\EmailChangeNotification;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.account.profile'));
        $response->assertStatus(200);
    }

    public function test_update_profile()
    {
        $seller = Seller::factory()->create();
        $seller1 = Seller::factory()->make();
        $response = $this->actingAs($seller, 'seller')->post(route('seller.account.profile'), $seller1->only([
            'name',
            'bio',
            'company_name',
            'website'
        ]));
        $response->assertStatus(302);
        $seller->refresh();
        $this->assertEquals($seller1->name, $seller->name);
    }

    public function test_avatar()
    {
        Storage::fake();
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->post(route('seller.account.avatar'), [
            'file' => UploadedFile::fake()->image('file.jpg')
        ]);
        $response->assertStatus(200);
        Storage::assertExists('seller/avatars/' . $seller->id . '.jpg');
    }

    public function test_email()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.account.email'));
        $response->assertStatus(200);
    }

    public function test_update_email()
    {
        Notification::fake();
        $seller = Seller::factory()->create();
        $seller1 = Seller::factory()->make();
        $response = $this->actingAs($seller, 'seller')->post(route('seller.account.email'), $seller1->only([
            'email'
        ]));
        $response->assertStatus(302);
        Notification::assertSentTo(Notification::route('mail', $seller1->email), EmailChangeNotification::class);
    }

    public function test_email_verify()
    {
        Notification::fake();
        $seller = Seller::factory()->create();
        $seller1 = Seller::factory()->make();
        $response = $this->actingAs($seller, 'seller')->post(route('seller.account.email'), $seller1->only([
            'email'
        ]));
        $response->assertStatus(302);
        Notification::assertSentTo(Notification::route('mail', $seller1->email), EmailChangeNotification::class, function ($notification) use ($seller) {
            $response = $this->actingAs($seller, 'seller')->get($notification->url);
            $response->assertSessionHasNoErrors();
            return true;
        });
    }

    public function test_password()
    {
        $seller = Seller::factory()->create();
        $response = $this->actingAs($seller, 'seller')->get(route('seller.account.password'));
        $response->assertStatus(200);
    }

    public function test_update_password()
    {
        $password = '12345678';
        $new_password = '23456789';
        $seller = Seller::factory()->create();
        $seller->password = Hash::make($password);
        $seller->save();
        $response = $this->actingAs($seller, 'seller')->post(route('seller.account.password'), [
            'password' => $password,
            'new_password' => $new_password,
            'new_password_confirmation' => $new_password
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }
}
