<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\modelInfo;
use App\Models\showroom;
use App\Models\warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserOrderController extends Controller
{
    public function index(){
        $email_user = Auth::user()->email;
        $user =Customer_Info::select("*")
        ->where("email",$email_user)
        ->get();
        $models = modelInfo::select("model_name","model_id")->get();
        $warehouses = warehouse::select("warehouse_name","id")->get(); 
        return view('dashboard.user/order')->with(['models'=>$models,'warehouses'=>$warehouses,'user'=>$user]);
    }

    // getModelInfo
    public function getModelInfo(Request $request){
        $model_id = $request->model_id;
        
        $model = modelInfo::select("*")
        ->where("model_id",$model_id)
        ->get();
        return response()->json([
            'status' => 200,
            'model'=>$model,
        ]);
    }


    public function getShowRoom(Request $request){
        $region_id = $request->region_id;
        
        $showrooms = showroom::select("*")
        ->where("region",$region_id)
        ->orderBy("showroom_name","asc")
        ->get();
        return response()->json([
            'status' => 200,
            'region_id'=>$region_id,
            'showrooms'=>$showrooms,
        ]);
    }
    
    public function getShowRoomAddress(Request $request){
        $showroom_id = $request->showroom_id;
        
        $showrooms_address = showroom::select("address")
        ->where("id",$showroom_id)
        ->get();
        return response()->json([
            'status' => 200,
            'showrooms_address'=>$showrooms_address,
        ]);
    }

    public function submitOrder(Request $request){
        
        // fullname
        // customer_id
        // phone_number
        // address
        // email
        // models
        // warehouses
        // showrooms
        // showroomAddressText

        $order = new order();
    
        $order->showroom = $request->showrooms;
        
        $order->order_code = 'ORDERID'.'-'.rand(0,400).time();
        //check if order_code exists.
        if (order::where('order_code', $order->order_code )->exists()) {
            $order->order_code = 'ORDERID'.'-'.rand(0,400).time();
        }
        $order->customer_id = $request->customer_id;
        $save_order = $order->save();

        $order_id_order = order::select("order_id")
        ->where("order_code",$order->order_code)
        ->get();

      
        foreach($order_id_order as $order){
           $order_id = $order->order_id;
        }
        $order_details = new orderDetail();
        $order_details->order_id = $order_id;
        $order_details->model_id = $request->models;
        $order_details->order_price = $request->subtotal_price;
        $save_order_infos= $order_details->save();
        
        if($save_order && $save_order_infos){
            return redirect()->back()->with('success','you are now order successfully'); 
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
        

    }
}
