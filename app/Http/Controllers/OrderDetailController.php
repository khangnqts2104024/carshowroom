<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderDetailController extends Controller
{
  


    public function show() {
        $orders = orderDetail::all();
        
        return view('admin.showroom.order')->with(['orders'=> $orders]);

    }

    public function orderedstatus(){
        $orders= orderDetail::where('order_status','ordered')->get();

        // $useremail = Auth::guard('employee')->user()->role;
        // dd($useremail);

        return view('admin.showroom.ordercheck')->with(['orders'=> $orders]);

  
    }
    public function takeorder($id){
        $order= orderDetail::find($id);
        $message='Bạn đã nhận đợn hàng thành công';
        if($order->order_status=='ordered')
        {$order->order_status='checked';
            $order->emp_received= Auth::guard('employee')->user()->email;
        }
        else{$message="có gì đó sai sai! check lại rồi hỏi sếp nha!";}
       $order->save();
                return redirect()->back()->with(['message'=> $message]);
    }
    
    // 
    
    public function myorder(){
        $orders= orderDetail::where('emp_received',Auth::guard('employee')->user()->email)->get();
  
        return view('admin.showroom.myorder')->with(['orders'=> $orders]);
  
    }


    public function custcanceledtatus(){
        $orders= orderDetail::where('order_status','custcanceled')->get();
        return view('admin.showroom.ordercancel')->with(['orders'=> $orders]);
  
    }

    public function confirmstatus(){
   
   

        $orders= orderDetail::where('order_status','confirm')->get();
        return view('admin.warehouse.car_ordering')->with(['orders'=> $orders]);

    }


    public function orderdetail($order_id,$model_id){
        $p= orderDetail::where('model_id',$model_id)->firstWhere('order_id',$order_id);
        return view('admin.showroom.orderdetail')->with(['p'=> $p]);
    }




  

}