<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
class ProductController extends Controller
{

    public function getCategory($slug, $subslug = '')
    {

        $getSubCategory = SubCategory::getSingleSlug($subslug);
        $getCategory = Category::getSingleSlug($slug);

        if(!empty($getCategory) && !empty($getSubCategory))
        {

            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;

            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;

            $data['getProduct'] = Product::getProduct($getCategory->id , $getSubCategory->id);

            return view("product.list",$data);
        }

        else if(!empty($getCategory))
        {
            $data['getCategory'] = $getCategory;

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;

            $data['getProduct'] = Product::getProduct($getCategory->id);

            return view("product.list",$data);
        }
        else
        {
            abort(404);
        }
    }
}
