<!--  -->
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
                    <div class="option"><a href="carmanage"> Tất Cả Xe</a></div>
                    <div class="option"><a href="carmanagepending">Xe Đang Vận Chuyển</a></div>
                    <div class="option"><a href="carmanageshowroom">Xe Đã Tới Showroom</a></div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Model</th>
                                <th>Showroom</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Ngày Đặt Hàng</th>
                                <th>Ngày Xuất Kho</th>
                                <th>Tình Trạng</th>
                                <th>Thông Tin Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>


                            @php $x=1 @endphp
                            @foreach ($cars as $p)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td> {{$p->models->model_name}}</td>
                                <td>{{ $p->showrooms->showroom_name}}</td>
                                <td>{{ $p->orders->order_code}} </td>
                                <td>{{ $p->orders->customer->fullname}} </td>
                                <td>{{ $p->manufactoring_date}}</td>
                                <td>{{ $p->orders->order_date}}</td>
                                <td>{{ $p->car_status}} </td>
                                <td class="flex-container">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cardetail{{$x}}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="cardetail{{$x}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                                        <h5>Mã Xe</h5>
                                                      <p>  {{$p->car_id}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Mã Đơn Hàng</h5>
                                                      <p>  {{ $p->orders->order_code}} </p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Model Xe</h5>
                                                      <p>  {{$p->models->model_name}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Showroom</h5>
                                                        <p>{{ $p->showrooms->showroom_name}}</p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                      <div>  <h5>Tên Khách Hàng</h5></div>
                                                       <div> <p>{{ $p->orders->customer->fullname}} </p></div>
                                                        
                                                    </div>
                                                    <div class="employeeinfo ">
                                                      <div>  <h5>Số Điện Thoại Khách Hàng</h5></div>
                                                       <div> <p>{{ $p->orders->customer->phone_number}}</p> </div>
                                                        
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Thời Gian</h5>
                                                        <p>Ngày Đặt Hàng:{{ $p->orders->order_date}}<br>
                                                        Ngày xuất Kho:{{ $p->manufactoring_date}}
                                                        </p>
                                                    </div>
                                                    <div class="employeeinfo ">
                                                        <h5>Tình Trạng</h5>
                                                       <p> {{ $p->car_status}}</p>
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
                            <!-- test -->

                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>STT</th>
                            <th>Model</th>
                            <th>Showroom</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Ngày Xuất Kho</th>
                            <th>Tình Trạng</th>
                            <th>Thông Tin Chi Tiết</th>
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
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection