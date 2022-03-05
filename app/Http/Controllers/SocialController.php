<?php

namespace App\Http\Controllers;

use App\Models\Customer_Info;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class SocialController extends Controller
{

public function redirectGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function callbackGoogle()
{ 
            try {
    
                $user_info_Google = Socialite::driver('google')->user();
                $isUser = User::where('google_id', $user_info_Google->id)->first();
         
                if($isUser){
                    Auth::login($isUser);
                    return redirect('/user/auth/home');
                }else{
                    //create_infos
                    $new_user_info = new Customer_Info();
                    $new_user_info->email = $user_info_Google->email;
                    $new_user_info->fullname = $user_info_Google->name;
                    $new_user_info->avatar = $user_info_Google->avatar;
                    $new_user_info->fullname = $user_info_Google->name;
                    $new_user_info->customer_role = 'member';
                    $save_user_info = $new_user_info->save();
                    
                    //create_account
                    $new_user_account = new User();
                    $new_user_account->email = $user_info_Google->email;
                    $new_user_account->password = Hash::make("user1234");
                    $new_user_account->google_id = $user_info_Google->id;
                    $save_user_account = $new_user_account->save();
                    Auth::login($new_user_account);
                    return redirect('/user/auth/home');
                }
        
            } catch (Exception $exception) {
                dd($exception->getMessage());
            }
        }      
   }