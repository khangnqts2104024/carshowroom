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
use Illuminate\Support\Facades\App;
// use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session;

class UserOrderController extends Controller
{   
    //load Page for Customer
    public function CustomerOrder(Request $request){
        $car_id_fromlayout = $request->id;
        $car_images = modelInfo::select('image')->where('model_id',$car_id_fromlayout)->get();
        $email_user = Auth::user()->email;
        $user =Customer_Info::select("*")
        ->where("email",$email_user)
        ->get();
        $models = modelInfo::select("*")->get();
        $warehouses = warehouse::select("warehouse_name","id")->get(); 
        return view('dashboard.user/order')->with(['models'=>$models,'warehouses'=>$warehouses,'user'=>$user,'car_id_fromlayout'=>$car_id_fromlayout,'car_images'=>$car_images]);
    }
    //load Page for Guest
    public function GuestOrder(Request $request){
        $car_id_fromlayout = $request->id;
        $car_images = modelInfo::select('image')->where('model_id',$car_id_fromlayout)->get();
        $models = modelInfo::select("*")->get();
        $warehouses = warehouse::select("warehouse_name","id")->get(); 
        return view('dashboard.user/order')->with(['models'=>$models,'warehouses'=>$warehouses,'car_id_fromlayout'=>$car_id_fromlayout,'car_images'=>$car_images]);
    }
    // getModelInfo AJAX
    public function getModelInfo(Request $request){
        
        $model_id = $request->model_id;
        // $idfromRequest = $request->id;
        
        $model = modelInfo::select("*")
        ->where("model_id",$model_id)
        ->get();
        return response()->json([
            'status' => 200,
            'model'=>$model,
        ]);
    }
    //getShowRoom
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
    //getAddress
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
    
    public function CustomerSubmitOrder(Request $request){
        $request->validate([
            
            'email' => array('required','regex:/^[^\s@-]+@[^\s@-]+\.[^\s@]+$/'),
            'fullname'=> array('required','regex:/^[A-Za-z\s]+$/'),
            'citizen_id'=> array('required','regex:/^[0-9]*$/'),
            'phone_number'=> array('required','regex:/^[0-9]{10,11}$/'),
            'address'=> array('required','regex:/^[a-zA-Z0-9,-\s]*$/'),   
            'warehouses'=> 'required',         
            'models'=> 'required',   
            'showrooms' => 'required',         
            'subtotal_price'=> 'required',            
        ]);
  
        $user_info = Customer_Info::find($request->customer_id);  //find user info by ID
        //check field unique if user change info
       
        $EmailChange = $user_info->email != $request->email;
        $emailExists = Customer_Info::where('email',$request->email)->exists();

        $CitizenIDChange = $user_info->citizen_id != $request->citizen_id;
        $CitizenIDExists = Customer_Info::where('citizen_id',$request->citizen_id)->exists();
        // dd($EmailChange);
        if($EmailChange){
            if($emailExists){
                if(App::getLocale()=='en'){
                    return back()->with('fail','This Email is already being used! Try another one!');
                }else{
                    return back()->with('fail','Địa chỉ Email đã được sử dụng! Hãy thử lại');
                }
            }
        }
        if($CitizenIDChange){
            if($CitizenIDExists){
                if(App::getLocale()=='en'){
                    return redirect()->back()->with('fail','This Citizen ID is already exists! Try another one!');
                }else{
                    return redirect()->back()->with('fail','Số CMND này đã tồn tại! Hãy thử lại!');
                }
            }
        }

         //UPDATE CUSTOMER INFO
         $user_info->email = $request->email;
         $user_info->citizen_id = $request->citizen_id;
         $user_info->fullname = $request->fullname;
         $user_info->phone_number = $request->phone_number;
         $user_info->address = $request->address;
         $update_info_user = $user_info->update();
         
        //VALIDATE AND INSERT ORDER
        $order = new order();
        $order->showroom = $request->showrooms; 
        //generate ORDER CODE
        $order->order_code = 'ORDERID'.'-'.rand(0,400).time();
        //check if order_code exists.
        $orderCodeExist = order::where('order_code', $order->order_code )->exists();
        if ($orderCodeExist) {
            $order->order_code = 'ORDERID'.'-'.rand(0,400).time(); // generate new one
        }
        $order->customer_id = $request->customer_id;
        $save_order = $order->save();
        //get order ID to insert order details table
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
        
       
        if($update_info_user && $save_order && $save_order_infos){
            if(App::getLocale()== 'en'){
                return redirect()->back()->with('success','You are now order successfully!');
            }else{
                return redirect()->back()->with('success','Bạn đã đặt hàng thành công!');
            }
        }else{
            if(App::getLocale()== 'en'){
                return redirect()->back()->with('fail','Something went wrong, failed to order! Please Try Again!');
            }else{
                return redirect()->back()->with('fail','Đặt hàng thất bại! Bạn vui lòng kiểm tra lại thông tin!');
            }
        }
    }

