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

                            @php $x=1 @endphp
                            @foreach ($orders as $p)

                            <tr>

                                <td>{{ $x++ }}</td>                               
                                <td> {{$p->orders->order_code}}</td>
                                <td>{{$p->orders->customer->fullname}}</td>
                                <td>{{$p->orders->customer->email}} </td>
                                <td>{{$p->orders->customer->phone_number}} </td>
                                <td>{{$p->modelInfos->model_name}} </td>
                                <td id="" class="flex-container-column status_container"> 
                                    <p class="status">{{$p->order_status}}</p>
                                  </td>
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

    <!-- /.row -->

  
</section>
@endsection

@section('script-section')

<script>

$(document).ready( function () {
    $('#myTable').DataTable();
//  status=document.getElementById('status');
    
    var status = document.getElementsByClassName('status');
    var container= document.getElementsByClassName('status_container');
    var btnordered=" <a href='{{url('admin/warehouse/create/.$car->orderid')}}' class='btn btn-success car-add'>Nhận Đơn</a>";
                                //thay link vao2 day
    var btncustcanceled=" <a href='{{url('admin/warehouse/create/.$car->orderid')}}' class='btn btn-danger car-add'>Hủy Đơn Hàng</a>";
    var btndeposited=" <a href='{{url('admin/warehouse/create/.$car->orderid')}}' class='btn btn-danger car-add'>Xác Nhận Đợn Hàng</a>";
    var btndetail=" <a href='{{url('admin/warehouse/create/.$car->orderid')}}' class='btn btn-primary car-add'> <i class='fa-solid fa-circle-info'></i></a>";
   
    for(let i=0;i<status.length;i++){
    if (status[i].innerHTML==='ordered'){
    container[i].innerHTML= container[i].innerHTML+btnordered;
         }
         else if(status[i].innerHTML==='custcanceled'){
        container[i].innerHTML= container[i].innerHTML+btncustcanceled;
         }
         else if(status[i].innerHTML==='deposited'){
        container[i].innerHTML= container[i].innerHTML+btndeposited;
         }
         else {
        container[i].innerHTML= container[i].innerHTML+btndetail;
         }
}

});



</script>

@endsection