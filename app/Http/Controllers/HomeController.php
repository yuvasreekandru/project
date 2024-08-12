<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Product;



use App\Mail\ContactUsMail;
use Session;
use Auth;
use Mail;
class HomeController extends Controller
{
    public function home()
    {
        $getPage = Page::getSlug('home');
        $data['getPage'] = $getPage;

        $data['getSlider'] = Slider::getRecordActive();
        $data['getPartner'] = Partner::getRecordActive();
        $data['getCategory'] = Category::getRecordActiveHome();
        $data['getProduct'] = Product::getRecentArrivals();


        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view("home", $data);
    }

    public function recent_arrival_category_product(Request $req)
    {
        $getProduct = Product::getRecentArrivals();
        $getCategory = Category::getSingle($req->category_id);

        return response()->json([
            "status" => true,
            "success" => view("product._list_recent_arrival",[
                "getProduct" => $getProduct,
                "getCategory" => $getCategory,

            ])->render(),
        ], 200);

    }
    public function contact()
    {
        $getPage = Page::getSlug('contact');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        $first_number = mt_rand(0,9);
        $second_number = mt_rand(0,9);

        $data['first_number'] = $first_number;
        $data['second_number'] = $second_number;

        Session::put('total_sum', $first_number + $second_number);
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
        $getPage = Page::getSlug('about');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.about", $data);
    }
    public function faq()
    {
        $getPage = Page::getSlug('faq');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.faq", $data);

    }
    public function payment_method()
    {
        $getPage = Page::getSlug('payment-method');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.payment-method", $data);

    }
    public function money_back_guarantee()
    {
        $getPage = Page::getSlug('money-back-guarantee');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.money-back-guarantee", $data);

    }
    public function returns()
    {
        $getPage = Page::getSlug('returns');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.returns", $data);

    }
    public function shipping()
    {
        $getPage = Page::getSlug('shipping');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.shipping", $data);

    }
    public function terms_conditions()
    {
        $getPage = Page::getSlug('terms-conditions');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.terms-conditions", $data);

    }
    public function privacy_policy()
    {
        $getPage = Page::getSlug('privacy-policy');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;
        return view("pages.privacy-policy", $data);

    }
}
