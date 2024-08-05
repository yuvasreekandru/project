<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductWishlist extends Model
{
    use HasFactory;

    protected $table = "product_wishlists";

    static function getSingle($id)
    {
        return self::find($id);
    }
    static function deleteRecord($product_id, $user_id)
    {
        self::where("product_id", "=", $product_id)->where("user_id", "=", $user_id)->delete();
    }
    static function checkAlready($product_id, $user_id)
    {
        return self::where("product_id", "=", $product_id)->where("user_id", "=", $user_id)->count();
    }
}
