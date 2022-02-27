<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">


</head>

<body>

    <div class="container-fluid">
        <!-- Start navbar -->


        <!-- nav PC -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-pc sticky-top">
            <a href="/" class="logoVinFast"><img src="https://vinfastauto.com/themes/porto/img/logo-header.svg" alt="Vinfast" /></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    </div>
    </nav>

    <link rel="stylesheet" href="/css/account.css">


    <div class="signInbox mt-5">
        <div class="headerSignin">
            <p>Đăng Nhập</p>
        </div>
        <form action="{{route('admin.authenticate') }}" method="post">
            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail')}}
            </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="email-signIn">Email </label>
                <input type="email" name="email" class="form-control formRound" value="{{old('email')}}">
                {{-- show error message --}}
                <span class="text-danger">@error('email'){{$message}}@enderror</span>

            </div>

            <div class="form-group">
                <label for="password-signIn">Mật Khẩu</label>
                <div id="form-password">
                    <input type="password" name="password" class="form-control formRound" id="passwordField" onclick="showIcon()" autocomplete="off">

                    <span class="eye" id="eye" onclick="showPass()">
                        <i class="fa fa-eye" aria-hidden="true" id="show"></i>
                        <i class="fa fa-eye-slash" aria-hidden="true" id="hide"></i>
                    </span>
                </div>
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>

            <button type="submit" class="btn btn-block buttonSignIn">Đăng Nhập</button>
            
        </form>
        <br>
        <br>
        <div class="text-center">
                Đây Là Trang Nội Bộ! Nếu Bạn Không Phải Nhân Viên Vui Lòng Chuyển Về Trang <a href="{{url('/')}}">Home</a> Để Tiếp Tục Thăm Website Của Chúng Tôi!Xin Chân Thành Cảm Ơn!
            </div>

    

       

       </div>
    </div>
    <script>
        //show con mắt - tắt mắt khi out focus
        window.addEventListener('click', function(e) {

            if (document.getElementById('passwordField').contains(e.target)) {
                //focus 
                showIcon();
            } else if (document.getElementById('passwordField').value != '') {
                document.getElementById('eye').style.display = 'block'; //them dong này

            } else {
                document.getElementById('eye').style.display = 'none';
            }
        });

        function showIcon() {
            var eyeIcon = document.getElementById('eye');
            eyeIcon.style.display = 'block';
        }

        //show mật khẩu 
        function showPass() {
            var inputfield = document.getElementById('passwordField');
            var show = document.getElementById('show');
            var hide = document.getElementById('hide');

            if (inputfield.type === 'password') {
                inputfield.type = 'text';
                show.style.display = 'none';
                hide.style.display = 'block';

            } else {
                inputfield.type = 'password';
                show.style.display = 'block';
                hide.style.display = 'none';

            }
        }
    </script>
    @php

    @endphp
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    @stack('scriptsHomePage')