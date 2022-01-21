<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile()
    {
        $response = $this->get('seller.account.profile');
    }

    public function test_update_profile()
    {
        $response = $this->post('seller.account.profile');
    }

    public function test_avatar()
    {
        $response = $this->post('seller.account.avatar');
    }

    public function test_email()
    {
        $response = $this->get('seller.account.email');
    }

    public function test_update_email()
    {
        $response = $this->post('seller.account.email');
    }

    public function test_email_verify()
    {
        $response = $this->get('seller.account.email.verify');
    }

    public function test_password()
    {
        $response = $this->get('seller.account.password');
    }

    public function test_update_password()
    {
        $response = $this->post('seller.account.password');
    }
}
