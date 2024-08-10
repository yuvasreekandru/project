<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Str;

class PartnerController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Partner::getRecord();
        $data['header_title'] = "Partner";
        return view("admin.partner.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Partner";
        return view("admin.partner.add", $data);
    }
    public function insert(Request $req)
    {

        $Partner = new Partner();
        $Partner->button_link = trim($req->button_link);

        $file = $req->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) .'.'. $ext;
        $file->move('upload/partner/', $filename);

        $Partner->image_name = trim($filename);
        $Partner->status = trim($req->status);

        $Partner->save();
        return redirect('admin/partner/list')->with("success", "Partner successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = Partner::getSingle($id);
        $data['header_title'] = "Edit Partner";
        return view("admin.partner.edit", $data);
    }

    public function update($id, Request $req)
    {

        $Partner = Partner::getSingle($id);
        $Partner->button_link = trim($req->button_link);

        if(!empty($req->file('image_name')))
        {
            $file = $req->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) .'.'. $ext;
            $file->move('upload/partners/', $filename);

            $Partner->image_name = trim($filename);
        }

        $Partner->status = trim($req->status);
        $Partner->save();

        return redirect('admin/partner/list')->with("success", "Partner successfully updated");
    }
    public function delete($id)
    {
        $Partner = Partner::getSingle($id);
        $Partner->is_delete = 1;
        $Partner->save();
        return redirect()->back()->with("success", "Partner successfully deleted");
    }
}
