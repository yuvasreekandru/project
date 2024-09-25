<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use Auth;
use Str;
class ProductTypeController extends Controller
{

    public function list()
    {
        $data['getRecord'] = ProductType::getRecord();
        $data['header_title'] = "ProductType";
        return view("admin.product_type.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Product Type";
        return view("admin.product_type.add", $data);
    }
    public function insert(Request $req)
    {
        // request()->validate([
        //     'slug' => 'required|unique:product_types',
        // ]);
        $product_type = New ProductType();
        $product_type->product_type = trim($req->product_type);
        $product_type->status = trim($req->status);
        $product_type->created_by = Auth::user()->id;
        $product_type->save();
        return redirect('admin/product_type/list')->with("success","Product Type successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ProductType::getSingle($id);
        $data['header_title'] = "Edit Product Type";
        return view("admin.product_type.edit", $data);
    }

    public function update($id, Request $req)
    {
        // request()->validate([
        //     'slug' => 'required|unique:product_types,slug,'.$id,
        // ]);
        $p_type = ProductType::getSingle($id);
        $p_type->product_type = trim($req->product_type);
        $p_type->status = trim($req->status);
        $p_type->save();

        return redirect('admin/product_type/list')->with("success","Product Type successfully updated");
    }
    public function delete($id)
    {
        $product_type = ProductType::getSingle($id);
        $product_type->is_delete = 1;
        $product_type->save();
        return redirect()->back()->with("success","Product Type successfully deleted");
    }
}
