<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use Cart;

class PaymentController extends Controller
{
    public function cart(Request $req)
    {
        dd(Cart::getContent());
    }
    public function add_to_cart(Request $req)
    {
        $getProduct = Product::getSingle($req->product_id);
        $total = $getProduct->price;
        if (!empty($req->size_id)) {
            $size_id = $req->size_id;
            $getSize = ProductSize::getSingle($size_id);

            $size_price = !empty($getSize->price) ? $getSize->price : 0;

            $total = $total + $size_price;
        } else {
            $size_id = 0;
        }

        $color_id = !empty($req->color_id) ? $req->color_id : 0;
        Cart::add([
            "id" => $getProduct->id,
            "name" => "Product",
            "price" => $total,
            "quantity" => $req->qty,
            "attributes" => array(
                "size_id" => $size_id,
                "color_id"=> $color_id,
            )
        ]);
        // dd($total);
        // dd($req->all());
        return redirect()->back();
    }
}
