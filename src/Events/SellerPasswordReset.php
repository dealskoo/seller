<?php

namespace Dealskoo\Seller\Events;

use Dealskoo\Seller\Models\Seller;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SellerPasswordReset
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $seller;

    public function __construct(Seller $seller)
    {
        $this->seller = $seller;
    }
}
