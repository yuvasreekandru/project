<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getSingleSlug($slug)
    {
        return self::where('slug', '=', $slug)
            ->where('blogs.status', '=', '0')
            ->where('blogs.is_delete', '=', '0')
            ->first();
    }
    static public function getRecord()
    {
        return self::select('blogs.*')
            ->where('blogs.is_delete', '=', 0)
            ->orderBy('blogs.id', 'desc')
            ->paginate(20);
    }
    static public function getRecordActive()
    {
        return self::select('blogs.*')
            ->where('blogs.is_delete', '=', 0)
            ->where('blogs.status', '=', 0)
            ->orderBy('blogs.title', 'asc')
            ->get();
    }
    static public function getRecordActiveHome()
    {
        return self::select('blogs.*')
            ->where('blogs.is_delete', '=', 0)
            ->where('blogs.status', '=', 0)
            ->limit(3)
            ->orderBy('blogs.id', 'asc')
            ->get();
    }
    public function getImage()
    {
        if (!empty($this->image_name) && file_exists('upload/blog/' . $this->image_name)) {

            return url('upload/blog/' . $this->image_name);
        } else {
            return "";
        }
    }
    static public function getBlog($blog_category_id = '')
    {
        $return = self::select('blogs.*');
        if (!empty(Request::get('search'))) {
            $return = $return->where('blogs.title', 'like', '%' . Request::get('search') . '%');
        }
        if (!empty($blog_category_id)) {
            $return = $return->where('blogs.blog_category_id', '=',$blog_category_id);
        }
        $return = $return->where('blogs.is_delete', '=', 0)
            ->where('blogs.status', '=', 0)
            ->orderBy('blogs.id', 'desc')
            ->paginate(20);
        return $return;
    }
    static public function getPopular()
    {
        $return = self::select('blogs.*');
        $return = $return->where('blogs.is_delete', '=', 0)
            ->where('blogs.status', '=', 0)
            ->orderBy('blogs.total_view', 'desc')
            ->limit(6)
            ->get();
        return $return;
    }
    static public function getRelatedPost($blog_category_id, $blog_id)
    {
        $return = self::select('blogs.*');
        $return = $return->where('blogs.is_delete', '=', 0)
            ->where('blogs.blog_category_id', '=', $blog_category_id)
            ->where('blogs.id', '=', $blog_id)
            ->where('blogs.status', '=', 0)
            ->orderBy('blogs.total_view', 'desc')
            ->limit(6)
            ->get();
        return $return;
    }
    public function getCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
    public function getComment()
    {
        return $this->hasMany(BlogComment::class, 'blog_id')
        ->select('blog_comments.*')
            ->join('users','users.id','=','blog_comments.user_id')
            ->orderBy('blog_comments.id','desc');
    }
    public function getCommentCount()
    {
        return $this->hasMany(BlogComment::class, 'blog_id')
            ->select('blog_comment_id')
            ->join('users','users.id','=','blog_comments.user_id')
            ->count();
    }
}
