<?php

namespace Dealskoo\Seller\Contracts;

use Illuminate\Http\Request;

interface Searcher
{
    public function handle(Request $request);
}
