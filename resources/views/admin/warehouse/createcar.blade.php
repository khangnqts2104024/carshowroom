<!-- Lưu tại resources/views/product/index.blade.php -->
@extends('layouts_admin.layoutadmin')
@section('title', 'Car Export')
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
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Đơn Xuất Xe</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- {{ url('product/postCreate') }} -->
                        <form role="form" action="#" method="get" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                             
                                <div class="form-group">
                                    <label for="txt-price">Mã Đặt Hàng</label>
                                    <input type="text" class="form-control" id="txt-order" name="showroom" value="orderID" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Model Xe</label>
                                    <input type="text" class="form-control" id="txt-model" name="Model" value=" MOdel ID"readonly >
                                </div>
                                <div class="form-group">
                                    <label for="txt-price">Showroom Đến</label>
                                    <input type="text" class="form-control" id="txt-showroom" name="showroom" value="showroom" readonly>
                                </div>
                                 <div class="form-group">
                                    <label>Phụ Kiện</label>
                                    <textarea class="form-control" rows="3" name="option"  readonly>option dùng innerHTML</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="txt-price">Ngày Xuất</label>
                                    <input type="text" class="form-control" id="date" name="date" readonly>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <label>Ghi Chú</label>
                                    <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id='submit' >Xuất Kho</button>
                                <a href="{{url('admin/warehouse')}}"class="btn btn-warning" id=''>Quay Lại</a>
                            </div>
                           
                        </form>
                    
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
     
   
    var today= new Date();
        var date=today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();

     
        document.getElementById("date").value=date;});
        document.getElementById("submit").addEventListener("click",function(){
            confirm("Bạn đã chắc chắn xuất kho xe này?");
        });
    </script>
@endsection
