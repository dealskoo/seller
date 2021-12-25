<?php

namespace Dealskoo\Seller\Http\Controllers\Auth;

use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredSellerController extends Controller
{
    public function create()
    {
        return view('seller::auth.register');
    }

    public function store()
    {

    }
}
