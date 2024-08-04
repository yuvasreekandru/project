<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $data['meta_title'] = 'Dashboard';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['TotalOrder'] = Order::getTotalOrderUser(Auth::user()->id);
        $data['TotalTodayOrder'] = Order::getTotalTodayOrderUser(Auth::user()->id);
        $data['TotalAmount'] = Order::getTotalAmountUser(Auth::user()->id);
        $data['TotalTodayAmount'] = Order::getTotalTodayAmountUser(Auth::user()->id);

        $data['TotalPending'] = Order::getTotalStatusUser(Auth::user()->id,0);
        $data['TotalInProgress'] = Order::getTotalStatusUser(Auth::user()->id,1);
        $data['TotalCompleted'] = Order::getTotalStatusUser(Auth::user()->id,3);
        $data['TotalCancelled'] = Order::getTotalStatusUser(Auth::user()->id,4);

        return view("user.dashboard", $data);
    }
    public function orders()
    {
        $data['getRecord'] = Order::getRecordUser(Auth::user()->id);
        $data['meta_title'] = 'Orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view("user.orders", $data);
    }
    public function order_details($id)
    {
        $data['getRecord'] = Order::getSingleUser(Auth::user()->id, $id);
        if(!empty($data['getRecord']))
        {
            $data['meta_title'] = 'Order Details';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';

            return view("user.order-details", $data);
        }
        else
        {
            abort(404);
        }

    }
    public function edit_profile()
    {
        $data['meta_title'] = 'Edit Profile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getRecord'] = User::getSingle(Auth::user()->id);

        return view("user.edit-profile", $data);
    }

    public function update_profile(Request $req)
    {
        $user = User::getSingle(Auth::user()->id);

        $user->name = trim($req->first_name);
        $user->last_name = trim($req->last_name);
        $user->company_name = trim($req->company_name);
        $user->country = trim($req->country);
        $user->address_one = trim($req->address_one);
        $user->address_two = trim($req->address_two);
        $user->city = trim($req->city);
        $user->state = trim($req->state);
        $user->postcode = trim($req->postcode);
        $user->phone = trim($req->phone);
        $user->save();

        return redirect()->back()->with("success","Profile successfully updated");
    }
    public function change_password()
    {
        $data['meta_title'] = 'Change Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view("user.change-password", $data);
    }
    public function update_password(Request $req)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($req->old_password, $user->password))
        {
            if($req->password == $req->cpassword)
            {
                $user->password = Hash::make($req->password);
                $user->save();
                return redirect()->back()->with("success","Password successfully updated");
            }
            else
            {
                return redirect()->back()->with("error","new password and confirm password does not match");

            }

        }else
        {
            return redirect()->back()->with("error","Old password is not correct");
        }
    }
}
