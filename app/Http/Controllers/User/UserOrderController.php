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
use App\Models\Province;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserOrderController extends Controller
{
    //load Page for Customer
    public function CustomerOrder(Request $request)
    {
        
        $model_id_cost_estimate = $request->models_cost_estimate;
        $province_matp_cost_estimate = $request->provinces;
        //carID from layout
        if (isset($request->id)) {
            $car_id_fromlayout = $request->id;
        } else {
            //reusable variable
            $car_id_fromlayout = $model_id_cost_estimate;
        }
        $car_images = modelInfo::select('image')->where('model_id', $car_id_fromlayout)->get();
        $users_account_id = Auth::user()->customer_id;
        $user = Customer_Info::select("*")
            ->where("customer_id", $users_account_id)
            ->get();
        $models = modelInfo::select("*")->where('released', '=', 'active')->get();
        $warehouses = warehouse::select("warehouse_name", "id")->get();
        $provinces = Province::select('*')->get();
        return view('dashboard.user.order')->with(['province_matp_cost_estimate' => $province_matp_cost_estimate, 'models' => $models, 'warehouses' => $warehouses, 'user' => $user, 'car_id_fromlayout' => $car_id_fromlayout, 'car_images' => $car_images, 'provinces' => $provinces]);
    }
    //load Page for Guest
    public function GuestOrder(Request $request)
    {
        $model_id_cost_estimate = $request->models_cost_estimate;
        $province_matp_cost_estimate = $request->provinces;
        //carID from layout
        if (isset($request->id)) {
            $car_id_fromlayout = $request->id;
        } else {
            //reusable variable
            $car_id_fromlayout = $model_id_cost_estimate;
        }

        $car_images = modelInfo::select('image')->where('model_id', $car_id_fromlayout)->get();
        $models = modelInfo::select("*")->where('released', '=', 'active')->get();
        $warehouses = warehouse::select("warehouse_name", "id")->get();
        $provinces = Province::select('*')->get();

        return view('dashboard.user/order')->with(['province_matp_cost_estimate' => $province_matp_cost_estimate, 'models' => $models, 'warehouses' => $warehouses, 'car_id_fromlayout' => $car_id_fromlayout, 'car_images' => $car_images, 'provinces' => $provinces]);
    }
    // getModelInfo AJAX
    public function getModelInfo(Request $request)
    {
        $model_id = $request->model_id;
        $model = modelInfo::select("*")
            ->where("model_id", $model_id)
            ->get();
        return response()->json([
            'status' => 200,
            'model' => $model,
        ]);
    }
    //getShowRoom
    public function getShowRoom(Request $request)
    {
        $region_id = $request->region_id;
        $showrooms = showroom::select("*")
            ->where("region", $region_id)
            ->orderBy("showroom_name", "asc")
            ->get();
        return response()->json([
            'status' => 200,
            'region_id' => $region_id,
            'showrooms' => $showrooms,
        ]);
    }
    //getAddress
    public function getShowRoomAddress(Request $request)
    {
        $showroom_id = $request->showroom_id;
        $showrooms_address = showroom::select("address")
            ->where("id", $showroom_id)
            ->get();
        return response()->json([
            'status' => 200,
            'showrooms_address' => $showrooms_address,
        ]);
    }
    //Customer Order
    public function CustomerSubmitOrder(Request $request)
    {
        $request->validate([
            'email' => array('required', 'regex:/^[^\s@-]+@[^\s@-]+\.[^\s@]+$/'),
            'fullname' => array('required', 'regex:/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
            'phone_number' => array('required', 'regex:/^[0-9]{10,11}$/'),
            'address' => array('required', 'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\,\.\s]+)$/i'),
            'warehouses' => 'required',
            'models' => 'required',
            'showrooms' => 'required',
            'OrderPrice' => 'required',
            'provinces' => 'required',

        ]);
        $user_auth_id = Auth::user()->customer_id;
        // dd($user_auth);
        $user_info = Customer_Info::find($user_auth_id);  //find user info by ID
        //check field unique if user change info

        $EmailChange = $user_info->email != $request->email;
        $emailExists = Customer_Info::where('email', $request->email)->exists();

        if ($EmailChange) {
            if ($emailExists) {
                if (App::getLocale() == 'en') {
                    return back()->with('fail', 'This Email is already being used! Try another one!');
                } else {
                    return back()->with('fail', 'Địa chỉ Email đã được sử dụng! Hãy thử lại');
                }
            }
        }
        //VALIDATE AND INSERT ORDER
        $order = new order();
        $order->showroom = $request->showrooms;

        //check if order_code exists.
        $orderCodeExist = order::where('order_code', $order->order_code)->exists();
        do {
            $order->order_code = 'ORDERID' . '-' . rand(0, 400) . time(); // generate new one
        } while ($orderCodeExist);

        $order_code = $order->order_code;



        $order->customer_id = $user_auth_id;
        $save_order = $order->save();
        //get order ID to insert order details table
        $order_id_order = order::select("order_id")
            ->where("order_code", $order->order_code)
            ->get();

        foreach ($order_id_order as $order) {
            $order_id = $order->order_id;
        }
        //insert order after being validated
        $order_details = new orderDetail();
        $order_details->order_id = $order_id;
        $order_details->model_id = $request->models;
        $order_details->order_price = $request->OrderPrice;
        $order_details->matp = $request->provinces;
        $save_order_infos = $order_details->save();

        //UPDATE CUSTOMER INFO
        $user_info->email = $request->email;
        $user_info->fullname = $request->fullname;
        $user_info->phone_number = $request->phone_number;
        $user_info->address = $request->address;
        $update_info_user = $user_info->update();

        if ($update_info_user && $save_order && $save_order_infos) {
            if (App::getLocale() == 'en') {
                return redirect()->back()->with(['success' => 'You are now order successfully!', 'order_code' => $order_code]);
            } else {
                return redirect()->back()->with(['success' => 'Bạn đã đặt hàng thành công!', 'order_code' => $order_code]);
            }
        } else {
            if (App::getLocale() == 'en') {
                return redirect()->back()->with('fail', 'Something went wrong, failed to order! Please Try Again!');
            } else {
                return redirect()->back()->with('fail', 'Đặt hàng thất bại! Bạn vui lòng kiểm tra lại thông tin!');
            }
        }
    }
    //Guest Order
    public function GuestSubmitOrder(Request $request)
    {
        $request->validate([
            'email' => array('required', 'regex:/^[^\s@-]+@[^\s@-]+\.[^\s@]+$/'),
            'fullname' => array('required', 'regex:/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
            'phone_number' => array('required', 'regex:/^[0-9]{10,11}$/'),
            'address' => array('required', 'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
            'warehouses' => 'required',
            'models' => 'required',
            'showrooms' => 'required',
            'OrderPrice' => 'required',
            'provinces' => 'required',

        ]);



        //UPDATE CUSTOMER INFO
        $user_info = new Customer_Info();
        $user_info->email = $request->email;
        $user_info->fullname = $request->fullname;
        $user_info->phone_number = $request->phone_number;
        $user_info->address = $request->address;
        $user_info->customer_role = 'guest';
        $save_info_user = $user_info->save();

        $isUser = Customer_Info::latest()->first();
        if ($isUser) {
            //VALIDATE AND INSERT ORDER
            $order = new order();
            $order->showroom = $request->showrooms;


            //check if order_code exists.
            $orderCodeExist = order::where('order_code', $order->order_code)->exists();
            //generate another ORDER CODE
            do {
                $order->order_code = 'ORDERID' . '-' . rand(0, 400) . time(); // generate new one
            } while ($orderCodeExist);

            $order_code = $order->order_code;
            $order->customer_id = $isUser->customer_id;
            $save_order = $order->save();
            //get order ID to insert order details table
            $order_id_order = order::select("order_id")
                ->where("order_code", $order->order_code)
                ->get();

            foreach ($order_id_order as $order) {
                $order_id = $order->order_id;
            }
            //insert order after being validated
            $order_details = new orderDetail();
            $order_details->order_id = $order_id;
            $order_details->model_id = $request->models;
            $order_details->order_price = $request->OrderPrice;
            $order_details->matp = $request->provinces;
            $save_order_infos = $order_details->save();
            // dd($save_info_user && $save_order && $save_order_infos);

            if ($save_info_user && $save_order && $save_order_infos) {


                if (App::getLocale() == 'en') {
                    return redirect()->back()->with(['success' => 'You are now order successfully!', 'order_code' => $order_code]);
                } else {
                    return redirect()->back()->with(['success' => 'Bạn đã đặt hàng thành công!', 'order_code' => $order_code]);
                }
            } else {
                if (App::getLocale() == 'en') {
                    return redirect()->back()->with('fail', 'Something went wrong, failed to order! Please Try Again!');
                } else {
                    return redirect()->back()->with('fail', 'Đặt hàng thất bại! Bạn vui lòng kiểm tra lại thông tin!');
                }
            }
        } else {
            if (App::getLocale() == 'en') {
                return redirect()->back()->with('fail', 'User Not Found!');
            } else {
                return redirect()->back()->with('fail', 'Người dùng không tồn tại!');
            }
        }
    }
    //order_tracking view
    public function order_tracking(Request $request)
    {

        return view('dashboard.user/ordertracking');
    }
    //order_tracking get order code
    public function getOrderCode(Request $request)
    {
        // dd($request->order_code_input);
        $order_code = $request->order_code_input;
        //find order info

        $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
            ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
            ->join('customer_infos', 'customer_infos.customer_id', '=', 'orders.customer_id')
            ->join('showrooms', 'showrooms.id', '=', 'orders.showroom')
            ->where('orders.order_code', '=', $order_code)
            ->where('model_infos.released', '=','active')
            ->get("*");

        return response()->json([
            'status' => 200,
            'order_infos' => $order_infos,
        ]);
    }

    public function cancelContract(Request $request)
    {
        $order_id = $request->order_id;
        $cancel_code_confirm = $request->input;
        // dd($order_id);
        $validator = Validator::make($request->all(), [
            'input' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $order = order::where('order_id', $order_id)->first();
            $cancel_code = $order->cancel_code;
            if ($cancel_code_confirm == $cancel_code) {
                $order_detail = orderDetail::where('order_id',$order_id)->first();
                // dd($order_detail);
                $order_detail->order_status = 'custcanceled';
                $order_detail->update();
                if(App::getLocale() == 'vi'){
                    return response()->json([
                        'status' => 200,
                        'message' => 'Trùng Khớp',
                    ]);
                }else{
                    return response()->json([
                        'status' => 200,
                        'message' => 'Matched',
                    ]);
                }
                
            }else{
               if(App::getLocale() == 'en'){
                return response()->json([
                    'status' => 404,
                    'message' => 'Cancel Code Does Not Match',
                ]);
               }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Mã Xác Nhận Không Trùng Khớp',
                ]);
               }
            }
           
        }
    }
}
