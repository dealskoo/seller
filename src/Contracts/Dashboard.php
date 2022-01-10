<?php

namespace Dealskoo\Seller\Contracts;

use Illuminate\Http\Request;

interface Dashboard
{
    public function handle(Request $request);
}
