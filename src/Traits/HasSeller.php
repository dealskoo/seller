<?php

namespace Dealskoo\Seller\Traits;

use Dealskoo\Seller\Models\Seller;

trait HasSeller
{
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
