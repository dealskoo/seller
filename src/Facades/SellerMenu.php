<?php

namespace Dealskoo\Seller\Facades;

use Illuminate\Support\Facades\Facade;

class SellerMenu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'seller_menu';
    }

}
