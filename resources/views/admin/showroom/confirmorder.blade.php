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
                    <h3 class="card-title">Xác Minh Thông Tin Đơn Hàng</h3>
                </div>

                <div>

                    <form action="admin/showroom/checkinfo" method="post">

                    @csrf
                        <h5 class="header-confirminfo">Đơn Hàng:</h5>
                        <div class="form-group">
                            <label for="order_code">Mã Đơn Hàng</label>
                            <input id="order_code" class="form-control" type="text" name="order_code" value="{{$p->orders->order_code}}" readonly>
                        </div>
                        <hr>
                        <hr>
                        <h5 class="header-confirminfo">Thông Tin Dòng Xe:</h5>
                        <div class="form-group">
                            <label for="model-old">Dòng Xe Khách Chọn</label>
                            <p id="model_old" class="form-control" type="text" data-value="{{$p->modelInfos->model_id}}">{{$p->modelInfos->model_name}}-{{$p->modelInfos->color}}</p>
                        </div>

                        <div class="form-group">
                            <label for="model">Dòng Xe Xác Nhận:</label>
                            <select class="form-control" name="model" id="model">
                                @foreach($models as $model)
                                <option value="{{$model->model_id}}">{{$model->model_name}}-{{$model->color}}</option>
                                @endforeach
                            </select>
                            <p id="model_error" style="color:red"></p>
                        </div>
                        <div class="form-group">
                            <label for="modelnote">Ghi Chú Dòng Xe</label>
                            <input id="modelnote" class="form-control" type="text" name="modelnote" value="">
                        </div>
                        <hr>
                        <hr>
                        <h5 class="header-confirminfo">Thông Tin Khách Hàng:</h5>
                        <div class="form-group">
                            <label for="name">Tên Khách Hàng</label>
                            <input id="name" class="form-control" type="text" name="customer_name" value="{{$p->orders->customer->fullname}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="CCCD">CCCD</label>
                            <input id="CCCD" class="form-control" type="text" name="customer_citizen_id" value="{{$p->orders->customer->citizen_id}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại Khách Hàng</label>
                            <input id="phone" class="form-control" type="text" name="customer_phone" value="{{$p->orders->customer->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="role">Phân loại khách hàng</label>
                            <input class="form-control" type="text" id="role" name="customer_role" value="{{$p->orders->customer->customer_role}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email khách hàng</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{$p->orders->customer->email}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ khách hàng</label>
                            <input class="form-control" type="text" id="address" name="address" value="{{$p->orders->customer->address}}">
                        </div>
                        <hr>
                        <hr>
                        <h5 class="header-confirminfo">Thông Tin Đơn Hàng:</h5>
                        <div class="form-group">
                            <label for="provines">Tỉnh Thành Làm Giấy Tờ</label>

                            <select class="form-control" name="provines" id="provines">
                                @foreach ($provines as $provine)
                                <option value="{{$provine->matp}}" class="provine">{{$provine->name}} {{$provine->cost_estimates}}</option>
                                @endforeach
                            </select>


                        </div>

                        <div class="form-group">
                            <label for="address">Giá đơn Hàng cũ</label>
                            <input class="form-control" type="text" id="" name="" value="{{$p->order_price}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="orderprice">Giá đơn Hàng Được Tính Lại:</label>
                            <div>
                                <span>Giá model:</span>
                                <p type="text" id="carprice">{{$p->modelInfos->price}}</p>
                                <span>Giảm giá:</span>
                                <p id="discount"></p>
                                <span>Phí Kiểm Ngiệm:</span>
                                <p id="Inspectionfee"></p>
                                <span>Phí Trước Bạ:</span>
                                <p id="Licenseplatefee"></p>
                                <span>Phí Đường Bộ:</span>
                                <p id="Roadusagefee"></p>
                                <span>Bão Hiểm Xe:</span>
                                <p id="insurance"></p>

                            </div>

                            <input class="form-control" type="text" id="totalprice" name="orderprice" value="" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Xác Nhận Đơn</button>

                    </form>


                    <a name="" id="" class="btn btn-danger" href="#" role="button">Hủy Đơn Hàng</a>

                </div>
           



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
    //emai-role
    var email = document.getElementById('email');
    var role = document.getElementById('role');
    //-models
    var model_old = document.getElementById('model_old');
    var model = document.getElementById('model');
    var model_error = document.getElementById('model_error');
    var modelnote = document.getElementById('modelnote');
    var provine = document.getElementById("provines");
    var cost = <?php echo $cost ?>;
    var modellist = <?php echo $models ?>;
    console.log(cost);
    var model_price;
    var member_discount;
    var carprice = document.getElementById('carprice');
    var Inspectionfee = document.getElementById('Inspectionfee');
    var Licenseplatefee = document.getElementById('Licenseplatefee');
    var Roadusagefee = document.getElementById('Roadusagefee');
    var Civilliabilityinsurance = document.getElementById('insurance');
    var discount = document.getElementById('discount');
    var totalprice = document.getElementById('totalprice')
    //set default
    model.value = model_old.getAttribute("data-value");
    model_error.innerHTML = "";
    //báo nv  note model
    model.addEventListener('change', function price() {
        for (let i = 0; i < modellist.length; i++) {
            //lấy price model xe
            if (modellist[i].model_id == model.value) {
                model_price = modellist[i].price
            }
            carprice.innerHTML = model_price;
            if (role.value == 'guest') {
                member_discount = model_price * 0.05;
            } else {
                member_discount = 0
            }
            discount.innerHTML = parseInt(member_discount);
        }

        if (model.value != model_old.getAttribute("data-value") && modelnote.value == "") {
            model_error.innerHTML = "Bạn đã đổi model của khách hãy ghi chú lý do vào!"
        } else {
            model_error.innerHTML = "";
        }


    })

    //khóa lại email của member fe
    if (role.value == 'guest') {
        email.readOnly = false
    }
    // check thay dôi tỉnh
    provine.addEventListener('change', function() {
        // alert(provine.value);
        for (let i = 0; i < cost.length; i++) {

            if (cost[i].matp == provine.value) {
                Inspectionfee.innerHTML = cost[i].Inspectionfee;
                Licenseplatefee.innerHTML = cost[i].Licenseplatefee;
                Roadusagefee.innerHTML = cost[i].Roadusagefee;
                Civilliabilityinsurance.innerHTML = cost[i].Civilliabilityinsurance;

            }

        }
        var total = (parseInt(carprice.innerHTML) - parseInt(discount.innerHTML) + parseInt(Inspectionfee.innerHTML) +
            parseInt(Licenseplatefee.innerHTML) + parseInt(Roadusagefee.innerHTML) + parseInt(Civilliabilityinsurance.innerHTML));
        totalprice.value = total;
    })
</script>
@endsection