<?php

namespace Dealskoo\Seller\Listeners;

use Dealskoo\Seller\Events\SellerRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailVerificationNotification
{
    public function handle(SellerRegistered $event)
    {
        if ($event->seller instanceof MustVerifyEmail && !$event->seller->hasVerifiedEmail()) {
            $event->seller->sendEmailVerificationNotification();
        }
    }
}
