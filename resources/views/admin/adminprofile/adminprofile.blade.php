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
    <div  class=" flex-container ">
         <span class="text-danger">@error('fullname'){{$message}} @enderror</span>
        <span class="text-danger">@error('phone'){{$message}} @enderror</span>
        <span class="text-danger">@error('address'){{$message}} @enderror</span>
       <div class="flex-container-column"> <span class="text-danger">{{Session::get('error')}}</span>
        <span class="text-danger">@error('oldpassword'){{$message}} @enderror</span>
        <span class="text-danger">@error('password'){{$message}} @enderror</span>
        <span class="text-danger">@error('confirmpass'){{$message}} @enderror</span>
        </div>
    </div>
    <div class="flex-container">


        <!-- tên -->
        <div class="employeeinfo">
            <h4>Tên Nhân Viên:</h4>
            <h5> {{$employee->fullname}}</h5>
            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#name">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="name" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cập Nhật Tên</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('admin/profile/myprofile/editfullname')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" hidden name="id" value="{{$employee->employee_id}}">
                                    <label for="fullname">Tên Nhân Viên</label>
                                    <input id="fullname" class="form-control" type="text" name="fullname">

                                </div>


                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- ok -->
        <div class="employeeinfo">
            <h4>Email</h4>
            <h5> {{$employee->email}}</h5>
        </div>
        <!-- sdt -->
        <div class="employeeinfo">
            <h4>Số Điện Thoại:</h4>
            <h5>{{$employee->phone_number}}</h5>

            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#phone">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="phone" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cập Nhật Số Điện Thoại</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('admin/profile/myprofile/editphone')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="id" hidden value="{{$employee->employee_id}}">
                                    <label for="phone">Số Điện Thoại</label>
                                    <input id="phone" class="form-control" type="text" name="phone">

                                </div>



                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- dia chỉ -->
        <div class="employeeinfo">
            <h4>Địa Chỉ:</h4>
            <h5>{{$employee->address}}</h5>
            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#address">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cập Nhật Địa Chỉ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('admin/profile/myprofile/editaddress')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="id" hidden value="{{$employee->employee_id}}">
                                    <label for="address">Địa Chỉ</label>
                                    <input id="address" class="form-control" type="text" name="address">
                                </div>



                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- password -->
        <div class="employeeinfo">
            <h4>Password:</h4>
            <h5>***********</h5>
            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#password">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thay Đổi Password:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('admin/profile/myprofile/editpassword')}}" method="post">
                                @csrf
                                <input type="text" name="id" hidden value="{{$employee->employee_id}}">
                                <div class="form-group">
                                    <label for="oldpassword">Password Cũ</label>
                                    <input id="oldpassword" class="form-control" type="password" name="oldpassword">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control" type="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="confirmpass">Xác Nhận Password</label>
                                    <input id="confirmpass" class="form-control" type="password" name="confirmpass">
                                </div>




                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="employeeinfo">
            <h4>Tiền Lương:</h4>
            <h5> {{$employee->salary}} VND</h5>
            <h4>Hoa Hồng:</h4>
            <h5> VND</h5>
        </div>
        <div class="employeeinfo">
            <h4>Chi Nhánh:</h4>
            <h5> {{$employee->employee_showroom->showroom_name}}</h5>

        </div>












        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
@section('script-section')
<script>

</script>
@endsection
<!-- dddd kkkjuj-->