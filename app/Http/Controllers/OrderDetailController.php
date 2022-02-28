<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function show() {
        $orders = orderDetail::all();
        return view('admin.showroom.order')->with(['orders'=> $orders]);

    }
    public function orderdstatus(){
        $orders= orderDetail::where('order_status','s')->get();
        return view('admin.showroom.order')->with(['orders'=> $orders]);

    }
}
