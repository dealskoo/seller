<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        return view('seller::seller.index');
    }

    public function show(Request $request)
    {
        return view('seller::seller.show');
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }
}