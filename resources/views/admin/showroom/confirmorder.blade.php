<!-- Lưu tại resources/views/product/index.blade.php -->
@extends('layouts_admin.layoutadmin')
@section('title', 'Confirm Order')
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
        <div class="position-center phat">
            <div class="card-header ">
                <h3 class="card-title">Xác Minh Thông Tin Đơn Hàng</h3>
            </div>

            <div>

                <form action="{{url('admin/showroom/checkinfo')}}" method="post">

                    @csrf
                    <h5 class="header-confirminfo">Đơn Hàng:</h5>
                  
                        <input id="" class="form-control" type="text" name="orderdetail_id" value="{{$p->id}}" hidden>
                    
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
                 
                    <hr>
                    <hr>
                    <h5 class="header-confirminfo">Thông Tin Khách Hàng:</h5>
                    <div class="form-group">
                        <label for="name">Tên Khách Hàng <span class="text-danger">*</span></label>
                        <input id="name" class="form-control" type="text" name="fullname" value="{{$p->orders->customer->fullname}}" readonly>
                        <span class="text-danger">@error('fullname'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="CCCD">CCCD <span class="text-danger">*</span></label>
                        <input id="CCCD" class="form-control" type="text" name="citizen_id" value="{{$p->orders->customer->citizen_id}}">
                        <span class="text-danger">@error('citizen_id'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số Điện Thoại Khách Hàng  <span class="text-danger">*</span></label>
                        <input id="phone" class="form-control" type="text" name="phone_number" value="{{$p->orders->customer->phone_number}}">
                        <span class="text-danger">@error('phone_number'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="role">Phân loại khách hàng</label>
                        <input class="form-control" type="text" id="role" name="customer_role" value="{{$p->orders->customer->customer_role}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email khách hàng <span class="text-danger">*</span> <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="email" name="email" value="{{$p->orders->customer->email}}" readonly>
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ khách hàng <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="address" name="address" value="{{$p->orders->customer->address}}">
                        <span class="text-danger">@error('address'){{$message}} @enderror</span>
                    </div>
                    <hr>
                    <hr>
                    <h5 class="header-confirminfo">Thông Tin Đơn Hàng:</h5>
                    <div class="form-group">
                        <label for="old_provine">Tỉnh Thành Đã Đăng Ký</label>
                        <input class="form-control" type="text" id="old_provine" name="" value="{{$oldprovine}}" readonly>

                    </div>
                    <div class="form-group">
                        <label for="provines">Tỉnh Thành Làm Giấy Tờ Xác Nhận<span class="text-danger">*</span></label>
                        <br>
                        <span class="text-danger">Hãy Xác Nhận Tỉnh Thành Làm Giấy Tờ Để Xác Nhận Lại Giá Với Khách**</span>

                        <select class="form-control" name="provines" id="provines" required>
                            @foreach ($provines as $provine)
                            <option value="{{$provine->matp}}" class="provine">{{$provine->name}} </option>
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
                            <p>Giá model:</p>
                            <span type="text" id="carprice">{{$p->modelInfos->price}}</span><span> VND</span>
                            <p>Giảm giá:</p>
                            <span id="discount"></span><span> VND</span>
                            <p>Phí Kiểm Ngiệm:</p>
                            <span id="Inspectionfee"></span><span> VND</span>
                            <p>Phí Trước Bạ:</p>
                            <span id="Licenseplatefee"></span><span> VND</span>
                            <p>Phí Đường Bộ:</p>
                            <span id="Roadusagefee"></span><span> VND</span>
                            <p>Bão Hiểm Xe:</p>
                            <span id="insurance"></span><span> VND</span>

                        </div>
                        <p>Tổng Cộng:</p>
                        <input class="text-danger" id="totalprice" name="orderprice" value="" readonly><span> VND</span>
                        <span class="text-danger">@error('orderprice'){{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="modelnote">Ghi Chú:</label>
                        <input id="modelnote" class="form-control" type="text" name="modelnote" value="">
                        <span class="text-danger">@error('modelnote'){{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Xác Nhận Đơn</button>

                </form>




            </div>

            <hr>
            <hr>
            <div>
                <p>
                    <a class="btn btn-danger" data-toggle="collapse" href="#contentId" aria-expanded="false" aria-controls="contentId">
                        Hủy Đơn Hàng
                    </a>
                </p>
                <div class="collapse" id="contentId">
                    <a name="" id="" class="btn btn-success" href="{{url('admin/showroom/empcancel/'.$p->id)}}" role="button">Xác Nhận Hủy Đơn</a>
                </div>
            </div>

        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

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
    if (role.value == 'member') {
        member_discount = parseInt(carprice.innerHTML) * 0.1;
        discount.innerHTML = parseInt(member_discount);
    } else {
        member_discount = 0;
        discount.innerHTML = parseInt(member_discount);
    };
    provine.value=0;
    //báo nv  note model
    model.addEventListener('change', function price() {
        provine.value=0;
        for (let i = 0; i < modellist.length; i++) {
            //lấy price model xe
            if (modellist[i].model_id == model.value) {
                model_price = modellist[i].price;
            }
            carprice.innerHTML = model_price;
            if (role.value == 'member') {
                member_discount = model_price * 0.1;
            } else {
                member_discount = 0;
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
        totalprice.innerHTML = total;
        totalprice.value = total;
      
    })
</script>
@endsection