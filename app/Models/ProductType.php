<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = "product_types";

    static public function getRecord()
    {
        return self::select('product_types.*','users.name as created_by_name')
        ->join('users','users.id','=','product_types.created_by')
        ->where('product_types.is_delete','=', 0)
        ->where('product_types.status','=', 0)
        ->orderBy('product_types.product_type','asc')
        ->get();

    }
    static public function getRecordActive()
    {
        return self::select('product_types.*')
        ->join('users','users.id','=','product_types.created_by')
        ->where('product_types.is_delete','=', 0)
        ->where('product_types.status','=', 0)
        ->orderBy('product_types.product_type','asc')
        ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
