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

    <div class="flex-container">

        <!-- /.card-header -->
        <div class="flex-card">
            <a href="{{url('admin/general/report')}}">
                <div class="manage-option">
                <i class="fa-solid fa-chart-area"></i>
                    <p>Báo Cáo</p>
                </div>
            </a>
        </div>

        <div class="flex-card">
            <a href="{{url('admin/general/employee')}}">
                <div class="manage-option">
                <i class="fa-solid fa-user-pen"></i>
                    <p>Quản Lý Nhân Viên</p>
                </div>
            </a>
        </div>
        <div class="flex-card">
            <a href="{{('general/customer')}}">
                <div class="manage-option">
                <i class="fa-solid fa-user-check"></i>
                    <p>Quản Lý Khách Hàng</p>
                </div>
            </a>
        </div>
        <div class="flex-card">
            <a href="{{ url('admin/general/allmodel') }}">
                <div class="manage-option">
                <i class="fa-solid fa-car"></i>
                    <p>Quản Lý Model</p>
                </div>
            </a>
        </div>
        <!-- /.card-body -->

        <!-- /.card -->

        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
@section('script-section')
<script>

</script>
@endsection
<!-- dddd kkkjuj-->