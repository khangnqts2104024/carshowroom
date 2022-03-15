<!-- Lưu tại resources/views/product/index.blade.php -->
@extends('layouts_admin.layoutadmin')
@section('title', 'Admin Home')
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
            <a href="{{url('admin/profile/myprofile')}}">
                <div class="manage-option">
                    <i class="fa-solid fa-user"></i>
                    <p>Hồ Sơ</p>
                </div>
            </a>
        </div>

        @if (Auth::guard('employee')->user()->role=='admin')
     
        <div class="flex-card">
            <a href="{{url('admin/general')}}">
                <div class="manage-option">
                    <i class="fa-solid fa-list-check"></i>
                    <p>Quản Lý Thông Tin</p>
                </div>
            </a>
        </div>
        @endif
        @if (Auth::guard('employee')->user()->role=='admin'|| Auth::guard('employee')->user()->role=='dealer' )
     
        <div class="flex-card">
            <a href="{{('showroom')}}">
                <div class="manage-option">
                    <i class="fa-solid fa-car"></i>
                    <p>Showroom</p>
                </div>
            </a>
        </div>
        @endif
        @if (Auth::guard('employee')->user()->role=='admin'|| Auth::guard('employee')->user()->role=='warehouse' )
     
        <div class="flex-card">
            <a href="{{url('admin/warehouse')}}">
                <div class="manage-option">
                    <i class="fa-solid fa-warehouse"></i>
                    <p>Kho</p>
                </div>
            </a>
        </div>
        @endif
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