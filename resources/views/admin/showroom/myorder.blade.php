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
                                <th>THông Tin Chi Tiết</th>
                                <th>Tình Trạng Đơn Hàng</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $x=1 @endphp
                            @foreach ($orders as $p)

                            <tr>

                                <td>{{ $x++ }}</td>
                                <td> {{$p->orders->order_code}}</td>
                                <td>{{$p->orders->customer->fullname}}</td>
                                <td>{{$p->orders->customer->email}} </td>
                                <td>{{$p->orders->customer->phone_number}} </td>
                                <td>{{$p->modelInfos->model_name}} </td>
                                <td style="text-align: center;"> <a href="{{ url('admin/showroom/orderdetail/'.$p->order_id.'/'.$p->model_id)}}" class='btn btn-primary'> <i class='fa-solid fa-circle-info'></i></a> </td>

                                <td class="flex-container-column ">
                                    <p class="status">{{$p->order_status}}</p>
                                    @if($p->order_status=='deposited')

                                    <button class="btn btn-warning car-add" type="button" data-toggle="collapse" data-target="#contentId{{$x}}" aria-expanded="false" aria-controls="contentId">
                                        Xác Nhận Đơn

                                    </button>
                                    @elseif($p->order_status=='released')
                                    <button class="btn btn-primary car-add" type="button" data-toggle="collapse" data-target="#contentId{{$x}}" aria-expanded="false" aria-controls="contentId">
                                        Giao Xe Cho Khách

                                    </button>
                                    @elseif($p->order_status=='custcanceled')
                                    <button class="btn btn-danger car-add" type="button" data-toggle="collapse" data-target="#contentId{{$x}}" aria-expanded="false" aria-controls="contentId">
                                        Thủ tục Hủy

                                    </button>
                                    @endif
                                    <div class="collapse" id="contentId{{$x}}">
                                        <br>
                                        @if($p->order_status=='deposited')

                                        <a href="{{url('admin/showroom/confirmorder/'.$p->id)}}" class='btn btn-success car-add'>Xác Nhận</a>
                                        @elseif($p->order_status=='released')

                                        <a href="{{url('admin/showroom/sold/'.$p->id)}}" class='btn btn-success car-add'>Xác nhận</a>
                                        @elseif($p->order_status=='custcanceled')

                                        <a href="{{url('admin/showroom/ordercanceled/'.$p->id)}}" class='btn btn-success car-add'>Xác nhận</a>


                                    </div>





                                </td>
                                @endif </td>
                            </tr>
                            @endforeach
                        </tbody>
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
    <!-- <input id="massage" type="text" hidden value="{{Session::get('error')}}"> -->
    <!-- /.row -->
</section>
@endsection

@section('script-section')
<script>
  var massage=document.getElementById('massage');
    if(document.getElementById('massage').value!=''){alert(massage.value);}

    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection