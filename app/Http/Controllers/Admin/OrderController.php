<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

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
}
