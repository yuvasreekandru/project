<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\DiscountCode;
use App\Models\ShippingCharge;
use App\Models\User;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrderItem;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Stripe;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Hash;
use Auth;

use App\Mail\OrderInvoiceMail;
use Mail;

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
        foreach ($req->cart as $row) {

            Cart::update(
                $row['rowId'],
                array(
                    'qty' => $row['qty'],
                )
            );

        }
        return redirect()->back();

    }

    public function cart_delete($rowId)
    {

        $cart = Cart::content()->where('rowId', $rowId);
        if (!empty($cart)) {
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


        return view("payment.checkout", $data);
    }

    public function apply_discount_code(Request $req)
    {
        $getDiscount = DiscountCode::checkDiscount($req->discount_code);
        if (!empty($getDiscount)) {
            $total = Cart::subtotal();
            if ($getDiscount->type == "Amount") {
                $discount_amount = $getDiscount->percent_amount;
                $payable_total = $total - $getDiscount->percent_amount;
            } else {
                $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                $payable_total = $total - $discount_amount;

            }
            $json['status'] = true;
            $json['discount_amount'] = number_format($discount_amount, 2);
            $json['payable_total'] = $payable_total;

            $json['message'] = "success";
        } else {
            $json["status"] = false;
            $json['discount_amount'] = '0.00';
            $json['payable_total'] = Cart::subtotal();
            $json["message"] = "Discount Code Invalid";
        }
        echo json_encode($json);
    }
    public function place_order(Request $req)
    {
        $validate = 0;
        $message = '';

        // if auth already exist
        if (!empty(Auth::check())) {
            $user_id = Auth::user()->id;
        }
        // auth not exist
        else {
            // user directly create an account in checkout page
            if (!empty($req->is_create)) {
                $checkEmail = User::checkEmail($req->email);

                if (!empty($checkEmail)) {
                    $message = "This email already register please choose another";
                    $validate = 1;
                } else {
                    $save = new User();
                    $save->name = trim($req->first_name);
                    $save->email = trim($req->email);
                    $save->password = Hash::make($req->password);
                    $save->save();

                    $user_id = $save->id;
                }
            } else {
                $user_id = '';
            }

        }

        if (empty($validate)) {

            // if Discount code is Present following code is find the total amount after discount
            // (we already find the total after discount amount using ajax in checkout page but here we again doing because of avoiding hacking)
            $getShipping = ShippingCharge::getSingle($req->shipping);
            $payable_total = Cart::subtotal();
            $discount_amount = 0;
            $discount_code = '';
            if (!empty($req->discount_code)) {
                $getDiscount = DiscountCode::checkDiscount($req->discount_code);

                if (!empty($getDiscount)) {
                    $discount_code = $req->discount_code;
                    if ($getDiscount->type == "Amount") {
                        $discount_amount = $getDiscount->percent_amount;
                        $payable_total = $payable_total - $getDiscount->percent_amount;
                    } else {
                        $discount_amount = ($payable_total * $getDiscount->percent_amount) / 100;
                        $payable_total = $payable_total - $discount_amount;

                    }
                }
            }

            $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
            $total_amount = $payable_total + $shipping_amount;

            // orders saving in orders table
            $order = new Order;

            if (!empty($user_id)) {
                $order->user_id = trim($user_id);
            }
            $order->order_number = mt_rand(100000000,999999999);
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

            $order->save();

            // each item save in order_items table
            foreach (Cart::content() as $key => $cart) {

                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->product_id = $cart->id;
                $order_item->quantity = $cart->qty;
                $order_item->price = $cart->price;

                $color_id = $cart->options->color_id;
                if (!empty($color_id)) {

                    $getColor = Color::getSingle($color_id);
                    $order_item->color_name = $getColor->name;
                }

                $size_id = $cart->options->size_id;

                if (!empty($size_id)) {
                    $getSize = ProductSize::getSingle($size_id);
                    $order_item->size_name = $getSize->name;
                    $order_item->size_amount = $getSize->price;

                }

                $order_item->total_price = $cart->price;
                $order_item->save();

            }
            $json['status'] = true;
            $json['message'] = 'Order Success';
            $json['redirect'] = url('checkout/payment?order_id=' . base64_encode($order->id));
        } else {
            $json['status'] = false;
            $json['message'] = $message;
        }

        echo json_encode($json);
    }

    public function checkout_payment(Request $req)
    {
        if (!empty(Cart::subtotal()) && !empty($req->order_id)) {
            $order_id = base64_decode($req->order_id);
            $getOrder = Order::getSingle($order_id);
            if (!empty($getOrder)) {
                if (!empty($getOrder->payment_method == 'cash')) {
                    $getOrder->is_payment = 1;
                    $getOrder->save();

                    Cart::destroy();

                    return redirect('cart')->with('success', 'Order successfully placed');
                } elseif (!empty($getOrder->payment_method == 'paypal')) {
                    $provider = new PayPalClient;
                    $provider->setApiCredentials(config('paypal'));
                    $paypalToken = $provider->getAccessToken();

                    $response = $provider->createOrder([
                        "intent" => "CAPTURE",
                        "application_context" => [

                            "return_url" => url('paypal/success_payment'),
                            "cancel_url" => url('checkout'),
                        ],
                        "purchase_units" => [

                            0 => [
                                "reference_id" => $getOrder->id,
                                "amount" => [

                                    "currency_code" => "USD",
                                    "value" => $getOrder->total_amount
                                ],

                            ]
                        ],
                    ]);
                    // dd($response);
                    if (isset($response['id']) && $response['id'] != null) {
                        // redirect to approve href
                        foreach ($response['links'] as $links) {

                            if ($links['rel'] == 'approve') {
                                return redirect()->away($links['href']);

                            }

                        }

                    }

                } elseif (!empty($getOrder->payment_method == 'stripe')) {
                    Stripe::setApikey(env('STRIPE_SECRET'));
                    $finalprice = $getOrder->total_amount * 100;

                    $session = \Stripe\Checkout\Session::create([
                        'customer_email' => $getOrder->email,
                        'payment_method_types' => ['card'],
                        'line_items' => [
                            [

                                'price_data' => [
                                    'currency' => 'usd',
                                    'product_data' => [
                                        'name' => 'Ecommerce',

                                    ],
                                    'unit_amount' => intval($finalprice),
                                ],
                                'quantity' => 1,
                            ]
                        ],
                        'mode' => 'payment',
                        'success_url' => url('stripe/payment_success'),
                        'cancel_url' => url('checkout'),
                    ]);

                    $getOrder->stripe_session_id = $session['id'];
                    $getOrder->save();
                    $data['session_id'] = $session['id'];

                    Session::put('stripe_session_id', $session['id']);

                    $data['setPublicKey'] = env('STRIPE_KEY');

                    return view('payment.stripe_charge', $data);


                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function paypal_success_payment(Request $req)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($req['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $getOrder = Order::getSingle($response['purchase_units'][0]['reference_id']);
            if (!empty($getOrder)) {
                $getOrder->is_payment = 1;
                $getOrder->transaction_id = $response['id'];
                $getOrder->payment_data = json_encode($response);
                $getOrder->save();

                Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));

                Cart::destroy();
                return redirect('cart')->with('success', "Order successfully placed");
            } else {
                abort(404);
            }

        } else {
            abort(404);
        }
    }
    public function stripe_success_payment(Request $req)
    {
        $trans_id = Session::get('stripe_session_id');
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $getData = \Stripe\Checkout\Session::retrieve($trans_id);

        $getOrder = Order::where('stripe_session_id', '=', $getData->id)->first();
        if (!empty($getOrder) && !empty($getData->id) && $getData->id == $getOrder->stripe_session_id) {
            $getOrder->is_payment = 1;
            $getOrder->transaction_id = $getData->id;
            $getOrder->payment_data = json_encode($getData);
            $getOrder->save();

            Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));

            Cart::destroy();

            return redirect('cart')->with('success', 'Order successfully placed');
        } else {
            return redirect('cart')->with('error', 'Due to some error please try again');
        }


    }
}
