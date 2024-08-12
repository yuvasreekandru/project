<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

use Auth;
use Str;
class BlogCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BlogCategory::getRecord();
        $data['header_title'] = "Blog Category";
        return view("admin.blog-category.list", $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Blog Category";
        return view("admin.blog-category.add", $data);
    }
    public function insert(Request $req)
    {
        request()->validate([
            'slug' => 'required|unique:blog_categories',
        ]);
        $blog_category = New BlogCategory();
        $blog_category->name = trim($req->name);
        $blog_category->slug = trim($req->slug);
        $blog_category->status = trim($req->status);
        $blog_category->meta_title = trim($req->meta_title);
        $blog_category->meta_description = trim($req->meta_description);
        $blog_category->meta_keywords = trim($req->meta_keywords);

        $blog_category->save();

        return redirect('admin/blog-category/list')->with("success","Blog Category successfully created");
    }

    public function edit($id)
    {
        $data['getRecord'] = BlogCategory::getSingle($id);
        $data['header_title'] = "Edit Blog Category";
        return view("admin.blog-category.edit", $data);
    }

    public function update($id, Request $req)
    {
        request()->validate([
            'slug' => 'required|unique:blog_categories,slug,'.$id,
        ]);
        $blog_category =BlogCategory::getSingle($id);
        $blog_category->name = trim($req->name);
        $blog_category->slug = trim($req->slug);
        $blog_category->status = trim($req->status);
        $blog_category->meta_title = trim($req->meta_title);
        $blog_category->meta_description = trim($req->meta_description);
        $blog_category->meta_keywords = trim($req->meta_keywords);

        $blog_category->save();

        return redirect('admin/blog-category/list')->with("success","Blog Category successfully updated");
    }
    public function delete($id)
    {
        $blog_category = BlogCategory::getSingle($id);
        $blog_category->is_delete = 1;
        $blog_category->save();
        return redirect()->back()->with("success","Blog Category successfully deleted");
    }
}
