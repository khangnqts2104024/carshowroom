@extends('dashboard.layouts.layout')
@section('content')
<link rel="stylesheet" href="/css/account.css">


<div class="signInbox mt-5">
            <div class="headerSignin">
              <p>{{__('login.Signin')}}</p>
            </div>
            <form action="{{route('user.authenticate') }}" method="post">
              @if(Session::get('fail'))
                   <div class="alert alert-danger">
                     {{ Session::get('fail')}}
                   </div>
              @endif
              @if(Session::get('info'))
              <div class="alert alert-info">
                {{ Session::get('info')}}
              </div>
         @endif
              @csrf
                <div class="form-group">
                  <label for="email-signIn">{{__('login.EmailAddress')}}</label>
                  <input type="email" name="email" class="form-control formRound" value="{{$verifiedEmail ?? old('email')}}">
                  {{-- show error message --}}
                  <span class="text-danger">@error('email'){{$message}}@enderror</span>
                  
                </div>

                <div class="form-group">
                  <label for="password-signIn">{{__('login.Password')}}</label>
                  <div  id="form-password">
                    <input type="password" name="password" class="form-control formRound" id="passwordField" onclick="showIcon()" autocomplete="off">
                    
                    <span class="eye" id="eye" onclick="showPass()">
                        <i class="fa fa-eye" aria-hidden="true" id="show"></i>
                        <i class="fa fa-eye-slash" aria-hidden="true" id="hide"></i> 
                    </span>          
                  </div>
                  <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>

                <button type="submit" class="btn btn-block buttonSignIn">{{__('login.Signin')}}</button>
            </form>

            <div class="forgot text-center">
              <a href="{{ url('/redirect/google') }}" class="btn btn-primary" style="color: white;background-color:rgb(61,105,225)"><i class="fa fa-google"></i> Google</a> <span>|</span> <a href="{{route('user.forgot.password.form')}}">{{__('login.ForgotPassword?')}}</a>
            </div>

            <div class="or-text">
              <hr class="line">
              <span> {{__('login.OR')}}</span>
              <hr class="line">
            </div>
            
            <a href="{{route('user.register')}}"><button class="btn btn-block buttonCreateAccount">{{__('login.Create Account.')}}</button></a>
        </div>

        <hr>
  

    
        
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
  @endsection

