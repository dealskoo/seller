<?php

namespace Dealskoo\Seller\Tests\Feature;

use Dealskoo\Seller\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list()
    {
        $this->get('seller.notification.list');
    }

    public function test_unread()
    {
        $this->get('seller.notification.unread');
    }

    public function test_all_read()
    {
        $this->get('seller.notification.all_read');
    }

    public function test_show()
    {
        $this->get('seller.notification.show');
    }
}
