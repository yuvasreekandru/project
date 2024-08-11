<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Str;
class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Category::getRecord();
        $data['header_title'] = "Category";
        return view("admin.category.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Category";
        return view("admin.category.add", $data);
    }
    public function insert(Request $req)
    {
        request()->validate([
            'slug' => 'required|unique:categories',
        ]);
        $category = New Category();
        $category->name = trim($req->name);
        $category->slug = trim($req->slug);
        $category->status = trim($req->status);
        $category->meta_title = trim($req->meta_title);
        $category->meta_description = trim($req->meta_description);
        $category->meta_keywords = trim($req->meta_keywords);
        $category->created_by = Auth::user()->id;
        $category->button_name = trim($req->button_name);
        $category->is_home = !empty($req->is_home) ? 1 : 0;

        if(!empty($req->file('image_name')))
        {
            $file = $req->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) .'.'. $ext;
            $file->move('upload/category/', $filename);

            $category->image_name = trim($filename);
        }
        $category->save();

        return redirect('admin/category/list')->with("success","Category successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = Category::getSingle($id);
        $data['header_title'] = "Edit Category";
        return view("admin.category.edit", $data);
    }

    public function update($id, Request $req)
    {
        request()->validate([
            'slug' => 'required|unique:categories,slug,'.$id,
        ]);
        $category =Category::getSingle($id);
        $category->name = trim($req->name);
        $category->slug = trim($req->slug);
        $category->status = trim($req->status);
        $category->meta_title = trim($req->meta_title);
        $category->meta_description = trim($req->meta_description);
        $category->meta_keywords = trim($req->meta_keywords);

        $category->button_name = trim($req->button_name);
        $category->is_home = !empty($req->is_home) ? 1 : 0;

        if(!empty($req->file('image_name')))
        {
            $file = $req->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) .'.'. $ext;
            $file->move('upload/category/', $filename);

            $category->image_name = trim($filename);
        }
        $category->save();

        return redirect('admin/category/list')->with("success","Category successfully updated");
    }
    public function delete($id)
    {
        $category = Category::getSingle($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->back()->with("success","Category successfully deleted");
    }
}
