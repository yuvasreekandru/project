<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\SystemSetting;
use App\Models\ContactUs;


use Str;


class PagesController extends Controller
{
    public function contactUsList()
    {
        $data['getRecord'] = ContactUs::getRecord();
        $data['header_title'] = "Contact Us";
        return view("admin.contact-us.list", $data);
    }
    public function contact_delete($id)
    {
        ContactUs::where('id','=', $id)->delete();

        return redirect()->back()->with('success',"Record successfully deleted");
    }
    public function list()
    {
        $data['getRecord'] = Page::getRecord();
        $data['header_title'] = "Pages";
        return view("admin.pages.list", $data);
    }
    public function edit($id)
    {
        $data['getRecord'] = Page::getSingle($id);
        $data['header_title'] = "Edit Page";
        return view("admin.pages.edit", $data);
    }

    public function update($id, Request $req)
    {

        $page = Page::getSingle($id);
        $page->name = trim($req->name);
        $page->title = trim($req->title);
        $page->description = trim($req->description);
        $page->meta_title = trim($req->meta_title);
        $page->meta_description = trim($req->meta_description);
        $page->meta_keywords = trim($req->meta_keywords);
        $page->save();

        if(!empty($req->file('image')))
        {

                $file = $req->file('image');
                $ext = $file->getClientOriginalExtension();
                $randomStr = $page->id .Str::random(20);
                $filename = strtolower($randomStr) .'.'. $ext;
                $file->move('upload/pages/', $filename);

                $page->image_name = trim($filename);
                $page->save();

        }

        return redirect('admin/pages/list')->with("success", "Page successfully updated");

    }

    public function system_settings()
    {
        $data['getRecord'] = SystemSetting::getSingle();
        $data['header_title'] = "System Settings";
        return view("admin.setting.system-settings", $data);
    }
    public function update_system_settings(Request $req)
    {
        $save = SystemSetting::getSingle();
        $save->website_name = trim($req->website_name);
        $save->footer_description = trim($req->footer_description);
        $save->address = trim($req->address);
        $save->phone = trim($req->phone);
        $save->phone_two = trim($req->phone_two);
        $save->submit_email = trim($req->submit_email);
        $save->email = trim($req->email);
        $save->email_two = trim($req->email_two);
        $save->working_hour = trim($req->working_hour);
        $save->facebook_link = trim($req->facebook_link);
        $save->twitter_link = trim($req->twitter_link);
        $save->instagram_link = trim($req->instagram_link);
        $save->youtube_link = trim($req->youtube_link);
        $save->pinterest_link = trim($req->pinterest_link);

        if(!empty($req->file('logo')))
        {

                $file = $req->file('logo');
                $ext = $file->getClientOriginalExtension();
                $randomStr = Str::random(10);
                $filename = strtolower($randomStr) .'.'. $ext;
                $file->move('upload/settings/', $filename);

                $save->logo = trim($filename);
        }

        if(!empty($req->file('favicon')))
        {

                $file = $req->file('favicon');
                $ext = $file->getClientOriginalExtension();
                $randomStr = Str::random(10);
                $filename = strtolower($randomStr) .'.'. $ext;
                $file->move('upload/settings/', $filename);

                $save->favicon = trim($filename);
        }
        if(!empty($req->file('footer_payment_icon')))
        {

                $file = $req->file('footer_payment_icon');
                $ext = $file->getClientOriginalExtension();
                $randomStr = Str::random(10);
                $filename = strtolower($randomStr) .'.'. $ext;
                $file->move('upload/settings/', $filename);

                $save->footer_payment_icon = trim($filename);
        }
        $save->save();

        return redirect()->back()->with("success", "setting successfully updated");

    }

}
