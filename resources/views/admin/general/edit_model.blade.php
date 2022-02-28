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
<section class="content">
    <header class="panel-heading">
        Cập nhật dòng xe
        <link rel="stylesheet" href="/css/account.css">
    </header>
    <div class="panel-body flex-container">

        @foreach($edit_model as $key => $edit_value)
        <div class="position-center">
            <form role="form" action="{{URL::to('/update-model/'.$edit_value->model_id)}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã dòng xe</label>
                    <input type="text" value="{{$edit_value->model_id}}" class="form-control" id="exampleInputEmail1" name="model_id">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên dòng xe</label>
                    <input type="text" value="{{$edit_value->model_name}}" class="form-control" id="exampleInputPassword1" name="model_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kích thước</label>
                    <input type="text" value="{{$edit_value->kich_thuoc}}" class="form-control" id="exampleInputPassword1" name="kich_thuoc">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Khối lượng</label>
                    <input type="text" value="{{$edit_value->khoi_luong}}" class="form-control" id="exampleInputPassword1" name="khoi_luong">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Loại động cơ</label>
                    <input type="text" value="{{$edit_value->loai_dong_co}}" class="form-control" id="exampleInputPassword1" name="loai_dong_co">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tự động tắt động cơ</label>
                    <select name="tu_dong_tat_dong_co" class="form-control input-sm m-bot15">
                        <option value="0">Có</option>
                        <option value="1">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Dẫn động</label>
                    <input type="text" value="{{$edit_value->dan_dong}}" class="form-control" id="exampleInputPassword1" name="dan_dong">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ống xả đôi</label>
                    <select name="ong_xa_doi" class="form-control input-sm m-bot15">
                        <option value="0">Có</option>
                        <option value="1">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Đèn chiếu</label>
                    <input type="text" value="{{$edit_value->den_chieu}}" class="form-control" id="exampleInputPassword1" name="den_chieu">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chỗ ngồi</label>
                    <input type="text" value="{{$edit_value->cho_ngoi}}" class="form-control" id="exampleInputPassword1" name="cho_ngoi">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Màn hình</label>
                    <input type="text" value="{{$edit_value->man_hinh}}" class="form-control" id="exampleInputPassword1" name="man_hinh">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Điều chỉnh vô lăng</label>
                    <input type="text" value="{{$edit_value->dieu_chinh_vo_lang}}" class="form-control" id="exampleInputPassword1" name="dieu_chinh_vo_lang">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Hệ thống giải trí</label>
                    <input type="text" value="{{$edit_value->he_thong_giai_tri}}" class="form-control" id="exampleInputPassword1" name="he_thong_giai_tri">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phanh trước</label>
                    <input type="text" value="{{$edit_value->phanh_truoc}}" class="form-control" id="exampleInputPassword1" name="phanh_truoc">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phanh sau</label>
                    <input type="text" value="{{$edit_value->phanh_sau}}" class="form-control" id="exampleInputPassword1" name="phanh_sau">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" name="edit_model" class="btn btn-info">Cập nhật dòng xe</button>
            </form>
        </div>
        @endforeach

</section>


@endsection