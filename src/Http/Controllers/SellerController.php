<?php

namespace Dealskoo\Seller\Http\Controllers;

use Dealskoo\Seller\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->table($request);
        } else {
            return view('seller::seller.index');
        }
    }

    private function table(Request $request)
    {
        return [];
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
