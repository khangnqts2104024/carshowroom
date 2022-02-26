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


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản Lý Xe</h3>
                </div>
                <div class="option-container">
                <a href="{{url('admin/warehouse')}}">
                        <div class="option"> Tất Cả </div>
                    </a>
                    <a href="{{url('admin/warehouse/ordering')}}">
                        <div class="option">Xe Đang Đăt Hàng</div>
                    </a>
                    <a href="{{url('admin/warehouse/released')}}">
                        <div class="option">Xe Đã Xuất Kho</div>
                    </a>
                    <a href="{{url('admin/warehouse/delete')}}">
                        <div class="option">Đơn Hàng Hủy</div>
                    </a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="product" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Car ID</th>
                                <th>Model</th>
                                <th>Showroom</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày xuất</th>
                                <th>Tình Trạng</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>1</td>
                                <td>Fadil 22</td>
                                <td>Showroom 1</td>
                                <td>order 1</td>
                                <td>26-02-22</td>
                                <td> <span class="status">custcanceled </span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-danger car-add">Hoàn Kho</a>
                            </td>
                            </tr>
                            <!-- test -->
                            
                            <tr>

                                <td>1</td>
                                <td>Fadil 22</td>
                                <td>Showroom 1</td>
                                <td>order 1</td>
                                <td>26-02-22</td>
                                <td> <span class="status">custcanceled</span> 
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-danger car-add">Hoàn Kho</a>
                            </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>Fadil 22</td>
                                <td>Showroom 1</td>
                                <td>order 1</td>
                                <td>26-02-22</td>
                                <td> <span class="status">custcanceled </span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-danger car-add">Hoàn Kho</a>
                            </td>
                            </tr>
                            <tr>

                                <td>1</td>
                                <td>Fadil 22</td>
                                <td>Showroom 1</td>
                                <td>order 1</td>
                                <td>26-02-22</td>
                                <td> <span class="status">custcanceled </span>
                                    <a href="{{url('admin/warehouse/create/.$car->orderid')}}" class="btn btn-danger car-add">Hoàn Kho</a>
                            </td>
                            </tr>
                            <!-- end test -->

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Car ID</th>
                                <th>Model</th>
                                <th>Showroom</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày xuất</th>
                                <th>Tình Trạng</th>
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
    ]
    <!-- /.row -->
</section>
@endsection
@section('script-section')
<script>
   
</script>
@endsection