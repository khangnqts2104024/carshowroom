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
                    <h3 class="card-title">Quản Lý Hàng Tồn Kho</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Model Xe</th>
                                <th>Kho</th>
                                <th>Số Lượng Tồn Kho</th>
                                <th>Nhập Thêm Xe</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $x=1 @endphp
                            @foreach ($stocks as $p)
                            <tr class="color" data-quantity="{{$p->quantity}}">
                                <td>{{ $x++ }}</td>
                                <td> {{$p->model->model_name}}</td>
                                <td>{{ $p->warehouse->warehouse_name}}</td>
                                <td >{{$p->quantity}}</td>
                                <td class="flex-container-left">
                                    <p></p>
                                    <p>
                                        <a class="btn btn-info  stock-add" data-toggle="collapse" href="#contentId{{$x}}" aria-expanded="false" aria-controls="contentId">
                                            Đăt Thêm Xe <i class="fa-solid fa-plus"></i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="contentId{{$x}}">

                                        <div class='stock-confirm'>
                                            <p>Nhập số lượng xe cần nhập thêm:</p>
                                            <form action="{{url('admin/warehouse/stockadd/'.$p->id)}}" method="get">
                                             <input type="number" name="stock" size="10" id="" min="0" max="2000" value="">
                                            <button class="add btn btn-primary " href="" style="margin:30px" type="submit">   <i class="fa-solid fa-circle-check"></i></button>
                                            </form>
                                          
                                        </div>

                                    </div>



                                </td>
                            </tr>
                            <!-- test -->

                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Model Xe</th>
                                <th>Kho</th>
                                <th>Số Lượng Tồn Kho</th>
                                <th>Nhập Thêm Xe</th>
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
    var color = document.getElementsByClassName('color');
  
    
    for(let i=0;i<color.length;i++){
        if(color[i].getAttribute('data-quantity')<=5){
            color[i].style.background="rgb(243, 84, 84)";
            color[i].style.color="white";
        }
        else if(color[i].getAttribute('data-quantity')<=20){
            color[i].style.background="#ffc107";
            }
        
            
    }
    
    $(document).ready(function() {
        $('#myTable').DataTable();
    
    
    });
    

    var confirm = document.getElementsByClassName('stock-confirm');
    // for (let i = 0; i < add.length; i++) {
    //     add[i].addEventListener("click", function() {
    //         if (confirm[i].style.display == "none") {
    //             confirm[i].style.display = "block";

    //         } else {
    //             confirm[i].style.display = "none";
    //         }
    //     })
    // }
</script>
@endsection