<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function create()
    {
        return view('seller::account');
    }
}
