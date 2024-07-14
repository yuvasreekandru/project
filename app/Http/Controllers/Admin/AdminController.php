<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function list()
    {
        $data["getRecord"] = User::getAdmin();
        $data['header_title'] = "Admin";
        return view("admin.admin.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Admin";
        return view("admin.admin.add", $data);
    }
    public function insert(Request $req)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
        ]);
        $user = New User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->status = $req->status;
        $user->is_admin = 1;
        $user->save();

        return redirect('admin/admin/list')->with("success","Admin successfully created");
    }
    public function edit($id)
    {
        $data["getRecord"] = User::getSingle($id);
        $data['header_title'] = "Edit Admin";
        return view("admin.admin.edit", $data);
    }

    public function update($id, Request $req)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = $req->name;
        $user->email = $req->email;
        if (!empty($req->password)) {
            $user->password = Hash::make($req->password);
        }
        $user->password = Hash::make($req->password);
        $user->status = $req->status;
        $user->is_admin = 1;
        $user->save();

        return redirect('admin/admin/list')->with("success","Admin successfully Updated");
    }
    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect()->back()->with("success","Admin successfully Deleted");
    }
}
