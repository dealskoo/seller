<?php

namespace Dealskoo\Seller\Events;

use Dealskoo\Seller\Models\Seller;
use Illuminate\Queue\SerializesModels;

class SellerRegistered
{
    use  SerializesModels;

    public $seller;

    public function __construct(Seller $seller)
    {
        $this->seller = $seller;
    }
}
