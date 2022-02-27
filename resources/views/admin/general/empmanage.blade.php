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
                         
                            <tr> @php  $x=1 @endphp
                                @foreach ($emp as $p)
                                <td>{{ $x++ }}</td>
                                <td> {{$p->employee_id}}</td>
                                <td>{{ $p->fullname }}</td>
                                <td>{{ $p->phone_number}} </td>
                                <td>{{$p->address }}</td>
                                <td>{{$p->belongsTo('App\Model\employeeAccount','foreign_key','localkey');}}</td>
                                <td><td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                                        <i class="fa-solid fa-key"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lấy Lại Mật Khẩu</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Mã Nhận Viên</label>
                                                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                                        <label for="">Mật Khẩu Mới</label>
                                                        <input type="password" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

                                                        <label for="">Xác Nhận Mật Khẩu</label>
                                                        <input type="password" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <!-- Button trigger modal -->
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#empdetail">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="empdetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Thông Tin Chi Tiết</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Body
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
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

    <!-- /.row -->
</section>
@endsection
@section('script-section')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection