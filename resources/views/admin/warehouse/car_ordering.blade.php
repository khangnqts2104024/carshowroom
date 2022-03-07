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
                    <br>
                  
                    <input id="massage" type="text" hidden value="{{Session::get('a')}}">
                
                    
                   
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
                                <th>Mã Đơn Hàng</th>
                                <th>Model Xe</th>
                                <th>Màu Xe</th>
                                <th>Showroom</th>
                                <th>Tình Trạng Đơn Hàng</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $x=1 @endphp
                            @foreach ($orders as $p)

                            <tr>

                                <td>{{ $x++ }}</td>
                                <td> {{$p->orders->order_code}}</td>
                                <td>{{$p->modelInfos->model_name}} </td>
                                <td>{{$p->modelInfos->color}} </td>
                                <td>{{$p->orders->showrooms->showroom_name}} </td>
                                <td class="flex-container-column">
                                    <p class="status">{{$p->order_status}}</p>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success car-add" data-toggle="modal" data-target="#modelId{{$x}}">
                                        Xuất Kho
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId{{$x}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Thông Tin Xe</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- body -->
                                                    <form action="{{url('admin/warehouse/ordering/create')}}" method="post">
                                                    @csrf
                                                        <div class="form-group">
                                                            <label for="car_model">Model Xe:</label>
                                                   
                                                            <input id="car_model" class="form-control" type="text" name="car_model" value="{{$p->model_id}}" hidden>
                                                            <p>{{$p->modelInfos->model_name}}</p>
                                                        </div>
                                                        

                                                        <div class="form-group">
                                                            <label for="car_branch">Showroom:</label>
                                                            <!-- car_branch
                                                   car_status
                                                    -->
                                                            <input id="car_branch" class="form-control" type="text" name="car_branch" value="{{$p->orders->showroom}}" hidden>
                                                            <p>{{$p->orders->showrooms->showroom_name}}
                                                            <p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="order_id">Mã Đăt Hàng:</label>
                                                            <!-- car_branch
                                                   car_status
                                                   order_id -->
                                                            <input id="order_id" class="form-control" type="text" name="order_id" value="{{$p->order_id}}" hidden>
                                                            <p>{{$p->orders->order_code}}
                                                            <p>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            <button type="submit" class="btn btn-primary">Xuất Kho</button>
                                                        </div>
                                                    </form>





                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            <!-- end test -->

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Model Xe</th>
                                <th>Màu Xe</th>
                                <th>Showroom</th>
                                <th>Tình Trạng Đơn Hàng</th>
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
    var massage=document.getElementById('massage');
    if(document.getElementById('massage').value!=''){alert(massage.value);}

    $(document).ready(function() {
        $('#myTable').DataTable();
        
    });

    
</script>
@endsection