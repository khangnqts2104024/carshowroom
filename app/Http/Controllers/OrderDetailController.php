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
    public function orderedstatus(){
        $orders= orderDetail::where('order_status','ordered')->get();
        return view('admin.showroom.ordercheck')->with(['orders'=> $orders]);
  
    }

    public function custcanceledtatus(){
        $orders= orderDetail::where('order_status','custcanceled')->get();
        return view('admin.showroom.ordercheck')->with(['orders'=> $orders]);
  
    }

    public function confirmtatus(){
        $orders= orderDetail::where('order_status','confirm')->get();
        return view('admin.warehouse.car_ordering')->with(['orders'=> $orders]);

    }

    public function orderdetail($order_id,$model_id){
        $p= orderDetail::where('model_id',$model_id)->firstWhere('order_id',$order_id);
        return view('admin.showroom.orderdetail')->with(['p'=> $p]);
    }

}