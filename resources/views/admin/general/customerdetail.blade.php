@extends('layouts_admin.layoutadmin')
@section('title', 'Customer Detail Page')
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
        <h4 class="">Thông Tin Chi Tiết Khách Hàng</h4>
        </div>

       
            <div class="card-body">
                <div class="form-group">
                    <label for="txt-id">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="txt-id" name="id" placeholder="1" value="{{ $p->fullname }}" readonly>
                </div>
                <div class="form-group">
                    <label for="txt-id">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="txt-id" name="id" placeholder="1" value="{{ $p->phone_number}}" readonly>
                </div>
                <div class="form-group">
                    <label for="txt-id">Email</label>
                    <input type="text" class="form-control" id="txt-id" name="id" placeholder="1" value="{{ $p->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="txt-price">Địa Chỉ</label>
                    <input type="text" class="form-control" id="txt-price" name="price" placeholder="1" value="{{ $p->address }} " readonly>
                </div>
                <div class="form-group">
                    <label for="txt-price">CCCD</label>
                    <input type="text" class="form-control" id="txt-price" name="price" placeholder="1" value="{{ $p->citizen_id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="txt-price">Phân Loại Khách Hàng</label>
                    <input type="text" class="form-control" id="txt-price" name="price" placeholder="1" value="{{ $p->customer_role}}" readonly>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{url ('admin/general/customer') }}"><button type="button" class="btn btn-primary">Quay Lại</button></a>
            </div>
   

    </div>
</section>

@endsection
@section('script-section')



@endsection