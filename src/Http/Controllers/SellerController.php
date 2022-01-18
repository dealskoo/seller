<?php

namespace Dealskoo\Seller\Http\Controllers;

use Carbon\Carbon;
use Dealskoo\Seller\Models\Seller;
use Dealskoo\Admin\Http\Controllers\Controller as AdminController;
use Illuminate\Http\Request;

class SellerController extends AdminController
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
        $start = $request->input('start', 0);
        $limit = $request->input('length', 10);
        $keyword = $request->input('search.value');
        $columns = ['id', 'name', 'created_at', 'updated_at'];
        $column = $columns[$request->input('order.0.column', 0)];
        $desc = $request->input('order.0.dir', 'desc');
        $query = Seller::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        $query->orderBy($column, $desc);
        $count = $query->count();
        $sellers = $query->skip($start)->take($limit)->get();
        $rows = [];
        foreach ($sellers as $seller) {
            $row = [];
            $row[] = $seller->id;
            $row[] = $seller->name;
            $row[] = Carbon::parse($seller->created_at)->format('Y-m-d H:i:s');
            $row[] = Carbon::parse($seller->updated_at)->format('Y-m-d H:i:s');

            $view_link = '<a href="' . route('admin.sellers.show', $seller) . '" class="action-icon"><i class="mdi mdi-eye"></i></a>';

            $edit_link = '<a href="' . route('admin.sellers.edit', $seller) . '" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>';

            $row[] = $view_link . $edit_link;
            $rows[] = $row;
        }
        return [
            'draw' => $request->draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $rows
        ];
    }

    public function show(Request $request)
    {
        return view('seller::seller.show');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}
