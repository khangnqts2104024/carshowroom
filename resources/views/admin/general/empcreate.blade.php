<!-- Lưu tại resources/views/product/index.blade.php -->
@extends('layouts_admin.layoutadmin')
@section('title', 'product index')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="vin-title">VINFAST</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <link rel="stylesheet" href="/css/account.css">
    <div class="signInbox ">
        <div class="empsignin">
            <div class="headerSignin">
                <p>Tạo Tài Khoản</p>
            </div>
            <form action="{{route('user.create')}}" method="post">
                <!-- báo tạo tài khoản -->
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
                    <label for="Full Name">Mã Nhân Viên</label>
                    <input type="text" name="empID" class="form-control formRound" value="{{old('fullname')}}">
                    <span class="text-danger">@error('empID'){{$message}} @enderror</span>
                </div>






                <div class="form-group">

                    <label for="password-signIn">Password</label>
                    <div id="form-password">
                        <input type="password" name="password" class="form-control formRound" id="passwordField" onclick="showIcon()" autocomplete="off" value="{{old('password')}}">
                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                        <span class="eye" id="eye" onclick="showPass()">
                            <i class="fa fa-eye" aria-hidden="true" id="show"></i>
                            <i class="fa fa-eye-slash" aria-hidden="true" id="hide"></i>
                        </span>
                    </div>


                </div>

                <div class="form-group">
                    <label for="password-register">Xác Nhận Mật Khẩu</label>
                    <div id="form-cpassword">
                        <input type="password" name="ConfirmPassword" class="form-control formRound" id="cpasswordField">
                        <span class="text-danger">@error('ConfirmPassword'){{$message}} @enderror</span>

                    </div>


                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="role">Phòng ban</label>
                        <select id="role" class="form-control" name="emp_role">
                            <option value="warehouse">WareHouse</option>
                            <option value="dealer">Dealer</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-block buttonSignIn mt-5">Tạo Tài Khoản</button>


            </form>



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

    @endsection