<?php

namespace App\Http\Controllers;

use App\Models\carInfo;
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

       public function confirmorder($id){
           $orders=orderDetail::find($id);
           if( $orders->order_status='deposited'){
           $orders->order_status='confirm';
           $message='Bạn đã xác nhận đơn thành công!';}
           else{$message='Có gì đó sai sai!, hỏi lại sếp nha!';}
           $orders->save();
        //    dd($orders);
           return redirect()->back()->with(['message'=>$message]);



       }


public function soldorder($id){
$orders=orderDetail::find($id);
$car=carInfo::find($orders->orders->cars->first()->car_id);

    
if($orders->order_status==="released" && $car->car_status==='showroom'){
    $orders->order_status="sold";
    $car->car_status='sold';
    $orders->save();
    $car->save();
    $message='Bạn đã xác nhận giao xe thành công!';
}else{
    $message='Bạn xác nhậ không thành công!Kiểm tra lại xe đã tới showroom chưa!';
}
  return redirect()->back()->with(['message'=>$message]);
}


// huy don
public function ordercanceled($id){
    $orders=orderDetail::find($id);
   $car=$orders->orders->cars->first();
   if($car===null){$orders->order_status='canceled';$message='Hủy đơn thành công!';}
   else if($car->car_status==='showroom'){
       $orders->order_status='canceled';
       $car->car_status='cuscanceled';$message='Hủy Đơn Thành Công';}
    else if($car->car_status==='pending'){
        $message='Hủy chưa thành công, xe vẫn đang trên đường đến showroom!Hãy đợi xe tới rồi mới hoàn lại!';
    }
    else{$message='có gì đó sai sai nha!';}
       
       return redirect()->back()->with(['message'=>$message]); 
   }
  






}