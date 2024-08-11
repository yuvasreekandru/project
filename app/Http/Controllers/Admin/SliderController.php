<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Str;
class SliderController extends Controller
{

    public function list()
    {
        $data['getRecord'] = Slider::getRecord();
        $data['header_title'] = "Slider";
        return view("admin.slider.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Slider";
        return view("admin.slider.add", $data);
    }
    public function insert(Request $req)
    {

        $slider = new Slider();
        $slider->title = trim($req->title);
        $slider->button_name = trim($req->button_name);
        $slider->button_link = trim($req->button_link);

        $file = $req->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) .'.'. $ext;
        $file->move('upload/sliders/', $filename);

        $slider->image_name = trim($filename);
        $slider->status = trim($req->status);

        $slider->save();
        return redirect('admin/slider/list')->with("success", "Slider successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = Slider::getSingle($id);
        $data['header_title'] = "Edit Slider";
        return view("admin.slider.edit", $data);
    }

    public function update($id, Request $req)
    {

        $slider = Slider::getSingle($id);
        $slider->title = trim($req->title);
        $slider->button_name = trim($req->button_name);
        $slider->button_link = trim($req->button_link);

        if(!empty($req->file('image_name')))
        {
            $file = $req->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) .'.'. $ext;
            $file->move('upload/sliders/', $filename);

            $slider->image_name = trim($filename);
        }

        $slider->status = trim($req->status);
        $slider->save();

        return redirect('admin/slider/list')->with("success", "Slider successfully updated");
    }
    public function delete($id)
    {
        $slider = Slider::getSingle($id);
        $slider->is_delete = 1;
        $slider->save();
        return redirect()->back()->with("success", "Slider successfully deleted");
    }
}
