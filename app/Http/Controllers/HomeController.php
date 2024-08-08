<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\ContactUs;
use App\Mail\ContactUsMail;

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
        $data['meta_title'] = 'Contact';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getSystemSetting'] = SystemSetting::getSingle();
        return view("pages.contact", $data);
    }
    public function submit_contact(Request $req)
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
