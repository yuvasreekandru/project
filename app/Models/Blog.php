<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return self::where('slug','=',$slug)
                    ->where('blogs.status','=','0')
                    ->where('blogs.is_delete','=','0')
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
            ->orderBy('blogs.name', 'asc')
            ->get();
    }
    public function getImage()
    {
        if(!empty($this->image_name) && file_exists('upload/blog/'.$this->image_name))
        {

            return url('upload/blog/'.$this->image_name);
        }
        else
        {
            return "";
        }
    }
}
