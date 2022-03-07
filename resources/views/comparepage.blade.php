@extends('layouts.layout')
@section('content')



<div class="comparison-header table-responsive horizontal dragscroll" style="width: 1077px;">
    <table class="table table-compare">
        <tbody>
            <tr>
                <th scope="col"></th>


                <td scope="col" class="btn" data-picker="0" onclick="picker(this)">
                    <div class="info-car d-none">
                        <a class="checkbox" href="" data-index="0">
                            <i class="fa fa-2x fa-check-square text-primary"></i>
                        </a>
                        <img src="/on/demandware.static/-/Sites/default/dwa3a03715/images/comparison/fadill.png" alt="" data-field="color">
                        <div class="pt-2 font-weight-bold">
                            <p class="d-lg-block d-none text-nowrap mb-2" data-field="label"></p>
                            <p class="d-block d-lg-none break-line" data-field="label"></p>
                        </div>
                        <small class="text-muted">
                            Từ
                            <span data-field="price">499.000.000&nbsp;₫</span>
                        </small>

                        <hr class="mb-2">

                    </div>
                    <a class="vehicle-picker " href="" data-index="0" data-toggle="modal" data-target="#modelId">
                        <i class="fa fa-lg fa-plus"></i>
                        <p class="text-center">Lựa chọn xe</p>
                    </a>
                </td>




                <td scope="col"  class="btn" data-picker="1" onclick="picker(this)">
                    <!-- {{-- class  d-none  để tắt lựa chọn --}} -->
                    <div class="info-car d-none ">
                        <a class="checkbox " href="" data-index="1">
                            <i class="fa fa-2x fa-check-square text-primary"> </i>
                        </a>
                        <img src="/on/demandware.static/-/Sites/default/dwc910b6c2/images/comparison/lux-a.png" alt="" data-field="color">
                        <div class="pt-2 font-weight-bold">
                            <p class="d-lg-block d-none text-nowrap mb-2" data-field="label">LUX A2.0 - Cao cấp
                            </p>
                            <p class="d-block d-lg-none break-line" data-field="label">LUX A2.0
                                Cao cấp</p>
                        </div>

                        <hr class="mb-2">

                    </div>
                    <a class="vehicle-picker " href="" data-index="1" data-toggle="modal" data-target="#modelId">
                        <i class="fa fa-lg fa-plus"></i>
                        <p class="text-center">Lựa chọn xe</p>
                    </a>
                </td>
       
                <td scope="col" class="btn" data-picker="2" onclick="picker(this)">
                    <div class="d-none info-car">
                        <a class="checkbox" href="" data-index="2">
                            <i class="fa fa-2x fa-check-square text-primary"></i>
                        </a>
                        <img src="." alt="" data-field="color">
                        <div class="pt-2 font-weight-bold">
                            <p class="d-lg-block d-none text-nowrap mb-2" data-field="label"></p>
                            <p class="d-block d-lg-none break-line" data-field="label"></p>
                        </div>
                        <small class="text-muted">
                            Từ
                            <span data-field="price"></span>
                        </small>
                        <hr class="mb-2">
                        <div class="external-links">
                            <a href="/vn_vi/chi-phi-lan-banh" target="_blank" rel="noopener" data-field="estimate">Chi phí lăn bánh</a>
                            <a href="/vn_vi/dang-ky-lai-thu.html" target="_blank" rel="noopener">Đăng ký lái
                                thử</a>
                        </div>
                    </div>

                    <a class="vehicle-picker" href="" data-index="2" data-toggle="modal" data-target="#modelId">
                        <i class="fa fa-lg fa-plus"></i>
                        <p class="text-center">Lựa chọn xe</p>
                    </a>

                </td>

            </tr>
        </tbody>
    </table>
</div>
<!-- ok -->



<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lựa Chọn Xe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" >
                            <a id="myLink" title=" FADIL -
                                Nâng Cao" href="" data-car="0" onclick="choosecar(this);return false;"> FADIL -
                                Nâng Cao</a>

                        </li>
                        <li class="list-group-item" >
                            <a id="myLink" title=" FADIL -
                                Nâng Cao" href="" data-car="1" onclick="choosecar(this);return false;"> FADIL -
                                TIEU CHuan</a>

                        </li>
                        <li class="list-group-item" >
                            <a id="myLink" title=" FADIL -
                                Nâng Cao" href="" data-car="2" onclick="choosecar(this);return false;"> FADIL -
                                Nâng Cao</a>

                        </li>
                        <li class="list-group-item" >
                            <a id="myLink" title=" FADIL -
                                Nâng Cao" href="" data-car="3" onclick="choosecar(this);return false;"> LUX A2 -
                                Nâng Cao</a>

                        </li>

                        </li>
                        <li class="list-group-item" >
                            <a id="myLink" title=" FADIL -
                                Nâng Cao" href="" data-car="4" onclick="choosecar(this);return false;"> LUX A -
                                S2.0 Nâng Cao</a>

                        </li>


                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>