    // public function GuestSubmitOrder(Request $request){
    //     $request->validate([
    //         'email' => 'required|email|unique:customer_infos,email',
    //         'fullname'=> 'required|alpha',
    //         'citizen_id'=> 'required|numeric|unique:customer_infos',
    //         'phone_number'=> 'required|numeric',
    //         'address'=> 'required|alpha_num',            
    //         'password' => 'required|min:5|max:30',
    //         'ConfirmPassword' => 'required|min:5|max:30|same:password',
    //     ]);
   
    //     $emailExists = Customer_Info::where('email',$request->email)->exists();
    //     $CitizenIDExists = Customer_Info::where('citizen_id',$request->citizen_id)->exists();
    //         if($emailExists){
    //             if(App::getLocale()=='en'){
    //                 return back()->with('fail','This Email is already being used! Try another one!');
    //             }else{
    //                 return back()->with('fail','Địa chỉ Email đã được sử dụng! Hãy thử lại');
    //             }
    //         }
    //         if($CitizenIDExists){
    //             if(App::getLocale()=='en'){
    //                 return redirect()->back()->with('fail','This Citizen ID is already exists! Try another one!');
    //             }else{
    //                 return redirect()->back()->with('fail','Số CMND này đã tồn tại! Hãy thử lại!');
    //             }
    //         }

    //         $user_info = new Customer_Info();
    //         $user_info->email =  $request->email;
    //         $user_info->citizen_id = $request->citizen_id;
    //         $user_info->phone_number = $request->phone_number;
    //         $user_info->fullname = $request->fullname;
    //         $user_info->address = $request->address;
    //         $user_info->customer_role = 'guest';
    //         $save_info = $user_info->save();
           
         
    //     //VALIDATE AND INSERT ORDER
    //     $order = new order();
    //     $order->showroom = $request->showrooms; 
    //     //generate ORDER CODE
    //     $order->order_code = 'ORDERID'.'-'.rand(0,400).time();
    //     //check if order_code exists.
    //     $orderCodeExist = order::where('order_code', $order->order_code )->exists();
    //     if ($orderCodeExist) {
    //         $order->order_code = 'ORDERID'.'-'.rand(0,400).time(); // generate new one
    //     }
    //     $order->customer_id = $request->customer_id;
    //     $save_order = $order->save();
    //     //get order ID to insert order details table
    //     $order_id_order = order::select("order_id")
    //     ->where("order_code",$order->order_code)
    //     ->get();

    //     foreach($order_id_order as $order){
    //        $order_id = $order->order_id;
    //     }
    //     $order_details = new orderDetail();
    //     $order_details->order_id = $order_id;
    //     $order_details->model_id = $request->models;
    //     $order_details->order_price = $request->subtotal_price;
    //     $save_order_infos= $order_details->save();
        
       
    //     if($save_info && $save_order && $save_order_infos){
    //         if(App::getLocale()== 'en'){
    //             return redirect()->back()->with('success','You are now order successfully!');
    //         }else{
    //             return redirect()->back()->with('success','Bạn đã đặt hàng thành công!');
    //         }
    //     }else{
    //         if(App::getLocale()== 'en'){
    //             return redirect()->back()->with('fail','Something went wrong, failed to order! Please Try Again!');
    //         }else{
    //             return redirect()->back()->with('fail','Đặt hàng thất bại! Bạn vui lòng kiểm tra lại thông tin!');
    //         }
    //     }
    // }

    
}
