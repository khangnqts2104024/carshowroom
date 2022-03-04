@extends('layouts_admin.layoutadmin')
@section('title', 'product index')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="vin-title">VINFAST</h1>
            </div>





        </div>
    </div><!-- /.container-fluid -->
</section>

<section class='content'>
    <div class="contaier-fluid">
<div class="flex-container">
        <h4 class="">Thông Tin Chi Tiết Đơn Hàng</h4>
        </div>

        <form role="form" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="txt-id">Mã Đơn Hàng</label>
                    <input type="text" class="form-control" id="txt-id" name="id" placeholder="1" value=" {{$p->orders->order_code}}" readonly>
                </div>
                <div class="form-group">
                    <label for="txt-id">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="txt-id" name="id" placeholder="1" value="{{$p->orders->customer->fullname}}" readonly>
                </div>
                <div class="form-group">
                    <label for="txt-id">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="txt-id" name="id" placeholder="1" value="{{$p->orders->customer->phone_number}}" readonly>
                </div>
                <div class="form-group">
                    <label for="txt-id">Email</label>
                    <input type="text" class="form-control" id="txt-id" name="id" placeholder="1" value="{{$p->orders->customer->email}}" readonly>
                </div>

                <div class="form-group">
                    <label for="txt-price">Địa Chỉ</label>
                    <input type="text" class="form-control" id="txt-price" name="price" placeholder="1" value="{{ $p->orders->customer->address }} " readonly>
                </div>
                <div class="form-group">
                    <label for="txt-price">Dòng Xe</label>
                    <input type="text" class="form-control" id="txt-price" name="price" placeholder="1" value="{{$p->modelInfos->model_name}}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="txt-price">Nhân Viên Nhận Đơn</label>
                    <input type="text" class="form-control" id="txt-price" name="price" placeholder="1" value="{{ $p->emp_received}}" readonly>
                </div>
       
                <div class="form-group">
                    <label for="txt-price">Trạng Thái Đơn Hàng</label>
                    <input type="text" class="form-control" id="txt-price" name="price" placeholder="1" value="{{$p->order_status}}" readonly>
                </div>

             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{url ('admin/showroom') }}"><button type="button" class="btn btn-primary">Quay Lại</button></a>
            </div>
        </form>

    </div>
</section>

@endsection
@section('script-section')



@endsection