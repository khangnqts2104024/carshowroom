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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản Lý Nhân viên</h3>
                </div>
                <div class="option-container">

                    <a href="{{url('admin/general/employee')}}">
                        <div class="option"> Tất Cả Nhân Viên</div>
                    </a>
                    <a href="{{url('admin/general/empcreate')}}">
                        <div class="option">Tạo Mới</div>
                    </a>

                </div>
                <div >
              

               

                <div class="showerror">
                <p class="text-danger">@error('password'){{$message}} @enderror</p>
                <p class="text-danger">@error('ConfirmPassword'){{$message}} @enderror</p>
                </div>
             
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Nhân Viên</th>
                                <th>Tên Nhân Viên</th>
                                <th>Số Điện Thoại</th>
                                <th>Chi Nhánh</th>
                                <th>Lấy Lại Mật Khẩu</th>
                                <th>Thông Tin Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>


                            <!-- test -->

                            <tr> @php $x=1 @endphp
                                @foreach ($emp as $p )


                                <!-- test -->

                                <!-- test -->
                                <td>{{ $x++ }}</td>
                                <td> NV-{{$p->emp_branch}}-{{$p->employee_id}}</td>
                                <td>{{ $p->fullname }}</td>
                                <td>{{ $p->phone_number}} </td>
                                <td>{{$p->employee_showroom->showroom_name }}</td>


                                <td class="flex-container">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passId{{$x}}">
                                        <i class="fa-solid fa-key"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="passId{{$x}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Quản Lý Tài Khoản Nhân Viên</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                               
                                                <div class="modal-body">
                                                    <form action="{{url('admin/general/empchangepass/'.$p->employee_id)}}" name="myForm" method="post" onsubmit="return validateForm()" >
                                                        <div class="form-group">
                                                        @csrf
                                                       
                                                            <label for="">Email nhân Viên</label>
                                                            <input type="text" class="form-control" value="{{$p->email}}" name="email" id="" aria-describedby="helpId" placeholder="" readonly>
                                                            <label for="">Mật Khẩu Mới</label><i style="color:red">*</i>
                                                            <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                                                            <span class="text-danger" class="password"></span>
                                                            <label for="">Xác Nhận Mật Khẩu</label><i style="color:red">*</i>
                                                            <input type="password" class="form-control" name="ConfirmPassword" id="" aria-describedby="helpId" placeholder="" >
                                                            <span class="text-danger" class="confirmpass"></span>
                                                        </div>

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <!-- Button trigger modal -->
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#empdetail{{$x}}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="empdetail{{$x}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header ">
                                                    <h5 class="modal-title">Thông Tin Chi Tiết</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body flex-container-left">
                                                    <div class="employeeinfo ">
                                                        <h5>Mã Nhân Viên</h5>
                                                        <p> NV-{{$p->emp_branch}}-{{$p->employee_id}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Email</h5>
                                                        <p>{{$p->email}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <div>
                                                            <h5>Tên Nhân Viên</h5>
                                                        </div>
                                                        <div>
                                                            <p>{{$p->fullname}}</p>
                                                        </div>

                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Chi Nhánh</h5>
                                                        <p>{{$p->emp_branch}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Địa Chỉ Nhà</h5>
                                                        <p> {{$p->address}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Số Điện Thoại</h5>
                                                        <p> {{$p->phone_number}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Tiền Lương</h5>
                                                        <p> {{$p->salary}} VND</p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <input id="massage" type="text" hidden value="{{Session::get('message')}}">
    <!-- /.row -->
</section>
@endsection
@section('script-section')

<script>
  var massage=document.getElementById('massage');
    if(document.getElementById('massage').value!=''){alert(massage.value);}
//validate



    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>
@endsection