<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::orderByDesc('id')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function show($id)
    {
        $order = OrderItem::where('order_id','=',$id)->orderByDesc('id')->get();

        return view('admin.orders.detailsOrder',compact('order'));
    }


}
