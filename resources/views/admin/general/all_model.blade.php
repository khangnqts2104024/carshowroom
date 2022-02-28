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
    <div class="table-agile-info flex-container">
        <header class="panel-heading">
            Cập nhật dòng xe
            <link rel="stylesheet" href="/css/account.css">
        </header>
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục xe
            </div>
            <!-- <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div> -->
            <?php
            $message = session('message');
            if ($message) {
                echo $message;
                session(['message' => '']);
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light mydatatable">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên dòng xe</th>
                            <th>Mã dòng xe</th>
                            <th>Ngày thêm</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td></td>
                            <td><span class="text-ellipsis"></span></td>
                            <td><span class="text-ellipsis">#</span></td>
                            <td>
                                <a href="" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a onclick="return confirm('Bạn có muốn xóa?')" href="" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
@endsection