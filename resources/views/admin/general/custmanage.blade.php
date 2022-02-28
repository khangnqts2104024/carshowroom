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
                    <h3 class="card-title">Quản Lý Khách Hàng</h3>
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

                        
                            <!-- test -->
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td class="flex-container"> <span class="status">checked</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-danger car-add">Hủy Đơn Hàng</a>
                                </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td> canceled
                                </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td class="flex-container"> <span class="status">deposit</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-success car-add">Xác Nhận Đơn Hàng</a>
                                </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td class="flex-container"> <span class="status">confirm</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-success car-add">Đã Giao Xe</a>
                                </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td class="flex-container"><span class="status">custcanceled</span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-danger car-add">Hủy Hợp Đồng</a>

                                </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>order 123</td>
                                <td>Khang</td>
                                <td>khang@gmail.com</td>
                                <td>0703333333</td>
                                <td>Fadil 22</td>
                                <td> sold
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