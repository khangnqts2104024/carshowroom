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
                    <table id="product" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Model Xe</th>
                                <th>Kho</th>
                                <th>Số Lượng Tồn Kho</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>1</td>
                                <td>Fadil 22</td>
                                <td>Miền Bắc</td>
                                <td> <span>44</span>
                                    <button class="btn btn-info btn-sm stock-add">
                                        Đăt Thêm Xe <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class='stock-confirm' style="display:none;">
                                        <input type="number" name="" id="" min="0" max="20">
                                        <a class="add" href="" style="margin:30px">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Model Xe</th>
                                <th>Kho</th>
                                <th>Số Lượng Tồn Kho</th>
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
    ]
    <!-- /.row -->
</section>
@endsection
@section('script-section')
<script>
    var add = document.getElementsByClassName('stock-add');
    var confirm = document.getElementsByClassName('stock-confirm');
    for (let i = 0; i < add.length; i++) {
        add[i].addEventListener("click", function() {
            if (confirm[i].style.display == "none") {
                confirm[i].style.display = "block";

            } else {
                confirm[i].style.display = "none";
            }
        })
    }
</script>
@endsection
