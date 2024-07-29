<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use Mail;
use App\Mail\OrderStatusMail;

class OrderController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Order::getRecord();
        $data['header_title'] = "Orders";
        return view("admin.orders.list", $data);
    }

    public function order_details($id)
    {
        $data['getRecord'] = Order::getSingle($id);
        $data['header_title'] = "Order Details";
        return view("admin.orders.details", $data);
    }

    public function order_status(Request $req)
    {
        $getOrder = Order::getSingle($req->order_id);
        $getOrder->status = $req->status;
        $getOrder->save();

        Mail::to($getOrder->email)->send(new OrderStatusMail($getOrder));

        $json['message'] = 'Status successfully updated';

        echo json_encode($json);
    }
}
