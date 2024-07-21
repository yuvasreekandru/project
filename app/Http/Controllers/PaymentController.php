<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\DiscountCode;
use App\Models\ShippingCharge;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrderItem;


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

    public function checkout(Request $req)
    {
        $data['meta_title'] = 'Checkout';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getShipping'] = ShippingCharge::getRecordActive();


        return view("payment.checkout",$data);
    }

    public function apply_discount_code(Request $req)
    {
        $getDiscount= DiscountCode::checkDiscount($req->discount_code);
        // dd($getDiscount);
        if(!empty($getDiscount))
        {
            $total = Cart::subtotal();
            if($getDiscount->type == "Amount")
            {
                $discount_amount =  $getDiscount->percent_amount;
                $payable_total = $total - $getDiscount->percent_amount;
            }
            else
            {
                $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                $payable_total = $total - $discount_amount;

            }
            $json['status'] = true;
            $json['discount_amount'] = number_format($discount_amount , 2);
            $json['payable_total'] = $payable_total;

            $json['message'] = "success";
        }
        else{
            $json["status"] = false;
            $json['discount_amount'] = '0.00';
            $json['payable_total'] = Cart::subtotal();
            $json["message"] = "Discount Code Invalid";
        }
        echo json_encode($json);
    }
    public function place_order(Request $req)
    {

        $getShipping = ShippingCharge::getSingle($req->shipping);
        $payable_total = Cart::subtotal();
        $discount_amount = 0;
        $discount_code = '';
        if(!empty($req->discount_code))
        {
            $getDiscount = DiscountCode::checkDiscount( $req->discount_code );

            if(!empty($getDiscount))
            {
                $discount_code = $req->discount_code;
                if($getDiscount->type == "Amount")
                {
                    $discount_amount =  $getDiscount->percent_amount;
                    $payable_total = $payable_total - $getDiscount->percent_amount;
                }
                else
                {
                    $discount_amount = ($payable_total * $getDiscount->percent_amount) / 100;
                    $payable_total  = $payable_total - $discount_amount;

                }
            }
        }

        $shipping_amount = !empty($getShipping->price) ? $getShipping->price :0;
        $total_amount = $payable_total + $shipping_amount;

        $order = new Order();
        $order->first_name = trim($req->first_name);
        $order->last_name = trim($req->last_name);
        $order->company_name = trim($req->company_name);
        $order->country = trim($req->country);
        $order->address_one = trim($req->address_one);
        $order->address_two = trim($req->address_two);
        $order->city = trim($req->city);
        $order->state = trim($req->state);
        $order->postcode = trim($req->postcode);
        $order->phone = trim($req->phone);
        $order->email = trim($req->email);
        $order->note = trim($req->note);
        $order->discount_amount = trim($discount_amount);
        $order->discount_code = trim($discount_code);
        $order->shipping_id = trim($req->shipping);
        $order->shipping_amount = trim($shipping_amount);
        $order->total_amount = trim($total_amount);
        $order->payment_method = trim($req->payment_method);

        // dd($order);
        $order->save();

        foreach(Cart::content() as $key => $cart)
        {

            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $cart->id;
            $order_item->quantity = $cart->qty;
            $order_item->price = $cart->price;

            $color_id = $cart->options->color_id;
            if(!empty($color_id))
            {

                $getColor = Color::getSingle($color_id);
                $order_item->color_name = $getColor->name;
            }

            $size_id =$cart->options->size_id;

            if(!empty($size_id))
            {
                $getSize = ProductSize::getSingle($size_id);
                $order_item->size_name = $getSize->name;
                $order_item->size_amount = $getSize->price;

            }

            $order_item->total_price = $cart->price;
            $order_item->save();

        }
        die;
    }
}
