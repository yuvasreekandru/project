<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_admin()
    {
        // dd(Hash::make(12345678));
        if (!empty(Auth::check()) && Auth::user()->is_admin == 1) {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');

    }

    public function auth_login_admin(Request $req)
    {
        $remember = !empty($req->remember) ? true : false;
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'is_admin' => 1, 'status' => 0, 'is_delete' => 0], $remember)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }

    public function logout_admin()
    {
        Auth::logout();
        return redirect('admin');
    }
}
