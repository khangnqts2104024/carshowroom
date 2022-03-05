@extends('layouts.layout')
@section('content')

<!-- Bootstrap CSS -->


<body>
<link rel="stylesheet" href="/css/compare.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


  <!-- Comparison-->
  <p style="text-align: center; font-size: 2em; font-weight: bolder">
    So Sánh Xe
  </p>

  <div class="container comparison-page">
    <div class="comparison-header table-responsive">
      <table class="table table-compare">
        <tbody>
          <th scope="col"></th>
          <td scope="col">
            <div class="compare_icon"></div>
            <a id="vehicle-picker-1" class="vehicle-picker" href data-index="0" data-toggle="modal" data-target="#modal_compare1" data="1">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">Lựa chọn xe</p>
            </a>
          </td>
          <td scope="col">
            <div class="compare_icon"></div>
            <a id="vehicle-picker-1" class="vehicle-picker" href="" data-index="1" data-toggle="modal" data-target="#modal_compare2" data="2">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">Lựa chọn xe</p>
            </a>
          </td>
          <td scope="col">
            <div class="compare_icon"></div>
            <a id="vehicle-picker-1" class="vehicle-picker" href="" data-index="2" data-toggle="modal" data-target="#modal_compare3" data="3">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">Lựa chọn xe</p>
            </a>
          </td>
        </tbody>
      </table>
      <hr>
      <!--Buton infor-->

      <div id="dimension-infor">
        <button type="button" class="btn btn-block d-flex justify-content-between " data-toggle="collapse" data-target="#dimension" aria-expanded="false" aria-controls="#dimension">
          Kích thước & Khối lượng
        </button>

        <div id="dimension" class="collapse show table-responsive ">
          <table class="table table-bordered table-striped">
            <tbody class="break-line">
              <tr>
                <th>Kích Thước (mm)</th>
                <td class=" text-center modal_size01"></td>
                <td class=" text-center modal_size02"></td>
                <td class=" text-center modal_size03"></td>
              </tr>

              <tr>
                <th>Tự trọng/Tải trọng (Kg)</th>
                <td class=" text-center modal_weight01"></td>
                <td class=" text-center modal_weight02"></td>
                <td class=" text-center modal_weight03"></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <hr>
      <div id="engine-infor">
        <button class="btn btn-block d-flex justify-content-between " data-toggle="collapse" data-target="#engine" aria-expanded="true">
          Động Cơ
        </button>

        <div id="engine" class="table-responsive collapse show">
          <table class="table table-bordered table-striped">
            <tbody class="break-line">
              <tr>
                <th>Loại Động Cơ</th>
                <td class="engine01 text-center"></td>
                <td class="engine02 text-center"></td>
                <td class="engine03 text-center"></td>
              </tr>

              <tr>
                <th>Công Xuất Tối Đa</th>
                <td class="text-center wattage01"></td>
                <td class="text-center wattage02"></td>
                <td class="text-center wattage03"></td>
              </tr>
              <tr>
                <th>Chức Năng Tự Động Tắt Động Cơ</th>
                <td class="text-center engine_shutdown_function01"></td>
                <td class="text-center engine_shutdown_function02"></td>
                <td class="text-center engine_shutdown_function03"></td>
              </tr>

              <tr>
                <th>Hôp số</th>
                <td class="text-center car_gearbox01"></td>
                <td class="text-center car_gearbox02"></td>
                <td class="text-center car_gearbox03"></td>
              </tr>

              <tr>
                <th>Mức tiêu thụ nhiên liệu</th>
                <td class="text-center Fuel_Consumption01"></td>
                <td class="text-center Fuel_Consumption02"></td>
                <td class="text-center Fuel_Consumption03"></td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>
      <hr>
      <div id="ex_interior-infor">
        <button class="btn btn-block d-flex justify-content-between" data-toggle="collapse" data-target="#ex_interior" aria-expanded="false">
          Nội Thất & Ngoại Thất
        </button>

        <div id="ex_interior" class="collapse show table-responsive ">
          <table class="table table-bordered table-striped">
            <tbody class="break-line">
              <tr>
                <th>Số Chổ Ngồi</th>
                <td class="text-center seats01"></td>
                <td class="text-center seats02"></td>
                <td class="text-center seats03"></td>
              </tr>
              <tr>
                <th>Đèn Chiếu</th>
                <td class="text-center lamp01"></td>
                <td class="text-center lamp02"></td>
                <td class="text-center lamp03"></td>
              </tr>

              <tr>
                <th>Chế Độ Đèn Tự Động</th>
                <td class="text-center automatic_lights01"></td>
                <td class="text-center automatic_lights02"></td>
                <td class="text-center automatic_lights03"></td>
              </tr>
              <tr>
                <th>Lazang Hợp Kim Nhôm</th>
                <td class="text-center aluminum_alloy_lazang01"></td>
                <td class="text-center aluminum_alloy_lazang02"></td>
                <td class="text-center aluminum_alloy_lazang03"></td>
              </tr>
              <tr>
                <th>Hệ Thống Điều Hòa</th>
                <td class="text-center air_conditioning01"></td>
                <td class="text-center air_conditioning02"></td>
                <td class="text-center air_conditioning03"></td>
              </tr>
              <tr>
                <th>Màn Hình Trung Tâm</th>
                <td class="text-center central_screen01"></td>
                <td class="text-center central_screen02"></td>
                <td class="text-center central_screen03"></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <hr>
      <div id="safety-infor">
        <button class="btn btn-block d-flex justify-content-between" data-toggle="collapse" data-target="#safety" aria-expanded="false">
          Safety
        </button>

        <div id="safety" class="table-responsive collapse show">
          <table class="table table-bordered table-striped">
            <tbody class="break-line">
              <tr>
                <th>Phanh Trước</th>
                <td class="text-center front_wheel_brake01"></td>
                <td class="text-center front_wheel_brake02"></td>
                <td class="text-center front_wheel_brake03"></td>
              </tr>

              <tr>
                <th>Phanh Sau</th>
                <td class="text-center rear_wheel_brake01"></td>
                <td class="text-center rear_wheel_brake02"></td>
                <td class="text-center rear_wheel_brake03"></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>

