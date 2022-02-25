<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function create(Request $request){
        //validate input
        $request->validate([
            'email' => 'required|email|unique:customer_infos,email',
            'fullname'=> 'required',
            'citizen_id'=> 'required',
            'phone_number'=> 'required',
            'address'=> 'required',            
            'password' => 'required|min:5|max:30',
            'ConfirmPassword' => 'required|min:5|max:30|same:password',
        ]);
        $user_info = new Customer_Info();
        $user_info->email =  $request->email;
        $user_info->citizen_id = $request->citizen_id;
        $user_info->phone_number = $request->phone_number;
        $user_info->fullname = $request->fullname;
        $user_info->address = $request->address;
        $save_info = $user_info->save();

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        

        


        if($save && $save_info ){
            return redirect()->back()->with('success','you are now registered successfully'); 
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
        
        
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email|exists:customer_infos,email',
            'password' => 'required|min:5|max:30',
        ],[
            'email.exists' => 'This email is not exists on users database.'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::guard('web')->attempt($credentials)){
            
            return redirect()->route('user.profile.settings');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect email or password.');
        }
    }

    protected function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
