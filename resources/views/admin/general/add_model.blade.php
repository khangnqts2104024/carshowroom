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
                            Thêm dòng xe
                            <link rel="stylesheet" href="/css/account.css">
                        </header>
                        <div class="panel-body flex-container">
                            <?php
                                $message = session('message');
                                if ($message) {
                                    echo $message;
                                    session(['message' => '']);
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-model')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mã dòng xe</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="model_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên dòng xe</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="model_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kích thước</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="kich_thuoc">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Khối lượng</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="khoi_luong">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Loại động cơ</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="loai_dong_co">
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
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="dan_dong">
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
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="den_chieu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chỗ ngồi</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="cho_ngoi">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Màn hình</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="man_hinh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Điều chỉnh vô lăng</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="dieu_chinh_vo_lang">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hệ thống giải trí</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="he_thong_giai_tri">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phanh trước</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="phanh_truoc">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phanh sau</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="phanh_sau">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Thêm ảnh</label>
                                        <input type="file" id="exampleInputFile" name="image">
                                    </div>
                                    <div class="checkbox">
                                    </div>
                                    <button type="submit" name="add_model" class="btn btn-info">Thêm dòng xe</button>
                                </form>
                     
                    </section>

            </div>
@endsection