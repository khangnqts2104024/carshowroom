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
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Model</th>
                                <th>Showroom</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày xuất</th>
                                <th>Tình Trạng</th>
                            </tr>
                        </thead>
                        <tbody>

                          
                            <!-- test -->
                            

                                @php $x=1 @endphp
                                @foreach ($cars as $p)
                                <tr>
                                    <td>{{ $x++ }}</td>                                  
                                    <td> {{$p->models->model_name}}</td>
                                    <td>{{ $p->showrooms->showroom_name}}</td>
                                    <td>{{ $p->orders->order_code}} </td>
                                    <td>{{ $p->manufactoring_date}}</td>
                                    <td class="flex-container-column "> <p class="status">{{$p->car_status}} </p>
                                <p>
                                    <button class="btn btn-primary car-add" type="button" data-toggle="collapse" data-target="#contentId{{$x}}" aria-expanded="false"
                                            aria-controls="contentId">
                                        Đã Đến Showroom
                            
                                    </button>
                                </p>
                                <div class="collapse" id="contentId{{$x}}">
                                <a href="{{url('admin/warehouse/carpending/'.$p->car_id)}}" class="btn btn-success car-add " >Xác Nhận</a>
                              
                                </div>
                               </td>
                                    </td>
                                   
                                </tr>
                                    <!-- test -->
                              
                                @endforeach
                            
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
    <input id="message" type="text"  hidden value="{{Session::get('message')}}">
    <!-- /.row -->
</section>
@endsection
@section('script-section')
<script>
 var message=document.getElementById('message');
    if(document.getElementById('message').value!=''){alert(message.value);}


    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    var add = document.getElementsByClassName('stock-add');
    var confirm = document.getElementsByClassName('stock-confirm');
    for (let i = 0; i < add.length; i++) {
        add[i].addEventListener("click", function() {
            if (confirm[i].style.display == "none") {
                confirm[i].style.display = "block";

            } else {
                confirm[i].style.display = "none";
            }
        })
    }
</script>
@endsection