@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="/css/account.css">


<div class="signInbox mt-5">
            <div class="headerSignin">
              <p>Admin Login</p>
            </div>
            <form action="{{route('user.authenticate') }}" method="post">
              @if(Session::get('fail'))
                   <div class="alert alert-danger">
                     {{ Session::get('fail')}}
                   </div>
              @endif
              @csrf
                <div class="form-group">
                  <label for="email-signIn">Email Address</label>
                  <input type="email" name="email" class="form-control formRound" value="{{old('email')}}">
                  {{-- show error message --}}
                  <span class="text-danger">@error('email'){{$message}}@enderror</span>
                  
                </div>

                <div class="form-group">
                  <label for="password-signIn">Password</label>
                  <div  id="form-password">
                    <input type="password" name="password" class="form-control formRound" id="passwordField" onclick="showIcon()" autocomplete="off">
                    
                    <span class="eye" id="eye" onclick="showPass()">
                        <i class="fa fa-eye" aria-hidden="true" id="show"></i>
                        <i class="fa fa-eye-slash" aria-hidden="true" id="hide"></i> 
                    </span>          
                  </div>
                  <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>

                <button type="submit" class="btn btn-block buttonSignIn">SIGN IN</button>
            </form>

            <div class="forgot text-center">
                <a href="#">Forgot email?</a> <span>|</span> <a href="{{route('password.request')}}">Forgot password?</a>
            </div>

        </div>
        
  </div>
  <script>
      //show con mắt - tắt mắt khi out focus
      window.addEventListener('click', function(e) {
       
       if (document.getElementById('passwordField').contains(e.target)) {
         //focus 
           showIcon();
        }else if(document.getElementById('passwordField').value != ''){
         document.getElementById('eye').style.display = 'block';//them dong này
         
        }else{document.getElementById('eye').style.display = 'none';}
       });

     function showIcon(){
      var eyeIcon = document.getElementById('eye');
      eyeIcon.style.display = 'block';
     }

//show mật khẩu 
      function showPass(){
        var inputfield = document.getElementById('passwordField');
        var show = document.getElementById('show');
        var hide = document.getElementById('hide');
        
        if(inputfield.type === 'password'){
          inputfield.type = 'text';
          show.style.display = 'none';
          hide.style.display = 'block';
          
        }else{
          inputfield.type = 'password';
          show.style.display = 'block';
          hide.style.display = 'none';
          
        }
      }
    </script>
@php
    
@endphp
  @endsection