<div class="container comparison-page ">

    <div class="comparison-header table-responsive horizontal dragscroll" style="width: 1077px;">
        <h1>So Sánh Xe</h1>
    </div>
    <div class="specs" style="margin-top: 0px;">





        <div id="dimension-container" class="accordion">
            <button class="btn btn-block" data-toggle="collapse" data-target="#dimension-collapse" aria-expanded="true">
                <h2 class="d-flex align-items-center justify-content-between pb-4">
                    Kích thước &amp; Khối lượng
                    <i class="fa fa-angle-up"></i>
                </h2>
            </button>
            <div id="dimension-collapse" class="collapse show table-responsive horizontal dragscroll" data-parent="#dimension-container">
                <table class="table table-bordered table-compare table-striped-columns">
                    <tbody class="break-line">
                        <tr>
                            <th>Dài x Rộng x Cao (mm)</th>
                            <td data-index="0" data-section="dimension" data-field="length">3.676 x 1.632 x 1.530
                            </td>
                            <td data-index="1" data-section="dimension" data-field="length">4.973 x 1.900 x 1.500
                            </td>
                            <td data-index="2" data-section="dimension" data-field="length"></td>
                        </tr>

                        <tr>
                            <th>Tự trọng/Tải trọng (Kg)</th>
                            <td data-index="0" data-section="dimension" data-field="kurbWeightPayload">993/386</td>
                            <td data-index="1" data-section="dimension" data-field="kurbWeightPayload">1.795/535
                            </td>
                            <td data-index="2" data-section="dimension" data-field="kurbWeightPayload"></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div id="powertrain-container" class="accordion">
            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#powertrain-collapse" aria-expanded="false">
                <h2 class="d-flex align-items-center justify-content-between pb-4">
                    Động cơ &amp; Vận hành
                    <i class="fa fa-angle-up"></i>
                </h2>
            </button>
            <div id="powertrain-collapse" class="table-responsive horizontal dragscroll collapse" data-parent="#powertrain-container" style="">
                <table class="table table-bordered table-compare table-striped-columns">
                    <tbody class="break-line">
                        <tr>
                            <th>Loại động cơ</th>
                            <td data-index="0" data-section="powertrain" data-field="engineType">Xăng 1.4L, động cơ
                                xăng, 4 xi lanh thẳng hàng</td>
                            <td data-index="1" data-section="powertrain" data-field="engineType">Xăng 2.0L, I-4,
                                DOHC,
                                tăng áp, van biến thiên, phun nhiên liệu trực tiếp</td>
                            <td data-index="2" data-section="powertrain" data-field="engineType"></td>
                        </tr>
                        <tr>
                            <th>Công suất tối đa của động cơ (Hp/rpm)</th>
                            <td data-index="0" data-section="powertrain" data-field="maxPower">98/6.200</td>
                            <td data-index="1" data-section="powertrain" data-field="maxPower">228/5.000-6.000</td>
                            <td data-index="2" data-section="powertrain" data-field="maxPower"></td>
                        </tr>

                        <tr>
                            <th>Chức năng tự động tắt động cơ tạm thời</th>
                            <td data-index="0" data-section="powertrain" data-field="autoStartStop"><i class="fa fa-times no"></i></td>
                            <td data-index="1" data-section="powertrain" data-field="autoStartStop"><i class="fa fa-check yes"></i></td>
                            <td data-index="2" data-section="powertrain" data-field="autoStartStop"></td>
                        </tr>
                        <tr>
                            <th>Hộp số</th>
                            <td data-index="0" data-section="powertrain" data-field="transmission">Tự động vô cấp -
                                CVT
                            </td>
                            <td data-index="1" data-section="powertrain" data-field="transmission">Tự động 8 cấp ZF
                            </td>
                            <td data-index="2" data-section="powertrain" data-field="transmission"></td>
                        </tr>

                        <tr>
                            <th>Mức tiêu thụ nhiên liệu (lít/100km)</th>
                            <td data-index="0" data-section="powertrain" data-field="fuelConsumption">Trong đô thị:
                                7,11
                                Ngoài đô thị: 5,11
                                Kết hợp: 5,85
                            </td>
                            <td data-index="1" data-section="powertrain" data-field="fuelConsumption">Trong đô thị:
                                10,83
                                Ngoài đô thị: 6,82
                                Kết hợp: 8,32
                            </td>
                            <td data-index="2" data-section="powertrain" data-field="fuelConsumption"></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div id="exterior-container" class="accordion">
            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#exterior-collapse" aria-expanded="false">
                <h2 class="d-flex align-items-center justify-content-between pb-4">
                    Ngoại thất
                    <i class="fa fa-angle-up"></i>
                </h2>
            </button>
            <div id="exterior-collapse" class="table-responsive horizontal dragscroll collapse" data-parent="#exterior-container" style="">
                <table class="table table-bordered table-compare table-striped-columns">
                    <tbody class="break-line">
                        <tr>
                            <th>Đèn chiếu xa, chiếu gần</th>
                            <td data-index="0" data-section="exterior" data-field="beam">Halogen</td>
                            <td data-index="1" data-section="exterior" data-field="beam">LED</td>
                            <td data-index="2" data-section="exterior" data-field="beam"></td>
                        </tr>
                        <tr>
                            <th>Chế độ đèn tự động bật/tắt</th>
                            <td data-index="0" data-section="exterior" data-field="auto"><i class="fa fa-times no"></i>
                            </td>
                            <td data-index="1" data-section="exterior" data-field="auto"><i class="fa fa-check yes"></i>
                            </td>
                            <td data-index="2" data-section="exterior" data-field="auto"></td>
                        </tr>





                        <tr>
                            <th>La-zăng hợp kim nhôm</th>
                            <td data-index="0" data-section="exterior" data-field="aluminumAlloyWheels">15"</td>
                            <td data-index="1" data-section="exterior" data-field="aluminumAlloyWheels">19"</td>
                            <td data-index="2" data-section="exterior" data-field="aluminumAlloyWheels"></td>
                        </tr>
                        <tr>
                            <th>Ống xả đôi</th>
                            <td data-index="0" data-section="exterior" data-field="dualExhaustPipes"><i class="fa fa-times no"></i></td>
                            <td data-index="1" data-section="exterior" data-field="dualExhaustPipes"><i class="fa fa-check yes"></i></td>
                            <td data-index="2" data-section="exterior" data-field="dualExhaustPipes"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="interior-container" class="accordion">
            <button class="btn btn-block" data-toggle="collapse" data-target="#interior-collapse" aria-expanded="false">
                <h2 class="d-flex align-items-center justify-content-between pb-4">
                    Nội thất
                    <i class="fa fa-angle-up"></i>
                </h2>
            </button>
            <div id="interior-collapse" class="collapse  table-responsive horizontal dragscroll" data-parent="#interior-container">
                <table class="table table-bordered table-compare table-striped-columns">
                    <tbody class="break-line">
                        <tr>
                            <th>Số chỗ ngồi</th>
                            <td data-index="0" data-section="interior" data-field="numberOfSeats">5 chỗ</td>
                            <td data-index="1" data-section="interior" data-field="numberOfSeats">5 chỗ</td>
                            <td data-index="2" data-section="interior" data-field="numberOfSeats"></td>
                        </tr>
                        <tr>
                            <th>Màn hình trung tâm</th>
                            <td data-index="0" data-section="interior" data-field="informationCenter">Cảm ứng 7"
                            </td>
                            <td data-index="1" data-section="interior" data-field="informationCenter">Cảm ứng 10,4"
                            </td>
                            <td data-index="2" data-section="interior" data-field="informationCenter"></td>
                        </tr>




                        <tr>
                            <th>Hệ thống điều hòa</th>
                            <td data-index="0" data-section="interior" data-field="airConditioner">Tự động có cảm
                                ứng độ
                                ẩm</td>
                            <td data-index="1" data-section="interior" data-field="airConditioner">Tự động, 2 vùng
                                độc
                                lập</td>
                            <td data-index="2" data-section="interior" data-field="airConditioner"></td>
                        </tr>




                    </tbody>
                </table>
            </div>
        </div>
        <div id="safety-container" class="accordion">
            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#safety-collapse" aria-expanded="false">
                <h2 class="d-flex align-items-center justify-content-between pb-4">
                    An toàn &amp; An ninh
                    <i class="fa fa-angle-up"></i>
                </h2>
            </button>
            <div id="safety-collapse" class="table-responsive horizontal dragscroll collapse" data-parent="#safety-container" style="">
                <table class="table table-bordered table-compare table-striped-columns">
                    <tbody class="break-line">
                        <tr>
                            <th>Phanh trước</th>
                            <td data-index="0" data-section="safety" data-field="frontBrake"></td>
                            <td data-index="1" data-section="safety" data-field="frontBrake"></td>
                            <td data-index="2" data-section="safety" data-field="frontBrake"></td>
                        </tr>
                        <tr>
                            <th>Phanh sau</th>
                            <td data-index="0" data-section="safety" data-field="rearBrake"></td>
                            <td data-index="1" data-section="safety" data-field="rearBrake"></td>
                            <td data-index="2" data-section="safety" data-field="rearBrake"></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<script>
    var item = <?php echo json_encode($models, JSON_HEX_TAG); ?>;


    var car1;
   
    var index;
    var comparecolumn1;

    function picker(picker) {
        index = picker.getAttribute("data-picker");
      
    }

    function choosecar(carmodel) {
        var carchoosed = carmodel.getAttribute("data-car");
      

        car1 = item[carchoosed];

        comparecolumn1 = $('[data-index=' + index + ']');
        column1();
      

      
    }

    function column1() {



        for (var i = 0; i < comparecolumn1.length; i++) {
            //

            if (comparecolumn1[i].getAttribute("data-section") === "dimension" && comparecolumn1[i].getAttribute("data-field") === "length") {
                comparecolumn1[i].innerHTML = car1.model_name

                // thay lai model_name=size
            } else if (comparecolumn1[i].getAttribute("data-section") === "interior" && comparecolumn1[i].getAttribute("data-field") === "airConditioner") {
                comparecolumn1[i].innerHTML = car1.air_conditioning
            } else if (comparecolumn1[i].getAttribute("data-section") === "exterior" && comparecolumn1[i].getAttribute("data-field") === "aluminumAlloyWheels") {
                comparecolumn1[i].innerHTML = car1.alluminum_alloy_lazang
            } else if (comparecolumn1[i].getAttribute("data-section") === "exterior" && comparecolumn1[i].getAttribute("data-field") === "auto") {
                comparecolumn1[i].innerHTML = car1.automatic_lights
            } else if (comparecolumn1[i].getAttribute("data-section") === "powertrain" && comparecolumn1[i].getAttribute("data-field") === "transmission") {
                comparecolumn1[i].innerHTML = car1.car_gearbox
            } else if (comparecolumn1[i].getAttribute("data-section") === "interior" && comparecolumn1[i].getAttribute("data-field") === "informationCenter") {
                comparecolumn1[i].innerHTML = car1.central_screen
            } else if (comparecolumn1[i].getAttribute("data-section") === "powertrain" && comparecolumn1[i].getAttribute("data-field") === "engineType") {
                comparecolumn1[i].innerHTML = car1.engine
            } else if (comparecolumn1[i].getAttribute("data-section") === "powertrain" && comparecolumn1[i].getAttribute("data-field") === "autoStartStop") {
                comparecolumn1[i].innerHTML = car1.engine_shutdown_function
            } else if (comparecolumn1[i].getAttribute("data-section") === "exterior" && comparecolumn1[i].getAttribute("data-field") === "dualExhaustPipes") {
                comparecolumn1[i].innerHTML = car1.exhaust_pipe
            } else if (comparecolumn1[i].getAttribute("data-section") === "safety" && comparecolumn1[i].getAttribute("data-field") === "frontBrake") {
                comparecolumn1[i].innerHTML = car1.front_wheel_brake
            } else if (comparecolumn1[i].getAttribute("data-section") === "powertrain" && comparecolumn1[i].getAttribute("data-field") === "fuelConsumption") {
                comparecolumn1[i].innerHTML = car1.fuel_consumption
            } else if (comparecolumn1[i].getAttribute("data-section") === "exterior" && comparecolumn1[i].getAttribute("data-field") === "beam") {
                comparecolumn1[i].innerHTML = car1.lamp
            } else if (comparecolumn1[i].getAttribute("data-section") === "safety" && comparecolumn1[i].getAttribute("data-field") === "rearBrake") {
                comparecolumn1[i].innerHTML = car1.rear_wheel_brake
            } else if (comparecolumn1[i].getAttribute("data-section") === "interior" && comparecolumn1[i].getAttribute("data-field") === "numberOfSeats") {
                comparecolumn1[i].innerHTML = car1.seat
            } else if (comparecolumn1[i].getAttribute("data-section") === "powertrain" && comparecolumn1[i].getAttribute("data-field") === "maxPower") {
                comparecolumn1[i].innerHTML = car1.wattage
            } else if (comparecolumn1[i].getAttribute("data-section") === "dimension" && comparecolumn1[i].getAttribute("data-field") === "kurbWeightPayload") {
                comparecolumn1[i].innerHTML = car1.weight
            }
        }

       

    };

 


   
</script>

@endsection