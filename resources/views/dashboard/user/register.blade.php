@extends('dashboard.layouts.layout')
@section('content')
<link rel="stylesheet" href="/css/account.css">
        <div class="signInbox mt-5">
            <div class="headerSignin">
              <p>{{__('login.Create Account')}}</p>
            </div>
            <form action="{{route('user.create')}}" method="post">
                @if(Session::get('success'))
                    <div class="alert alert-success">
                      {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                      {{Session::get('fail')}}
                    </div>
                @endif
              @csrf
                <div class="form-group">
                  <label for="Full Name">{{__('Full Name')}}</label>
                  <input type="text" name="fullname" class="form-control formRound" value="{{old('fullname')}}">
                  <span class="text-danger">@error('fullname'){{$message}} @enderror</span>
                </div>       

                <div class="form-group">
                  <label for="Phone Number">{{__('Phone Number')}}</label>
                  <input type="text" name="phone_number" class="form-control formRound" value="{{old('phone_number')}}">
                  <span class="text-danger">@error('phone_number'){{$message}} @enderror</span>
                </div>    

                <div class="form-group">
                  <label for="First Name"> {{__('Address')}}</label>
                  <input type="text" name="address" class="form-control formRound" value="{{old('address')}}">
                  <span class="text-danger">@error('address'){{$message}} @enderror</span>
                </div>  

                <div class="form-group">
                  <label for="Citizen ID">{{__('Citizen ID')}}</label>
                  <input type="text" name="citizen_id" class="form-control formRound" value="{{old('citizen_id')}}">
                  <span class="text-danger">@error('citizen_id'){{$message}} @enderror</span>
                </div>   

                <div class="form-group">
                  <label for="email-signIn">{{__('login.Email Address')}}</label>
                  <input type="email" name="email" class="form-control formRound" value="{{old('email')}}">
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>

                <div class="form-group">
                  
                  <label for="password-signIn">{{__('login.Password')}}</label>
                  <div  id="form-password">
                    <input type="password" name="password" class="form-control formRound" id="passwordField" onclick="showIcon()" autocomplete="off" value="">
                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                  
                  </div>
                  
                 
                </div>

                <div class="form-group">
                  <label for="password-register">{{__('login.Confirm Password')}}</label>
                  <div  id="form-cpassword">
                    <input type="password" name="ConfirmPassword" class="form-control formRound" id="cpasswordField">
                    <span class="text-danger">@error('ConfirmPassword'){{$message}} @enderror</span>
                  </div>
                  
                 
                </div>

                <button type="submit" class="btn btn-block buttonSignIn mt-5">{{__('login.Create Account.')}}</button>

             
            </form>

            <div class="or-text">
              <hr class="line"></hr>
              <span> OR</span>
              <hr class="line"></hr>
            </div>
            <a href="{{route('user.login')}}"><button class="btn btn-block buttonCreateAccount">LOGIN</button></a>

            

            
            
        </div>
  </div>



  @endsection