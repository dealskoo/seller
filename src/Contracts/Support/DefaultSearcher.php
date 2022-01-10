<?php

namespace Dealskoo\Seller\Contracts\Support;

use Dealskoo\Seller\Contracts\Searcher;
use Illuminate\Http\Request;

class DefaultSearcher implements Searcher
{
    public function handle(Request $request)
    {
        return view('seller::dashboard');
    }
}
