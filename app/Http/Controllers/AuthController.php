<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
use Mail;
use Str;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;


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
        return redirect(url(''));
    }

    public function auth_register(Request $req)
    {
        $checkEmail = User::checkEmail( $req->email );
            if (empty($checkEmail))
            {
                $save = new User();
                $save->name = trim($req->name);
                $save->email = trim($req->email);
                $save->password = Hash::make($req->password);
                $save->save();

                Mail::to($save->email)->send(new RegisterMail($save));
                $json['status'] = true;
                $json['message'] = 'Your account successfully created. Please verify your email address';
            }
            else
            {
                $json['status'] = false;
                $json['message'] = 'This email already register please choose another';
            }
            echo json_encode($json);
    }

    public function auth_login(Request $req)
    {
        $remember = !empty($req->is_remember) ? true : false;
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'status' => 0, 'is_delete' => 0], $remember))
        {
            if(!empty(Auth::user()->email_verified_at))
            {
                $json['status'] =true;
                $json['message'] = 'success';
            }
            else
            {
                $save = User::getSingle(Auth::user()->id);
                Mail::to($save->email)->send(new RegisterMail($save));
                Auth::logout();

                $json['status'] = false;
                $json['message'] = 'Please enter current email not verified. Please check your inbox and verify';

            }

        } else
        {
            $json['status'] = false;
            $json['message'] = 'Please enter correct email and password';

        }

        echo json_encode($json);
    }

    public function forgot_password(Request $req)
    {
        $data['meta_title'] = "Forgot Password";
        return view('auth.forgot',$data);

    }
    public function auth_forgot_password(Request $req)
    {
        $user = User::where('email','=', $req->email)->first();
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success','Please check your email and reset your password');
        }
        else
        {
            return redirect()->back()->with('error','Email not found in the system.');
        }
    }

    public function forgot_password_reset($token)
    {
        $user = User::where('remember_token','=', $token)->first();
        if(!empty($user))
        {
            $data['user'] = $user;
            $data['meta_title'] = "Rest Password";
            return view('auth.reset', $data);

        }
        else
        {
            abort(404);
        }
    }

    public function forgot_password_reset_confirm(Request $req , $token)
    {
        if($req->password == $req->confirm_password)
        {
            $user = User::where('remember_token','=', $token)->first();
            $user->password = Hash::make($req->password);
            $user->remember_token = Str::random(30);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            return redirect(url('/'))->with('success','Password successfully reset.');

        }
        else
        {
            return redirect()->back()->with('error','Password and confirm password does not match');
        }
    }
    public function activate_email($id)
    {
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect(url(''))->with('success','Email successfully verified');
    }


}
