<?php

namespace Dealskoo\Seller\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SellerPasswordReset
{
    use SerializesModels;

    public $seller;

    public function __construct($seller)
    {
        $this->seller = $seller;
    }
}
