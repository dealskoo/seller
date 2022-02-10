<?php

namespace Dealskoo\Seller\Http\Controllers\Admin;

use Carbon\Carbon;
use Dealskoo\Seller\Models\Seller;
use Dealskoo\Admin\Http\Controllers\Controller as AdminController;
use Illuminate\Http\Request;

class SellerController extends AdminController
{
    public function index(Request $request)
    {
        abort_if(!$request->user()->canDo('sellers.index'), 403);
        if ($request->ajax()) {
            return $this->table($request);
        } else {
            return view('seller::admin.seller.index');
        }
    }

    private function table(Request $request)
    {
        $start = $request->input('start', 0);
        $limit = $request->input('length', 10);
        $keyword = $request->input('search.value');
        $columns = ['id', 'name', 'slug', 'email', 'country_id', 'source', 'status', 'created_at', 'updated_at'];
        $column = $columns[$request->input('order.0.column', 0)];
        $desc = $request->input('order.0.dir', 'desc');
        $query = Seller::query();
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
            $query->orWhere('slug', 'like', '%' . $keyword . '%');
            $query->orWhere('email', 'like', '%' . $keyword . '%');
        }
        $query->orderBy($column, $desc);
        $count = $query->count();
        $sellers = $query->skip($start)->take($limit)->get();
        $rows = [];
        $can_view = $request->user()->canDo('sellers.show');
        $can_edit = $request->user()->canDo('sellers.edit');
        foreach ($sellers as $seller) {
            $row = [];
            $row[] = $seller->id;
            $row[] = '<img src="' . $seller->avatar_url . '" alt="' . $seller->name . '" title="' . $seller->name . '" class="me-2 rounded-circle"><p class="m-0 d-inline-block align-middle font-16">' . $seller->name . '</p>';
            $row[] = $seller->slug;
            $row[] = $seller->email;
            $row[] = $seller->country->name;
            $row[] = $seller->source;
            $row[] = $seller->status ? '<span class="badge bg-success">' . __('seller::seller.active') . '</span>' : '<span class="badge bg-danger">' . __('seller::seller.inactive') . '</span>';
            $row[] = Carbon::parse($seller->created_at)->format('Y-m-d H:i:s');
            $row[] = Carbon::parse($seller->updated_at)->format('Y-m-d H:i:s');

            $view_link = '';
            if ($can_view) {
                $view_link = '<a href="' . route('admin.sellers.show', $seller) . '" class="action-icon"><i class="mdi mdi-eye"></i></a>';
            }

            $edit_link = '';
            if ($can_edit) {
                $edit_link = '<a href="' . route('admin.sellers.edit', $seller) . '" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a>';
            }
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

    public function show(Request $request, $id)
    {
        abort_if(!$request->user()->canDo('sellers.show'), 403);
        $seller = Seller::query()->findOrFail($id);
        return view('seller::admin.seller.show', ['seller' => $seller]);
    }

    public function edit(Request $request, $id)
    {
        abort_if(!$request->user()->canDo('sellers.edit'), 403);
        $seller = Seller::query()->findOrFail($id);
        return view('seller::admin.seller.edit', ['seller' => $seller]);
    }

    public function update(Request $request, $id)
    {
        abort_if(!$request->user()->canDo('sellers.edit'), 403);
        $seller = Seller::query()->findOrFail($id);
        $seller->status = $request->boolean('status', false);
        $seller->save();
        return back()->with('success', __('admin::admin.update_success'));
    }
}
