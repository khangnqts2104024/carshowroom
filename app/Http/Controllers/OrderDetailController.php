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
}
