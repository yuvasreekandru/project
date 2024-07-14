<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('products.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'products.created_by')
            ->where('products.is_delete', '=', 0)
            ->orderBy('products.id', 'desc')
            ->paginate(50);

    }

    static public function getProduct($category_id = '', $subcategory_id = '')
    {
        $return = Product::select('products.*', 'users.name as created_by_name', 'categories.name as category_name', 'categories.slug as category_slug', 'sub_categories.name as sub_category_name', 'sub_categories.slug as sub_category_slug')
            ->join('users', 'users.id', '=', 'products.created_by')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id');

        if (!empty($category_id)) {
            $return = $return->where('products.category_id', '=', $category_id);

        }
        if (!empty($subcategory_id)) {
            $return = $return->where('products.sub_category_id', '=', $subcategory_id);
        }

        $return = $return->where('products.is_delete', '=', 0)
            ->where('products.status', '=', 0)
            ->orderBy('products.id', 'desc')
            ->paginate(30);

        return $return;
    }

    static public function getImageSingle($product_id)
    {
        return ProductImage::where('product_id','=',$product_id)->orderBy('order_by','asc')->first();
    }
    static public function checkSlug($slug)
    {
        return self::where("slug", "=", $slug)->count();
    }

    public function getColor()
    {
        return $this->hasMany(ProductColor::class, "product_id");
    }

    public function getSize()
    {
        return $this->hasMany(ProductSize::class, "product_id");
    }
    public function getImage()
    {
        return $this->hasMany(ProductImage::class, "product_id")->orderBy('order_by', 'asc');
    }
}
