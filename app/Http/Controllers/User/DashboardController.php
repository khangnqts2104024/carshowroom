<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use App\Models\Customer_Account;
use App\Models\employeeInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use SebastianBergmann\Environment\Console;

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
            'fullname' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = Customer_Info::find($request->customer_id);

            if ($user) {
                $user->fullname = $request->fullname;
                $user->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'Fullname Update Successfully',
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
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = Customer_Info::find($request->customer_id);

            if ($user) {
                $user->address = $request->address;
                $user->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'Address Update Successfully',
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
            'phone_number' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = Customer_Info::find($request->customer_id);

            if ($user) {
                $user->phone_number = $request->phone_number;
                $user->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'Phone Update Successfully',
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
            'email' => 'required',
            'password' => 'required',
        ]);

        $user_Email = Auth::user()->email;
        $users = DB::table('customer_accounts')
            ->where('email', '=', $user_Email)
            ->get();

        foreach ($users as $user) {
            $hashUserPassWord = $user->password;
        }

        $user = Customer_Info::find($request->customer_id);
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
            return response()->json([
                'status' => 200,
                'messages' => 'Email Update Successfully',
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
            'citizen_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user = Customer_Info::find($request->customer_id);

            if ($user) {
                $user->citizen_id = $request->citizen_id;
                $user->update();
                return response()->json([
                    'status' => 200,
                    'messages' => 'Citizen ID Update Successfully',
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

        $validator = Validator::make($request->all(),[
            'image_upload' => 'required|image|mimes:jpg,png,jpeg|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json([

                'status' =>400,
                'errors'=>$validator->errors(),
            ]);
        }else{
           if($request->hasFile('image_upload')){
                $path = 'files/Avatar_User';
                $file = $request->file('image_upload');
                $fullnameUser = preg_replace('/\s+/', '', $request->fullname);
                $extension_img = $request->image_upload->guessClientExtension();
                $file_name = time().'_'.$fullnameUser.'.'.$extension_img;
                $upload = $file->storeAs($path,$file_name,'public');
                $user = Customer_Info::find($request->customer_id);


            if ($upload) {
                $user->avatar = $file_name;
                $user->update();

                return response()->json([

                    'status' => 200,
                    'messages' => 'Avatar Updated Successfully',
                    

                ]);
           
            }else {
                return response()->json([
                    'status' => 404,
                    'errors' => 'Upload Fail!',
                ]);
            }


        }else {
            return response()->json([
                'status' => 404,
                'errors' => 'Upload Fail!',
            ]);

        }
    }
}

    public function fetchData()
    {
        $user_Email = Auth::user()->email;
        $users = DB::table('customer_infos')
            ->where('email', '=', $user_Email)
            ->get();


        return response()->json([
            'users' => $users,
        ]);
    }

    // khang
    public function showcustlist()
    {

       
        $customer = Customer_Info::all();


        return view('admin.general.custmanage')->with(['customer' => $customer]);
    }

    public function edit($id)
    {   
     
        $p = Customer_Info::find($id);
// $p="haha";
return view('admin.general.customerdetail')->with(['p'=>$p]);
        // return view('admin.general.customerdetail')->with(['custDetail'=>$custDetail]);
    }
}
//test
