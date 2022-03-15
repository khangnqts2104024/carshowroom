@extends('dashboard.layouts.layout')
@section('content')
@section('page_title')
    {{ "Forgot Password" }}
@endsection
<link rel="stylesheet" href="/css/account.css">
<title>Forgot Password</title>

<div class="signInbox mt-5">
            <div class="headerSignin">
              <p>{{__('login.Forgot Password')}}</p>
            </div>
            <form action="{{route('user.forgot.password.link') }}" method="post" class="mt-2" autocomplete="off">
              @if(Session::get('success'))
                   <div class="alert alert-success">
                     {{ Session::get('success')}}
                   </div>
              @endif
              @csrf
              <p class="alert alert-info">{{__('login.Enter your email address to receive a link to reset your password.')}}</p>
                <div class="form-group">
                  <label for="email-signIn">{{__('Email Address')}}</label>
                  <input type="email" name="email" class="form-control formRound" placeholder="{{__('Enter your Email')}}" value="{{old('email')}}">
                  {{-- show error message --}}
                  <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <button type="submit" class="btn btn-block buttonSignIn">{{__('login.Send Reset Password Link')}}</button>
            </form>


            <div class="or-text">
              <hr class="line">
              <span> {{__('login.OR')}}</span>
              <hr class="line">
            </div>
            
            <a href="{{route('user.login')}}"><button class="btn btn-block buttonCreateAccount">{{__('login.Signin')}}</button></a>
        </div>

        <hr>

  </div>

 


  @endsection

