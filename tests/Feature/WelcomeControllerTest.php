<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Seller\Models\Seller;
use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome()
    {
        $response = $this->get(route('seller.welcome'));
        $response->assertRedirect(route('seller.dashboard'));
    }
}
