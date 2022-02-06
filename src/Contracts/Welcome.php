<?php

namespace Dealskoo\Seller\Contracts;

use Illuminate\Http\Request;

interface Welcome
{
    public function handle(Request $request);
}
