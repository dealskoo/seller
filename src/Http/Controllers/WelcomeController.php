<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Contracts\Welcome;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class WelcomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function handle(Request $request, Welcome $welcome)
    {
        return $welcome->handle($request);
    }
}
