<?php

namespace Dealskoo\Seller\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    public function __construct()
    {
//        $this->middleware('auth:seller');
    }

    public function guard()
    {
//        return Auth::guard('seller');
    }
}
