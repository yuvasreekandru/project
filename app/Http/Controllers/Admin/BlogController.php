<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;


use Auth;
use Str;
class BlogController extends Controller
{

    public function list()
    {
        $data['getRecord'] = Blog::getRecord();
        $data['header_title'] = "Blog";
        return view("admin.blog.list", $data);
    }
    public function add()
    {
        $data['getCategory'] = BlogCategory::getRecordActive();
        $data['header_title'] = "Add New Blog";
        return view("admin.blog.add", $data);
    }
    public function insert(Request $req)
    {

        $blog = New Blog();
        $blog->title = trim($req->title);
        $blog->blog_category_id = trim($req->blog_category_id);
        $blog->short_description = trim($req->short_description);
        $blog->description = trim($req->description);
        $blog->status = trim($req->status);
        $blog->meta_title = trim($req->meta_title);
        $blog->meta_description = trim($req->meta_description);
        $blog->meta_keywords = trim($req->meta_keywords);

        if(!empty($req->file('image_name')))
        {
            $file = $req->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) .'.'. $ext;
            $file->move('upload/blog/', $filename);

            $blog->image_name = trim($filename);
        }

        $slug = Str::slug($req->title);
        $count = Blog::where('slug','=',$slug)->count();

        if(!empty($count))
        {
            $blog->slug = $slug.'-'.$blog->id;
        }
        else
        {
            $blog->slug = trim($slug);
        }
        $blog->save();

        return redirect('admin/blog/list')->with("success","Blog successfully created");
    }

    public function edit($id)
    {
        $data['getCategory'] = BlogCategory::getRecordActive();
        $data['getRecord'] = Blog::getSingle($id);
        $data['header_title'] = "Edit Blog";
        return view("admin.blog.edit", $data);
    }

    public function update($id, Request $req)
    {

        $blog =Blog::getSingle($id);
        $blog->title = trim($req->title);
        $blog->blog_category_id = trim($req->blog_category_id);
        $blog->short_description = trim($req->short_description);
        $blog->description = trim($req->description);
        $blog->status = trim($req->status);
        $blog->meta_title = trim($req->meta_title);
        $blog->meta_description = trim($req->meta_description);
        $blog->meta_keywords = trim($req->meta_keywords);
        $blog->save();

        if(!empty($req->file('image_name')))
        {

            if(!empty($blog->getImage()))
            {
                unlink('upload/blog/'.$blog->image_name);
            }
            $file = $req->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) .'.'. $ext;
            $file->move('upload/blog/', $filename);

            $blog->image_name = trim($filename);
            $blog->save();

        }

        return redirect('admin/blog/list')->with("success","Blog successfully updated");
    }
    public function delete($id)
    {
        $blog = Blog::getSingle($id);
        $blog->is_delete = 1;
        $blog->save();
        return redirect()->back()->with("success","Blog successfully deleted");
    }
}
