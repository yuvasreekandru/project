<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $table = "product_reviews";

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getReview($product_id, $order_id, $user_id)
    {
        return self::select('*')
            ->where('product_id', '=', $product_id)
            ->where('order_id', '=', $order_id)
            ->where('user_id', '=', $user_id)
            ->first();

    }
    static public function getReviewProduct($product_id)
    {
        return self::select('product_reviews.*','users.name')
            ->join('users', 'users.id', 'product_reviews.user_id')
            ->where('product_id', '=', $product_id)
            ->orderBy('product_reviews.id','desc')
            ->paginate(10);
    }
    public function getPercent()
    {
        $rating =$this->rating;
        if($rating == 1)
        {
            return 20;
        }
        elseif($rating == 2)
        {
            return 20;
        }
        elseif($rating == 3)
        {
            return 60;
        }
        elseif($rating == 4)
        {
            return 80;
        }
        elseif($rating == 5)
        {
            return 100;
        }
        else
        {
            return 0;
        }
    }
    static public function getRatingAVG($product_id)
    {
        return self::select('product_reviews.rating')
        ->join('users', 'users.id', 'product_reviews.user_id')
        ->where('product_id', '=', $product_id)
        ->avg('product_reviews.rating');
    }
}

