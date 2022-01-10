<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Contracts\Searcher;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function handle(Request $request, Searcher $searcher)
    {
        return $searcher->handle($request);
    }
}
