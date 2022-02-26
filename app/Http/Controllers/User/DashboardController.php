<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use App\Models\Customer_Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

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
                'errors' => 'Error',
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
                    'message' => 'User not found',
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
                'errors' => 'Loi roi ong oi ',
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
                    'message' => 'User not found',
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
                'errors' => 'Error',
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
                    'message' => 'User not found',
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
                'errors' => 'Error123',
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
                'message' => 'User not found',
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
                'errors' => 'Loi roi ong oi ',
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
                    'message' => 'User not found',
                ]);
            }
        }
    }
    // Edit Avatar
    public function editAvatar(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'image_upload' => 'required|image',
        ]);

        if($validator->fails()){
            return response()->json([
                'code' =>0,
                'error'=>$validator->errors()->toArray(),
            ]);
        }else{
            $path = 'files/';
            $file = $request->file('image_upload');
            $file_name = time().'_'.$file->getClientOriginalName();

            $upload = $file->storeAs($path,$file_name);

            if($upload){
                return response()->json([
                    'code'=>1,
                    'msg'=>'New Image has been saved successfully',
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
            //123123123
        return response()->json([
            'users' => $users,
        ]);
    }
}
//test