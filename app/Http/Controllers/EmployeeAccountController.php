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
            'email' => 'required|email|exists:customer_infos,email',
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
}
