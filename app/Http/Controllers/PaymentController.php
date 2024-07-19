<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function cart(Request $req)
    {
        $data['meta_title'] = 'Cart';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view("payment.cart", $data);
    }

    public function update_cart(Request $req)
    {
        foreach($req->cart as $row)
        {

            Cart::update( $row['rowId'], array(
               'qty' => $row['qty'],
            ));

        }
        return redirect()->back();

    }

    public function cart_delete($rowId)
    {

       $cart =  Cart::content()->where('rowId', $rowId);
        // dd($cart);
        if(!empty($cart)){
            Cart::remove($rowId);
        }

        return redirect()->back();
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
            'id' => $getProduct->id,
            'name' => 'Product',
            'qty' => $req->qty,
            'price' => $total,
            'options' => [
                'size_id' => $size_id,
                "color_id" => $color_id,
            ]
        ]);

        return redirect()->back();
    }
}
