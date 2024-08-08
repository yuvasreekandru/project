<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\ContactUs;
use App\Mail\ContactUsMail;
use Session;
use Auth;
use Mail;
class HomeController extends Controller
{
    public function home()
    {
        $data['meta_title'] = 'Ecommerce';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view("home", $data);
    }
    public function contact()
    {

        $first_number = mt_rand(0,9);
        $second_number = mt_rand(0,9);

        $data['first_number'] = $first_number;
        $data['second_number'] = $second_number;

        Session::put('total_sum', $first_number + $second_number);

        $data['meta_title'] = 'Contact';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getSystemSetting'] = SystemSetting::getSingle();
        return view("pages.contact", $data);
    }
    public function submit_contact(Request $req)
    {
       if(!empty($req->verification) && !empty(Session::get('total_sum')))
       {
        if(trim(Session::get('total_sum')) == trim($req->verification))
        {
            $save = new ContactUs();
            if(!empty(Auth::check()))
            {
                $save->user_id = Auth::user()->id;
            }

            $save->name = trim($req->name);
            $save->email = trim($req->email);
            $save->phone = trim($req->phone);
            $save->subject = trim($req->subject);
            $save->message = trim($req->message);
            $save->save();

            $getSystemSetting = SystemSetting::getSingle();

            Mail::to($getSystemSetting->submit_email)->send(new ContactUsMail($save));

            return redirect()->back()->with('success', 'Your Message Successfully Send.');

        }
        else
        {
            return redirect()->back()->with('error','Your verification sum is wrong.');
        }
       }
       else
       {
            return redirect()->back()->with('error','Your verification sum is wrong.');

       }
    }

    public function about()
    {
        $data['meta_title'] = 'About';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view("pages.about", $data);
    }
    public function faq()
    {
        return view("pages.faq");

    }
    public function payment_method()
    {
        return view("pages.payment-method");

    }
    public function money_back_guarantee()
    {
        return view("pages.money-back-guarantee");

    }
    public function returns()
    {
        return view("pages.returns");

    }
    public function shipping()
    {
        return view("pages.shipping");

    }
    public function terms_conditions()
    {
        return view("pages.terms-conditions");

    }
    public function privacy_policy()
    {
        return view("pages.privacy-policy");

    }
}
