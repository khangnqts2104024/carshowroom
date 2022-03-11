<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\carInfo;
use App\Models\Customer_Info;
use App\Models\Customer_Account;
use App\Models\employeeInfo;
use App\Models\modelInfo;
use App\Models\orderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\App;
class DashboardController extends Controller
{
   
    
    public function show()
    {
        return view('dashboard.user.profile/settings');
    }
    // Edit Fullname
    public function editfullname(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname'=> array('required','regex:/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user_customer_id = Auth::user()->customer_id;
            $user = Customer_Info::find($user_customer_id);


            
            if ($user) {
                $user->fullname = $request->fullname;
                $user->update();
                if(App::getLocale()=='en'){
                    $message = "Fullname Update Successfully";
                }else{
                    $message = "Cập Nhật Họ & Tên Thành Công";
                }
                return response()->json([
                    'status' => 200,
                    'messages' => $message,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'User not found',
                ]);
            }
        }
    }
    // Edit Address
    public function editaddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address'=> array('required','regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user_customer_id = Auth::user()->customer_id;
            $user = Customer_Info::find($user_customer_id);

            if ($user) {
                $user->address = $request->address;
                $user->update();
                if(App::getLocale()=='en'){
                    $message = "Address Update Successfully";
                }else{
                    $message = "Cập Nhật Địa Chỉ  Thành Công";
                }
                return response()->json([
                    'status' => 200,
                    'messages' => $message,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'User not found',
                ]);
            }
        }
    }
    // Edit Phone

    public function editphone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number'=> array('required','regex:/^[0-9]{10,11}$/'),
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user_customer_id = Auth::user()->customer_id;
            $user = Customer_Info::find($user_customer_id);

            if ($user) {
                $user->phone_number = $request->phone_number;
                $user->update();
                if(App::getLocale()=='en'){
                    $message = "Phone Update Successfully";
                }else{
                    $message = "Cập Nhật Số Điện Thoại Thành Công";
                }
                return response()->json([
                    'status' => 200,
                    'messages' => $message,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'User not found',
                ]);
            }
        }
    }
    // Edit Email
    public function editEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => array('required','regex:/^[^\s@-]+@[^\s@-]+\.[^\s@]+$/','unique:customer_accounts,email'),
            'password' => 'required|min:5|max:30',
        ]);

        $user_customer_id = Auth::user()->customer_id;
        $users = DB::table('customer_accounts')
            ->where('customer_id', '=', $user_customer_id)
            ->get();
       
        foreach ($users as $user) {
            $hashUserPassWord = $user->password;
        }

        $user = Customer_Info::find($user_customer_id);
        $passwordInField = $request->password;
        $matchPass = Hash::check($passwordInField, $hashUserPassWord);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } elseif ($user && $matchPass) {

            $user->email = $request->email;
            $user->update();
            if(App::getLocale()=='en'){
                $message = "Email Update Successfully";
            }else{
                $message = "Cập Nhật Email Thành Công";
            }
            return response()->json([
                'status' => 200,
                'messages' => $message,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'User not found',
            ]);
        }
    }

    
    // Edit Citizen ID
    public function editCitizenID(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'citizen_id'=> array('required','regex:/^[0-9]*$/'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user_customer_id = Auth::user()->customer_id;
            $user = Customer_Info::find($user_customer_id);

            if ($user) {
                $user->citizen_id = $request->citizen_id;
                $user->update();

                if(App::getLocale()=='en'){
                    $message = "Citizen ID Update Successfully";
                }else{
                    $message = "Cập Nhật Số CMND  Thành Công";
                }
                return response()->json([
                    'status' => 200,
                    'messages' => $message,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'User not found',
                ]);
            }
        }
    }
    // Edit Avatar
    public function editAvatar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image_upload' => array('required','image','mimes:jpg,png,jpeg','max:2048'),
        ]);

        if ($validator->fails()) {
            return response()->json([

                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            if ($request->hasFile('image_upload')) {
                //change this
                $path = public_path().'/storage/files/Avatar_User';
                $file = $request->file('image_upload');
                $fullnameUser = preg_replace('/\s+/', '', $request->fullname);
                $extension_img = $request->image_upload->guessClientExtension();
                $file_name = time() . '_' . $fullnameUser . '.' . $extension_img;
                //change this
                 $upload = $file->move($path,$file_name);
                $user_customer_id = Auth::user()->customer_id;
                $user = Customer_Info::find($user_customer_id);
                if ($upload) {
                    $user->avatar = $file_name;
                    $user->update();
                    if(App::getLocale()=='en'){
                        $message = "Avatar Updated Successfully";
                    }else{
                        $message = "Cập Nhật Ảnh Đại Diện Thành Công";
                    }
                    return response()->json([
                        'status' => 200,
                        'messages' => $message,
                    ]);
                }else {
                    if(App::getLocale()=='en'){
                        $message = "Upload Fail!";
                    }else{
                        $message = "Cập Nhật Không Thành Công!";
                    }
                    return response()->json([
                        'status' => 404,
                        'errors' => $message,
                    ]);
                }
            } else {
                if(App::getLocale()=='en'){
                    $message = "Upload Fail!";
                }else{
                    $message = "Cập Nhật Không Thành Công!";
                }
                return response()->json([
                    'status' => 404,
                    'errors' => $message,
                ]);
            }
        }
    }

    public function fetchData()
    {
        $customer_id = Auth::user()->customer_id;
        $users = DB::table('customer_infos')
            ->where('customer_id', '=', $customer_id)
            ->get();

        return response()->json([
            'users' => $users,
        ]);
    }


    //Order HisTory User
    public function show_order_history_page(){
        $customer_id_auth = Auth::user()->customer_id;
        $order_infos = orderDetail::join('orders', 'order_details.order_id', '=', 'orders.order_id',)
              ->join('model_infos', 'model_infos.model_id', '=', 'order_details.model_id')
              ->join('customer_infos','customer_infos.customer_id','=','orders.customer_id')
              ->join('showrooms','showrooms.id','=','orders.showroom')
              ->where('customer_infos.customer_id','=',$customer_id_auth)
              ->get(['model_infos.model_name','model_infos.price','customer_infos.fullname','customer_infos.address','customer_infos.email','customer_infos.phone_number','order_details.order_status','orders.order_code','orders.order_id','orders.order_date','showrooms.showroom_name','showrooms.address as showroom_address','showrooms.phone as showroom_phone','order_details.order_price']);
        return view('dashboard.user/profile/order_history')->with(['order_infos'=>$order_infos]);
    }

    // khang
    public function showcustlist()
    {


        $customer = Customer_Info::all();


        return view('admin.general.custmanage')->with(['customer' => $customer]);
    }

    public function detail($id)
    {

        $p = Customer_Info::find($id);
        // $p="haha";
        return view('admin.general.customerdetail')->with(['p' => $p]);
        // return view('admin.general.customerdetail')->with(['custDetail'=>$custDetail]);
    }
//khang tạo tk member
// public function taoacc(){
// $infos=Customer_Info::where('customer_role','member')->get();
// // dd($infos);
// foreach ($infos as $info ){
//     if($info->customer_role="member"){
//         $acc=new User();
//         $acc->customer_id=$info->customer_id;
//         $acc->email=$info->email;
//         $acc->password='$2y$10$PK/rCp4hXGOzeYZfUwnu8uuyVqlyp779HowEQr0QxfG3OLUGESrtO';
//     $acc->save();
//     }
// }
// }
// // tao xe sold
// public function taoxe(){
//     $order=orderDetail::where('order_status','sold')->get();
//     foreach($order as $o){
//  $car=new carInfo();
//  $car->order_id=$o->orders->order_id;
//  $car->car_model=$o->model_id;
//  $car->car_branch=$o->orders->showroom;
//  $car->car_status='sold';
//  $car->manufactoring_date=Carbon::now()->toDateTimeString();;
//  $car->save();
//     }
   
// }



}
//test
