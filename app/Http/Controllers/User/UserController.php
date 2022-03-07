<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\modelInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function fetchInfo_Layout()
    {
        $models_Layout_Page = modelInfo::select("model_name", "model_id", "price", "active", 'image', "gif")
            ->where("active", "active")
            ->get();
        return response()->json([
            'status' => 200,
            'models_Layout_Page' => $models_Layout_Page
        ]);
    }

    public function fetchInfo_Layout_auth()
    {
        $models_Layout_Page = modelInfo::select("model_name", "model_id", "price", "active", 'image', "gif")
            ->where("active", "active")
            ->get();
        return response()->json([
            'status' => 200,
            'models_Layout_Page' => $models_Layout_Page
        ]);
    }

    public function home()
    {
        $models = modelInfo::select("*")
            ->where("active", "active")
            ->get();
        return view('dashboard.user.home')->with(['models' => $models]);
    }

    public function home_auth()
    {
        $models = modelInfo::select("*")
            ->where("active", "active")
            ->get();
        return view('dashboard.user.home')->with(['models' => $models]);
    }


    public function loadLayoutLogin()
    {
        return view('dashboard.user.login');
    }
    public function loadLayoutRegister()
    {
        return view('dashboard.user.register');
    }
    public function create(Request $request)
    {
        //validate input
        $request->validate([
            'email' => array('required', 'regex:/^[^\s@-]+@[^\s@-]+\.[^\s@]+$/', 'unique:customer_accounts,email'),
            'fullname' => array('required', 'regex:/^[A-Za-z\s]+$/'),
            'citizen_id' => array('required', 'regex:/^[0-9]*$/'),
            'phone_number' => array('required', 'regex:/^[0-9]{10,11}$/'),
            'address' => array('required', 'regex:/^[a-zA-Z0-9,\-\s]*$/'),
            'password' => 'required|min:5|max:30',
            'ConfirmPassword' => 'required|min:5|max:30|same:password',

        ]);

        $user_info = new Customer_Info();
        $user_info->email =  $request->email;
        $user_info->citizen_id = $request->citizen_id;
        $user_info->phone_number = $request->phone_number;
        $user_info->fullname = $request->fullname;
        $user_info->address = $request->address;
        $user_info->customer_role = 'member';
        $user_info->avatar = 'AvatarDefault2.png';
        $save_info = $user_info->save();

        $isUser = Customer_Info::where('email', $request->email)->first(); //getID to pass customer_id in customer_account

        $user = new User();
        $user->email = $request->email;
        $user->customer_id = $isUser->customer_id;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save && $save_info) {
            $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.profile.settings');
        }
        } else {
            if (App::getLocale() == 'en') {
                return redirect()->back()->with('fail', 'Something went wrong, failed to register');
            } else {
                return redirect()->back()->with('fail', 'Đăng kí tài khoản thất bại');
            }
        }
    }

    public function authenticate(Request $request)
    {
        if (App::getLocale() == 'vi') {
            $request->validate(
                [
                    'email' => 'required|email|exists:customer_accounts,email',
                    'password' => 'required|min:5|max:30',
                ],
                [
                    'email.exists' => "Email không tồn tại!"
                ]
            );
        } else {
            $request->validate(
                [
                    'email' => 'required|email|exists:customer_accounts,email',
                    'password' => 'required|min:5|max:30',
                ],
                [
                    'email.exists' => "Email does not exist!"
                ]
            );
        }

        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {

            return redirect()->route('user.profile.settings');
        } else {
            if (App::getLocale() == 'en') {
                return redirect()->route('user.login')->with('fail', 'Incorrect email or password.');
            } else {
                return redirect()->route('user.login')->with('fail', 'Email hoặc Mật khẩu không đúng.');
            }
        }
    }

    protected function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/user/home');
    }
}
