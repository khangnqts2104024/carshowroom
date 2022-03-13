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
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $user_id = Auth::user()->customer_id;
        $user_name = Customer_Info::select("fullname")
        ->where("customer_id",'=',$user_id)
        ->get();

        return response()->json([
            'status' => 200,
            'models_Layout_Page' => $models_Layout_Page,
            'user_name'=>$user_name
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
            'fullname' => array('required', 'regex:/^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
            'citizen_id' => array('required', 'regex:/^[0-9]*$/'),
            'phone_number' => array('required', 'regex:/^[0-9]{10,11}$/'),
            'address' => array('required', 'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
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
        $user_info->avatar = 'AvatarDefault.jpeg';
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

    public function showForgotForm(){
        return view('dashboard.user.forgot');
    }

    public function sendResetLink(Request $request){
        if(App::getLocale() == 'en'){
            $request->validate([
                'email'=>'required|email|exists:customer_accounts,email'
            ],
            [
                'email.exists' => "Email does not exist!"
            ]);
        }else{
            $request->validate([
                'email'=>'required|email|exists:customer_accounts,email'
            ],
            [
                'email.exists' => "Email không tồn tại!"
            ]);
        }
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('user.reset.password.form',['token'=>$token,'email'=>$request->email]);
        if(App::getLocale() == 'en'){
            $body = "We are received a request to reset the password for Car Show Room account associated with ".$request->email.
        ". You can reset your password by clicking the link below."; 
        Mail::send('emails.email-forgot',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
            $message->from('carshowroom2022@gmail.com','Car Show Room');
            $message->to($request->email,'')
                    ->subject("Reset Password");
        });
        return back()->with('success','We have e-mailed your password reset link!');

        }else{
            
            $body = "Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản Car Show Room được liên kết với ".$request->email.
            ". Bạn có thể đặt lại mật khẩu của mình bằng cách nhấp vào liên kết bên dưới.";
            Mail::send('emails.email-forgot',['action_link'=>$action_link,'body'=>$body],function($message) use ($request){
                $message->from('carshowroom2022@gmail.com','Car Show Room');
                $message->to($request->email,'')
                        ->subject("Khôi Phục Mật Khẩu");
            });
    
            return back()->with('success','Chúng tôi đã gửi e-mail liên kết đặt lại mật khẩu của bạn!');
        }
        

       
    }

    public function showResetForm(Request $request, $token = null){
        return view('dashboard.user.reset')->with(['token'=>$token,'email'=>$request->email]);
    }

    public function resetPassword(Request $request){
       if(App::getLocale() == 'en'){
        $request->validate([
            'email'=>'required|email|exists:customer_accounts,email',
            'password' => 'required|min:5|max:30',
            'ConfirmPassword' => 'required|min:5|max:30|same:password',
        ],[
            'email.exists' => "Email does not exist!"
        ]);
       }else{
        $request->validate([
            'email'=>'required|email|exists:customer_accounts,email',
            'password' => 'required|min:5|max:30',
            'ConfirmPassword' => 'required|min:5|max:30|same:password',
        ],[
            'email.exists' => "Email không tồn tại!"
        ]);
       }

        $check_token = DB::table('password_resets')->where([
            'email' =>$request->email,
            'token' =>$request->token
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail','invalid-token');
        }else{
            User::where('email',$request->email)->update([
                'password'=>Hash::make($request->password),
            ]);

            DB::table('password_resets')->where('email',$request->email)->delete();
            if(App::getLocale() == 'en'){
                return redirect()->route('user.login')->with('info','Your password has been changed! You can login with new password!')
                ->with('verifiedEmail',$request->email);
            }else{
                return redirect()->route('user.login')->with('info','Mật khẩu của bạn đã được thay đổi! Bạn có thể đăng nhập bằng mật khẩu mới!')
                ->with('verifiedEmail',$request->email);
            }
           
        }
    }



    protected function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/user/home');
    }
}
