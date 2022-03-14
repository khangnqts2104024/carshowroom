@if(App::getLocale() == 'en')
    <h1>Forgot Password Email</h1>
    <p>{{$body}}</p>
<br>
<a href="{{$action_link}}">Reset Password</a>

@else
<h1>Khôi Phục Mật Khẩu Mới</h1>
    <p>{{$body}}</p>
<br>
<a href="{{$action_link}}">Khôi phục mật khẩu</a>
@endif
