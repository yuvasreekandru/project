<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\DiscountCode;



class DiscountController extends Controller
{
    public function list()
    {
        $data['getRecord'] = DiscountCode::getRecord();
        $data['header_title'] = "Discont Code";
        return view("admin.discount_code.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Discount Code";
        return view("admin.discount_code.add", $data);
    }
    public function insert(Request $req)
    {

        $DiscountCode = new DiscountCode();
        $DiscountCode->name = trim($req->name);
        $DiscountCode->type = trim($req->type);
        $DiscountCode->percent_amount = trim($req->percent_amount);
        $DiscountCode->expire_date = trim($req->expire_date);
        $DiscountCode->status = trim($req->status);
        $DiscountCode->save();
        return redirect('admin/discount_code/list')->with("success", "Discount Code successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = DiscountCode::getSingle($id);
        $data['header_title'] = "Edit Discount Code";
        return view("admin.discount_code.edit", $data);
    }

    public function update($id, Request $req)
    {

        $DiscountCode = DiscountCode::getSingle($id);
        $DiscountCode->name = trim($req->name);
        $DiscountCode->type = trim($req->type);
        $DiscountCode->percent_amount = trim($req->percent_amount);
        $DiscountCode->expire_date = trim($req->expire_date);
        $DiscountCode->status = trim($req->status);
        $DiscountCode->save();

        return redirect('admin/discount_code/list')->with("success", "Discount Code successfully updated");
    }
    public function delete($id)
    {
        $DiscountCode = DiscountCode::getSingle($id);
        $DiscountCode->is_delete = 1;
        $DiscountCode->save();
        return redirect()->back()->with("success", "Discount Code successfully deleted");
    }


}
