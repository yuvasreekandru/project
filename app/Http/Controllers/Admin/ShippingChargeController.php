<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class ShippingChargeController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ShippingCharge::getRecord();
        $data['header_title'] = "Shipping Charge";
        return view("admin.shipping_charge.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Shipping Charge";
        return view("admin.shipping_charge.add", $data);
    }
    public function insert(Request $req)
    {

        $ShippingCharge = new ShippingCharge();
        $ShippingCharge->name = trim($req->name);
        $ShippingCharge->price = trim($req->price);
        $ShippingCharge->status = trim($req->status);
        $ShippingCharge->save();
        return redirect('admin/shipping_charge/list')->with("success", "Shipping Charge successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ShippingCharge::getSingle($id);
        $data['header_title'] = "Edit Shipping Charge";
        return view("admin.shipping_charge.edit", $data);
    }

    public function update($id, Request $req)
    {

        $ShippingCharge = ShippingCharge::getSingle($id);
        $ShippingCharge->name = trim($req->name);
        $ShippingCharge->price = trim($req->price);
        $ShippingCharge->status = trim($req->status);
        $ShippingCharge->save();

        return redirect('admin/shipping_charge/list')->with("success", "Shipping Charge successfully updated");
    }
    public function delete($id)
    {
        $ShippingCharge = ShippingCharge::getSingle($id);
        $ShippingCharge->is_delete = 1;
        $ShippingCharge->save();
        return redirect()->back()->with("success", "Shipping Charge successfully deleted");
    }
}
