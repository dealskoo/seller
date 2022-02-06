<?php

namespace Dealskoo\Seller\Contracts\Support;

use Dealskoo\Seller\Contracts\Welcome;
use Illuminate\Http\Request;

class DefaultWelcome implements Welcome
{
    public function handle(Request $request)
    {
        return redirect(route('seller.dashboard'), 301);
    }
}
