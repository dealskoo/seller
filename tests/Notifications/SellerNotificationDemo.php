<?php

namespace Dealskoo\Seller\Tests\Notifications;

use Dealskoo\Seller\Notifications\SellerNotification;

class SellerNotificationDemo extends SellerNotification
{
    protected function title($notifiable)
    {
        return '';
    }

    public function icon($notifiable)
    {
        return '';
    }

    public function message($notifiable)
    {
        return '';
    }

    public function data($notifiable)
    {
        return [];
    }

    public function view($notifiable)
    {
        return 'seller::nodata';
    }
}
