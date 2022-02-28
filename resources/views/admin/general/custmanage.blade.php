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
                                <th>Tên Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Email</th>
                                <th>Thông Tin Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>




                            <!-- test -->

                            <tr> @php $x=1 @endphp
                                @foreach ($customer as $p)
                                <td>{{ $x++ }}</td>                               
                                <td> {{$p->fullname}}</td>
                                <td>{{ $p->phone_number }}</td>
                                <td>{{ $p->email}} </td>
                                
                                <td class="flex-container">
                                <a href="{{ url('admin/general/customer/edit/'.$p->customer_id) }}">  <button type="button" class="btn btn-primary" >
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button></a>
                                                
                       
                                 
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