<script>
  $('#exampleModal').on('show.bs.modal', event => {
    var button = $(event.relatedTarget);
    var modal = $(this);
    modal.addEventLise
  });
</script>


      <!-- Modal -->
      <div class="modal fade" id="modal_compare1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog"  role="document">
          <div class="modal-content" >
            <div class="modal-header">
              <h5 class="modal-title">Chọn xe thêm vào so sánh</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" >
              <ul class="list-group">
                @foreach($cars as $car)
                <li class="list-group-item">
                  <a href="#" class="d-flex" id="{{$car->model_id}}" onclick="add_compare(this.id);" data-edition="">
                    <p>{{$car -> car_type}}</p>
                    <from>
                      <input id="view_model_id" type="hidden" value="{{$car->model_id}}"></input>
                      <input id="view_model_type{{$car->model_id}}" type="hidden" value="{{$car->car_type}}"></input>
                      <input id="view_seats{{$car->model_id}}" type="hidden" value="{{$car->seats}}"></input>
                      <input id="view_size{{$car->model_id}}" type="hidden" value="{{$car->size}}"></input>
                      <input id="view_weight{{$car->model_id}}" type="hidden" value="{{$car->weight}}"></input>
                      <input id="view_engine{{$car->model_id}}" type="hidden" value="{{$car->engine}}"></input>
                      <input id="view_wattage{{$car->model_id}}" type="hidden" value="{{$car->wattage}}"></input>
                      <input id="view_engine_shutdown_function{{$car->model_id}}" type="hidden" value="{{$car->engine_shutdown_function}}"></input>
                      <input id="view_car_gearbox{{$car->model_id}}" type="hidden" value="{{$car->car_gearbox}}"></input>
                      <input id="view_Fuel_Consumption{{$car->model_id}}" type="hidden" value="{{$car->fuel_consumption}}"></input>
                      <input id="view_lamp{{$car->model_id}}" type="hidden" value="{{$car->lamp}}"></input>
                      <input id="view_automatic_lights{{$car->model_id}}" type="hidden" value="{{$car->automatic_lights}}"></input>
                      <input id="view_aluminum_alloy_lazang{{$car->model_id}}" type="hidden" value="{{$car->aluminum_alloy_lazang}}"></input>
                      <input id="view_central_screen{{$car->model_id}}" type="hidden" value="{{$car->central_screen}}"></input>
                      <input id="view_air_conditioning{{$car->model_id}}" type="hidden" value="{{$car->air_conditioning}}"></input>
                      <input id="view_front_wheel_brake{{$car->model_id}}" type="hidden" value="{{$car->front_wheel_brake}}"></input>
                      <input id="view_rear_wheel_brake{{$car->model_id}}" type="hidden" value="{{$car->rear_wheel_brake}}"></input>
                    </from>

                  </a>
                </li>

                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div id="btn-order">
        <table class="table table-bordered table-striped">
          <tbody class="break-line">
            <tr>
              <td></td>
              <td data-index="0" style="text-align: center;"><button class="btn btn-success" style="text-align: center; font-weight: bolder;">Order</button></td>
              <td data-index="1" style="text-align: center;"><button class="btn btn-success" style="text-align: center; font-weight: bolder;">Order</button></td>
              <td data-index="2" style="text-align: center;"><button class="btn btn-success" style="text-align: center; font-weight: bolder;">Order</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <script>
      function add_compare(id){ 
      var modal = document.getElementsByClassName('modal_compare1');
      var id_product = id;
      var name = document.getElementById('view_model_type' + id_product).value;
      var seats = document.getElementById('view_seats' + id_product).value;
      var size = document.getElementById('view_size' + id_product).value;  
      var weight = document.getElementById('view_weight' + id_product).value; 
      var engine = document.getElementById('view_engine' + id_product).value;
      var wattage = document.getElementById('view_wattage' + id_product).value;
      var engine_shutdown_function = document.getElementById('view_engine_shutdown_function' + id_product).value;
      var car_gearbox = document.getElementById('view_car_gearbox' + id_product).value;
      var Fuel_Consumption = document.getElementById('view_Fuel_Consumption' + id_product).value;
      var lamp = document.getElementById('view_lamp' + id_product).value;
      var automatic_lights = document.getElementById('view_automatic_lights' + id_product).value;
      var aluminum_alloy_lazang = document.getElementById('view_aluminum_alloy_lazang' + id_product).value;
      var central_screen = document.getElementById('view_central_screen' + id_product).value;
      var air_conditioning = document.getElementById('view_air_conditioning' + id_product).value;
      var front_wheel_brake = document.getElementById('view_front_wheel_brake' + id_product).value;
      var rear_wheel_brake = document.getElementById('view_rear_wheel_brake' + id_product).value;


      var newCar = {
        'name': name,
        'seats': seats,
        // 'exhaust_pipe': exhaust_pipe,
        'size': size,
        'weight': weight,
        'engine': engine,
        'wattage': wattage,
        'engine_shutdown_function': engine_shutdown_function,
        'car_gearbox': car_gearbox,
        'Fuel_Consumption': Fuel_Consumption,
        'lamp': lamp,
        'automatic_lights': automatic_lights,
        'aluminum_alloy_lazang': aluminum_alloy_lazang,
        'central_screen': central_screen,
        'air_conditioning': air_conditioning,
        'front_wheel_brake': front_wheel_brake,
        'rear_wheel_brake': rear_wheel_brake
      }

      if (localStorage.getItem('compare') == null) {
        localStorage.setItem('compare', '[]');
      }
      var oldData = JSON.parse(localStorage.getItem('compare'));
      var matches = $.grep(oldData, function(obj){
        return obj == id_product;
      });

      if (matches.length) {
        alert("Sản Phẩm đã chọn");
      } else {
        oldData.push(newCar);
        $('#dimension').find('.modal_size01').append(newCar.size);
        $('#dimension').find('.modal_weight01').append(newCar.weight);
        $('#engine').find('.engine01').append(newCar.engine);
        $('#engine').find('.wattage01').append(newCar.wattage);
        $('#engine').find('.engine_shutdown_function01').append(newCar.engine_shutdown_function);
        $('#engine').find('.car_gearbox01').append(newCar.car_gearbox);
        $('#engine').find('.Fuel_Consumption01').append(newCar.Fuel_Consumption);
        $('#ex_interior').find('.seats01').append(newCar.seats);
        $('#ex_interior').find('.lamp01').append(newCar.lamp);
        $('#ex_interior').find('.automatic_lights01').append(newCar.automatic_lights);
        $('#ex_interior').find('.aluminum_alloy_lazang01').append(newCar.aluminum_alloy_lazang);
        $('#ex_interior').find('.air_conditioning01').append(newCar.air_conditioning);
        $('#ex_interior').find('.central_screen01').append(newCar.central_screen);
        $('#safety').find('.front_wheel_brake01').append(newCar.front_wheel_brake);
        $('#safety').find('.rear_wheel_brake01').append(newCar.rear_wheel_brake);
      }
      localStorage.setItem("compare",JSON.stringify(oldData));
      $('#modal_compare1').removeClass('show');
      };
    
  </script>


</body>

@endsection;