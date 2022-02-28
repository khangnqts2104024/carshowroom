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
                    <h3 class="card-title">Quản Lý Đơn Hàng</h3>
                </div>
                <div class="option-container">

                    <a href="{{url('admin/showroom')}}">
                        <div class="option"> Tất Cả Đơn Hàng</div>
                    </a>
                    <a href="{{url('admin/showroom/check')}}">
                        <div class="option">Đơn Hàng Cần Tư Vấn</div>
                    </a>
                    <a href="{{url('admin/showroom/myorder')}}">
                        <div class="option">Đơn Hàng Của Tôi</div>
                    </a>
                    <a href="{{url('admin/showroom/ordercanceled')}}">
                        <div class="option">Đơn Hàng Hủy</div>
                    </a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Model Xe</th>
                                <th>Tình Trạng Đơn Hàng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td> <span class="status">ordered</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-success car-add">Nhận Đơn Hàng</a>
                                </td>
                            </tr>
                            <!-- test -->
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td> <span class="status">ordered</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-success car-add">Nhận Đơn Hàng</a>
                                </td>
                            </tr>

                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td> <span class="status">ordered</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-success car-add">Nhận Đơn Hàng</a>
                                </td>
                            </tr>

                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td class="flex-container"><span class="status"> ordered</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-success car-add">Nhận Đơn Hàng</a>
                                </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td class="flex-container"> <span class="status">ordered</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-success car-add">Nhận Đơn Hàng</a>
                                </td>
                            </tr>


                            </tfoot>
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
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection