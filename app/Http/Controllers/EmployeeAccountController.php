<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\employeeInfo;
use Illuminate\Http\Request;
use App\Models\employeeAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeAccountController extends Controller
{
    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email|exists:employee_accounts,email',
            'password' => 'required|min:5|max:30',
        ],[
            'email.exists' => 'This email is not exists on users database.'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::guard('employee')->attempt($credentials)){
            
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect email or password.');
        }
    }
     public function logout()
    {
        # code...
        Auth::guard('employee')->logout();
        return redirect()->route('admin.login');
    }

// create

public function create(Request $request){
    //validate input
    $request->validate([
        'email' => 'required|email|unique:employee_infos,email',
        'fullname'=> 'required',
        'role'=>'required',
        'emp_branch'=> 'required',
        'password' => 'required|min:5|max:30',
        'ConfirmPassword' => 'required|min:5|max:30|same:password',
    ]);

    $employee_info = new employeeInfo();
    $employee_info->email =  $request->email;
    $employee_info->fullname = $request->fullname;
    $employee_info->emp_branch = $request->emp_branch;
    $employee_info->phone_number = "updating";
    $save_info=$employee_info->save();

    $user = new employeeAccount();
    $user->email = $request->email;
    $user->role=$request->role;
    $user->password = Hash::make($request->password);
    $save = $user->save();

    

    


    if($save && $save_info ){
        return redirect('admin/general/employee')->with("<script>alert('Tạo Tài Khoản Thành Công')</script>"); 
    }else{
        return redirect()->back()->with("<script>alert('Có Gì Đó Sai Sai! Tạo Tài Khoản Không Thành Công')</script>");
    }
    
    
}



}
