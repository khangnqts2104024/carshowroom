@extends('dashboard.layouts.layout')
@section('content')

<!-- Bootstrap CSS -->


<body>
  <link rel="stylesheet" href="/css/compare.css" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


  <!-- Comparison-->
  <p style="text-align: center; font-size: 2em; font-weight: bolder">
{{__('compare.Compare cars')}}
  </p>

  <div class="container comparison-page">
    <div class="comparison-header table-responsive">
      <table class="table table-compare">
        <tbody>
          <th scope="col"></th>
          <td scope="col">
            <div class="compare_icon1"></div>
            <a id="vehicle-picker-1" class="vehicle-picker " href="#" data-target="#modal_compare1" data="1">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">{{ __('compare.Vehicle selection')}}</p>
            </a>
          </td>
          <td scope="col">
            <div class="compare_icon2"></div>
            <a id="vehicle-picker-2" class="vehicle-picker" href="#" data-target="#modal_compare2" data="2">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">{{ __('compare.Vehicle selection')}}</p>
            </a>
          </td>
          <td scope="col">
            <div class="compare_icon3"></div>
            <a id="vehicle-picker-3" class="vehicle-picker" href="#" data-target="#modal_compare3" data="3">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">{{ __('compare.Vehicle selection')}}</p>
            </a>
          </td>
        </tbody>
      </table>
      <hr>
      <!--Buton infor-->

      <div id="dimension-infor">
        <button type="button" class="btn btn-block d-flex justify-content-between  ">
          {{ __('compare.Dimensions & Weight')}}
        </button>

        <div id="dimension" class="table-responsive ">
          <table class="table table-bordered table-striped ">
            <tbody class="break-line">
              <tr>
                <th>{{ __('compare.Dimensions')}}</th>
                <td class=" text-center modal_size01"></td>
                <td class=" text-center modal_size02"></td>
                <td class=" text-center modal_size03"></td>
              </tr>

              <tr>
                <th>{{ __('compare.Weight')}}</th>
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
        <button class="btn btn-block d-flex justify-content-between ">
          {{ __('compare.Engine')}}
        </button>

        <div id="engine" class="table-responsive ">
          <table class="table table-bordered table-striped">
            <tbody class="break-line">
              <tr>
                <th>{{ __('compare.Engine type')}}</th>
                <td class="engine01 text-center"></td>
                <td class="engine02 text-center"></td>
                <td class="engine03 text-center"></td>
              </tr>

              <tr>
                <th>{{ __('compare.Maximum capacity')}}</th>
                <td class="text-center wattage01"></td>
                <td class="text-center wattage02"></td>
                <td class="text-center wattage03"></td>
              </tr>
              <tr>
                <th>{{ __('compare.Engine shutdown function')}}</th>
                <td class="text-center engine_shutdown_function01"></td>
                <td class="text-center engine_shutdown_function02"></td>
                <td class="text-center engine_shutdown_function03"></td>
              </tr>

              <tr>
                <th>{{ __('compare.Gearbox')}}</th>
                <td class="text-center car_gearbox01"></td>
                <td class="text-center car_gearbox02"></td>
                <td class="text-center car_gearbox03"></td>
              </tr>

              <tr>
                <th>{{ __('compare.Fuel Consumption')}}</th>
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
        <button class="btn btn-block d-flex justify-content-between ">
         {{ __('compare.Interior & Exterior')}}
        </button>

        <div id="ex_interior" class="table-responsive ">
          <table class="table table-bordered table-striped">
            <tbody class="break-line">
              <tr>
                <th>{{ __('compare.Number of seats')}}</th>
                <td class="text-center seats01"></td>
                <td class="text-center seats02"></td>
                <td class="text-center seats03"></td>
              </tr>
              <tr>
                <th>{{ __('compare.Lamp')}}</th>
                <td class="text-center lamp01"></td>
                <td class="text-center lamp02"></td>
                <td class="text-center lamp03"></td>
              </tr>

              <tr>
                <th>{{ __('compare.Auto Light Mode')}}</th>
                <td class="text-center automatic_lights01"></td>
                <td class="text-center automatic_lights02"></td>
                <td class="text-center automatic_lights03"></td>
              </tr>
              <tr>
                <th>{{ __('compare.Aluminum alloy wheels')}}</th>
                <td class="text-center aluminum_alloy_lazang01"></td>
                <td class="text-center aluminum_alloy_lazang02"></td>
                <td class="text-center aluminum_alloy_lazang03"></td>
              </tr>
              <tr>
                <th>{{ __('compare.Air conditioning system')}}</th>
                <td class="text-center air_conditioning01"></td>
                <td class="text-center air_conditioning02"></td>
                <td class="text-center air_conditioning03"></td>
              </tr>
              <tr>
                <th>{{ __('compare.Center Screen')}}</th>
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
        <button class="btn btn-block d-flex justify-content-between ">
         {{ __('compare.Safety')}}
        </button>

        <div id="safety" class="table-responsive ">
          <table class="table table-bordered table-striped">
            <tbody class="break-line">
              <tr>
                <th>{{ __('compare.Front Brake')}}</th>
                <td class="text-center front_wheel_brake01"></td>
                <td class="text-center front_wheel_brake02"></td>
                <td class="text-center front_wheel_brake03"></td>
              </tr>

              <tr>
                <th>{{ __('compare.Rear Brake')}}</th>
                <td class="text-center rear_wheel_brake01"></td>
                <td class="text-center rear_wheel_brake02"></td>
                <td class="text-center rear_wheel_brake03"></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modal_compare1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Chọn xe thêm vào so sánh</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-group">
                @foreach($cars as $key => $carGroupByName)
                @php
                    $car = $carGroupByName[0];
                @endphp
              
                <li class="list-group-item">
                  <a href="#" class="d-flex" id="{{$car->model_id}}" onclick="add_compare(this.id);" data-edition="">
                    <p>{{$car -> model_name}}</p>
                    <from>
                      
                      <img id="view_image{{$car->model_id}}" style="display: none;"src="/storage/files/Image_Car/{{$car->image}}">             
                      <input id="view_model_id" type="hidden" value="{{$car->model_id}}"></input>
                      <input id="view_model_type{{$car->model_id}}" type="hidden" value="{{$car->car_type}}"></input>
                      <input id="view_seats{{$car->model_id}}" type="hidden" value="{{$car->seat}}"></input>
                      <input id="view_size{{$car->model_id}}" type="hidden" value="{{$car->size}}"></input>
                      <input id="view_weight{{$car->model_id}}" type="hidden" value="{{$car->weight}}"></input>
                      <input id="view_engine{{$car->model_id}}" type="hidden" value="{{$car->engine}}"></input>
                      <input id="view_wattage{{$car->model_id}}" type="hidden" value="{{$car->wattage}}"></input>
                      <input id="view_engine_shutdown_function{{$car->model_id}}" type="hidden" value="{{$car->engine_shutdown_function}}"></input>
                      <input id="view_car_gearbox{{$car->model_id}}" type="hidden" value="{{$car->car_gearbox}}"></input>
                      <input id="view_Fuel_Consumption{{$car->model_id}}" type="hidden" value="{{$car->fuel_consumption}}"></input>
                      <input id="view_lamp{{$car->model_id}}" type="hidden" value="{{$car->lamp}}"></input>
                      <input id="view_automatic_lights{{$car->model_id}}" type="hidden" value="{{$car->automatic_lights}}"></input>
                      <input id="view_aluminum_alloy_lazang{{$car->model_id}}" type="hidden" value="{{$car->alluminum_alloy_lazang}}"></input>
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
      <!--Modal2  -->
      <div class="modal fade" id="modal_compare2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Chọn xe thêm vào so sánh</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-group">
            
                @foreach($cars as $key => $carGroupByName)
                
                @php
                    $car = $carGroupByName[0];
                @endphp
                <li class="list-group-item">
                  <a href="#" class="d-flex" id="{{$car->model_id}}" onclick="add_compare2(this.id);" data-edition="">
                    <p>{{$car -> model_name}}</p>
                    <from>
                      <img id="view_image{{$car->model_id}}" style="display: none;"src="/storage/files/Image_Car/{{$car->image}}">             
                      <input id="view_model_id" type="hidden" value="{{$car->model_id}}"></input>
                      <input id="view_model_type{{$car->model_id}}" type="hidden" value="{{$car->car_type}}"></input>
                      <input id="view_seats{{$car->model_id}}" type="hidden" value="{{$car->seat}}"></input>
                      <input id="view_size{{$car->model_id}}" type="hidden" value="{{$car->size}}"></input>
                      <input id="view_weight{{$car->model_id}}" type="hidden" value="{{$car->weight}}"></input>
                      <input id="view_engine{{$car->model_id}}" type="hidden" value="{{$car->engine}}"></input>
                      <input id="view_wattage{{$car->model_id}}" type="hidden" value="{{$car->wattage}}"></input>
                      <input id="view_engine_shutdown_function{{$car->model_id}}" type="hidden" value="{{$car->engine_shutdown_function}}"></input>
                      <input id="view_car_gearbox{{$car->model_id}}" type="hidden" value="{{$car->car_gearbox}}"></input>
                      <input id="view_Fuel_Consumption{{$car->model_id}}" type="hidden" value="{{$car->fuel_consumption}}"></input>
                      <input id="view_lamp{{$car->model_id}}" type="hidden" value="{{$car->lamp}}"></input>
                      <input id="view_automatic_lights{{$car->model_id}}" type="hidden" value="{{$car->automatic_lights}}"></input>
                      <input id="view_aluminum_alloy_lazang{{$car->model_id}}" type="hidden" value="{{$car->alluminum_alloy_lazang}}"></input>
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
      <!-- Modal3 -->
      <div class="modal fade" id="modal_compare3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Chọn xe thêm vào so sánh</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-group">
                
                @foreach($cars as $key => $carGroupByName)
                @php
                    $car = $carGroupByName[0];
                @endphp
                <li class="list-group-item">
                  <a href="#" class="d-flex" id="{{$car->model_id}}" onclick="add_compare3(this.id);" data-edition="">
                    <p>{{$car -> model_name}}</p>
                    <from>
                      <img id="view_image{{$car->model_id}}" style="display: none;" src="/storage/files/Image_Car/{{$car->image}}">                 
                      <input id="view_model_id" type="hidden" value="{{$car->model_id}}"></input>
                      <input id="view_model_type{{$car->model_id}}" type="hidden" value="{{$car->car_type}}"></input>
                      <input id="view_seats{{$car->model_id}}" type="hidden" value="{{$car->seat}}"></input>
                      <input id="view_size{{$car->model_id}}" type="hidden" value="{{$car->size}}"></input>
                      <input id="view_weight{{$car->model_id}}" type="hidden" value="{{$car->weight}}"></input>
                      <input id="view_engine{{$car->model_id}}" type="hidden" value="{{$car->engine}}"></input>
                      <input id="view_wattage{{$car->model_id}}" type="hidden" value="{{$car->wattage}}"></input>
                      <input id="view_engine_shutdown_function{{$car->model_id}}" type="hidden" value="{{$car->engine_shutdown_function}}"></input>
                      <input id="view_car_gearbox{{$car->model_id}}" type="hidden" value="{{$car->car_gearbox}}"></input>
                      <input id="view_Fuel_Consumption{{$car->model_id}}" type="hidden" value="{{$car->fuel_consumption}}"></input>
                      <input id="view_lamp{{$car->model_id}}" type="hidden" value="{{$car->lamp}}"></input>
                      <input id="view_automatic_lights{{$car->model_id}}" type="hidden" value="{{$car->automatic_lights}}"></input>
                      <input id="view_aluminum_alloy_lazang{{$car->model_id}}" type="hidden" value="{{$car->alluminum_alloy_lazang}}"></input>
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
              <td class="text-center" id="btn01"></td>
              <td class="text-center" id="btn02"> </td>
              <td class="text-center" id="btn03"> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Button Scroll to top -->
    <button onclick="topFunction()" id="btnScrollTop">Top</button>
  </div>


  <!--Script Show Modal  -->
  <script>
    $('#vehicle-picker-1').on('click', function() {
      $('#modal_compare1').modal("show");
    });
    $('#vehicle-picker-2').on('click', function() {
      $('#modal_compare2').modal("show");
    });
    $('#vehicle-picker-3').on('click', function() {
      $('#modal_compare3').modal("show");
    })
  </script>


  <!-- Script add_compare -->
  <script>
    function add_compare(product_id) {
      var id1 = product_id;
      var type1 = document.getElementById('view_model_type' + id1).value;
      var image1 = document.getElementById('view_image' + id1).src;
      var seats1 = document.getElementById('view_seats' + id1).value;
      var size1 = document.getElementById('view_size' + id1).value;
      var weight1 = document.getElementById('view_weight' + id1).value;
      var engine1 = document.getElementById('view_engine' + id1).value;
      var wattage1 = document.getElementById('view_wattage' + id1).value;
      var engine_shutdown_function1 = document.getElementById('view_engine_shutdown_function' + id1).value;
      var car_gearbox1 = document.getElementById('view_car_gearbox' + id1).value;
      var Fuel_Consumption1 = document.getElementById('view_Fuel_Consumption' + id1).value;
      var lamp1 = document.getElementById('view_lamp' + id1).value;
      var automatic_lights1 = document.getElementById('view_automatic_lights' + id1).value;
      var aluminum_alloy_lazang1 = document.getElementById('view_aluminum_alloy_lazang' + id1).value;
      var central_screen1 = document.getElementById('view_central_screen' + id1).value;
      var air_conditioning1 = document.getElementById('view_air_conditioning' + id1).value;
      var front_wheel_brake1 = document.getElementById('view_front_wheel_brake' + id1).value;
      var rear_wheel_brake1 = document.getElementById('view_rear_wheel_brake' + id1).value;


      var newCar1 = {
        'id': id1,
        'image': image1,
        'type': type1,
        'seats': seats1,
        'size': size1,
        'weight': weight1,
        'engine': engine1,
        'wattage': wattage1,
        'engine_shutdown_function': engine_shutdown_function1,
        'car_gearbox': car_gearbox1,
        'Fuel_Consumption': Fuel_Consumption1,
        'lamp': lamp1,
        'automatic_lights': automatic_lights1,
        'aluminum_alloy_lazang': aluminum_alloy_lazang1,
        'central_screen': central_screen1,
        'air_conditioning': air_conditioning1,
        'front_wheel_brake': front_wheel_brake1,
        'rear_wheel_brake': rear_wheel_brake1
      }

      if (localStorage.getItem('compare') == null) {
        localStorage.setItem('compare', '[]');
      }
      var oldData1 = JSON.parse(localStorage.getItem('compare'));

      oldData1.push(newCar1);
      $('.compare_icon1').append('<img src="' + newCar1.image + '" class="info01 vehicle-picker" width:auto></img>');
      $('#vehicle-picker-1').addClass('d-none');
      $('#dimension').find('.modal_size01').append('<p class="info01">' + newCar1.size + '</p>');
      $('#dimension').find('.modal_weight01').append('<p class="info01">' + newCar1.weight + '</p>');
      $('#engine').find('.engine01').append('<p class="info01">' + newCar1.engine + '</p>');
      $('#engine').find('.wattage01').append('<p class="info01">' + newCar1.wattage + '</p>');
      $('#engine').find('.engine_shutdown_function01').append('<p class="info01">' + newCar1.engine_shutdown_function + '</p>');
      $('#engine').find('.car_gearbox01').append('<p class="info01">' + newCar1.car_gearbox + '</p>');
      $('#engine').find('.Fuel_Consumption01').append('<p class="info01">' + newCar1.Fuel_Consumption + '</p>');
      $('#ex_interior').find('.seats01').append('<p class="info01">' + newCar1.seats + '</p>');
      $('#ex_interior').find('.lamp01').append('<p class="info01">' + newCar1.lamp + '</p>');
      $('#ex_interior').find('.automatic_lights01').append('<p class="info01">' + newCar1.automatic_lights + '</p>');
      $('#ex_interior').find('.aluminum_alloy_lazang01').append('<p class="info01">' + newCar1.aluminum_alloy_lazang + '</p>');
      $('#ex_interior').find('.air_conditioning01').append('<p class="info01">' + newCar1.air_conditioning + '</p>');
      $('#ex_interior').find('.central_screen01').append('<p class="info01">' + newCar1.central_screen + '</p>');
      $('#safety').find('.front_wheel_brake01').append('<p class="info01">' + newCar1.front_wheel_brake + '</p>');
      $('#safety').find('.rear_wheel_brake01').append('<p class="info01">' + newCar1.rear_wheel_brake + '</p>');
      $('#btn-order').find("#btn01").append(
        '<button class="btn btn-success info01" style="text-align: center; font-weight: bolder;"><a href="/user/order/' + id1 + '" style="color:white; font-weight:bolder;">Order</a></button>'
      );
      $('#btn-order').find("#btn01").append(
        '<button class="btn btn-danger info01" onClick="delete_compare(' + id1 + ')"  style="text-align: center; font-weight: bolder;">Remove</button>'
      );
      localStorage.setItem("compare", JSON.stringify(oldData1));
      $('#modal_compare1').modal("hide");
      // $('#modal_compare1').removeClass('show');
      // document.getElementById('modal_compare1').style.display == 'none';
      // $('.modal-backdrop').removeClass('show');
    };
  </script>


  <!-- script add_compare 2 -->
  <script>
    function add_compare2(product_id2) {

      var id2 = product_id2;
      var type2 = document.getElementById('view_model_type' + id2).value;
      var image2 = document.getElementById('view_image' + id2).src;
      var seats2 = document.getElementById('view_seats' + id2).value;
      var size2 = document.getElementById('view_size' + id2).value;
      var weight2 = document.getElementById('view_weight' + id2).value;
      var engine2 = document.getElementById('view_engine' + id2).value;
      var wattage2 = document.getElementById('view_wattage' + id2).value;
      var engine_shutdown_function2 = document.getElementById('view_engine_shutdown_function' + id2).value;
      var car_gearbox2 = document.getElementById('view_car_gearbox' + id2).value;
      var Fuel_Consumption2 = document.getElementById('view_Fuel_Consumption' + id2).value;
      var lamp2 = document.getElementById('view_lamp' + id2).value;
      var automatic_lights2 = document.getElementById('view_automatic_lights' + id2).value;
      var aluminum_alloy_lazang2 = document.getElementById('view_aluminum_alloy_lazang' + id2).value;
      var central_screen2 = document.getElementById('view_central_screen' + id2).value;
      var air_conditioning2 = document.getElementById('view_air_conditioning' + id2).value;
      var front_wheel_brake2 = document.getElementById('view_front_wheel_brake' + id2).value;
      var rear_wheel_brake2 = document.getElementById('view_rear_wheel_brake' + id2).value;


      var newCar2 = {
        'image': image2,
        'name': type2,
        'seats': seats2,
        'id': id2,
        'size': size2,
        'weight': weight2,
        'engine': engine2,
        'wattage': wattage2,
        'engine_shutdown_function': engine_shutdown_function2,
        'car_gearbox': car_gearbox2,
        'Fuel_Consumption': Fuel_Consumption2,
        'lamp': lamp2,
        'automatic_lights': automatic_lights2,
        'aluminum_alloy_lazang': aluminum_alloy_lazang2,
        'central_screen': central_screen2,
        'air_conditioning': air_conditioning2,
        'front_wheel_brake': front_wheel_brake2,
        'rear_wheel_brake': rear_wheel_brake2
      }

      if (localStorage.getItem('compare2') == null) {
        localStorage.setItem('compare2', '[]');
      }
      var oldData2 = JSON.parse(localStorage.getItem('compare2'));

      oldData2.push(newCar2);
      $('.compare_icon2').append('<img src="' + newCar2.image + '" class="info02 vehicle-picker" width: auto></img>');
      $('#vehicle-picker-2').addClass('d-none')
      $('#dimension').find('.modal_size02').append('<p class="info02">' + newCar2.size + '</p>');
      $('#dimension').find('.modal_weight02').append('<p class="info02">' + newCar2.weight + '</p>');
      $('#engine').find('.engine02').append('<p class="info02">' + newCar2.engine + '</p>');
      $('#engine').find('.wattage02').append('<p class="info02">' + newCar2.wattage + '</p>');
      $('#engine').find('.engine_shutdown_function02').append('<p class="info02">' + newCar2.engine_shutdown_function + '</p>');
      $('#engine').find('.car_gearbox02').append('<p class="info02">' + newCar2.car_gearbox + '</p>');
      $('#engine').find('.Fuel_Consumption02').append('<p class="info02">' + newCar2.Fuel_Consumption + '</p>');
      $('#ex_interior').find('.seats02').append('<p class="info02">' + newCar2.seats + '</p>');
      $('#ex_interior').find('.lamp02').append('<p class="info02">' + newCar2.lamp + '</p>');
      $('#ex_interior').find('.automatic_lights02').append('<p class="info02">' + newCar2.automatic_lights + '</p>');
      $('#ex_interior').find('.aluminum_alloy_lazang02').append('<p class="info02">' + newCar2.aluminum_alloy_lazang + '</p>');
      $('#ex_interior').find('.air_conditioning02').append('<p class="info02">' + newCar2.air_conditioning + '</p>');
      $('#ex_interior').find('.central_screen02').append('<p class="info02">' + newCar2.central_screen + '</p>');
      $('#safety').find('.front_wheel_brake02').append('<p class="info02">' + newCar2.front_wheel_brake + '</p>');
      $('#safety').find('.rear_wheel_brake02').append('<p class="info02">' + newCar2.rear_wheel_brake + '</p>');
      $('#btn-order').find("#btn02").append(
        '<button class="btn btn-success info02" style="text-align: center; font-weight: bolder;"><a href="/user/order/' + id2 + '" style="color:white; font-weight:bolder;">Order</a></button>'

      );
      $('#btn-order').find("#btn02").append(
        '<button class="btn btn-danger info02"  onClick="delete_compare2(' + id2 + ')"  style="text-align: center; font-weight: bolder;">Remove</button>'
      );
      localStorage.setItem("compare2", JSON.stringify(oldData2));
      $('#modal_compare2').modal("hide");
      // $('#modal_compare2').removeClass('show');
      // document.getElementById('modal_compare2').style.display == 'none';
      // $('.modal-backdrop').removeClass('show');
    };
  </script>


  <!-- Script add_compare3 -->
  <script>
    function add_compare3(prouct_id3) {

      var id3 = prouct_id3;
      var type3 = document.getElementById('view_model_type' + id3).value;
      var image3 = document.getElementById('view_image' + id3).src;
      var seats3 = document.getElementById('view_seats' + id3).value;
      var size3 = document.getElementById('view_size' + id3).value;
      var weight3 = document.getElementById('view_weight' + id3).value;
      var engine3 = document.getElementById('view_engine' + id3).value;
      var wattage3 = document.getElementById('view_wattage' + id3).value;
      var engine_shutdown_function3 = document.getElementById('view_engine_shutdown_function' + id3).value;
      var car_gearbox3 = document.getElementById('view_car_gearbox' + id3).value;
      var Fuel_Consumption3 = document.getElementById('view_Fuel_Consumption' + id3).value;
      var lamp3 = document.getElementById('view_lamp' + id3).value;
      var automatic_lights3 = document.getElementById('view_automatic_lights' + id3).value;
      var aluminum_alloy_lazang3 = document.getElementById('view_aluminum_alloy_lazang' + id3).value;
      var central_screen3 = document.getElementById('view_central_screen' + id3).value;
      var air_conditioning3 = document.getElementById('view_air_conditioning' + id3).value;
      var front_wheel_brake3 = document.getElementById('view_front_wheel_brake' + id3).value;
      var rear_wheel_brake3 = document.getElementById('view_rear_wheel_brake' + id3).value;


      var newCar3 = {
        'image': image3,
        'name': type3,
        'seats': seats3,
        'id': id3,
        'size': size3,
        'weight': weight3,
        'engine': engine3,
        'wattage': wattage3,
        'engine_shutdown_function': engine_shutdown_function3,
        'car_gearbox': car_gearbox3,
        'Fuel_Consumption': Fuel_Consumption3,
        'lamp': lamp3,
        'automatic_lights': automatic_lights3,
        'aluminum_alloy_lazang': aluminum_alloy_lazang3,
        'central_screen': central_screen3,
        'air_conditioning': air_conditioning3,
        'front_wheel_brake': front_wheel_brake3,
        'rear_wheel_brake': rear_wheel_brake3
      }

      if (localStorage.getItem('compare3') == null) {
        localStorage.setItem('compare3', '[]');
      }
      var oldData3 = JSON.parse(localStorage.getItem('compare3'));

      oldData3.push(newCar3);
      $('.compare_icon3').append('<img src="' + newCar3.image + '" class="info03 vehicle-picker" width: auto></img>');
      $('#vehicle-picker-3').addClass('d-none');
      $('#dimension').find('.modal_size03').append('<p class="info03">' + newCar3.size + '</p>');
      $('#dimension').find('.modal_weight03').append('<p class="info03">' + newCar3.weight + '</p>');
      $('#engine').find('.engine03').append('<p class="info03">' + newCar3.engine + '</p>');
      $('#engine').find('.wattage03').append('<p class="info03">' + newCar3.wattage + '</p>');
      $('#engine').find('.engine_shutdown_function03').append('<p class="info03">' + newCar3.engine_shutdown_function + '</p>');
      $('#engine').find('.car_gearbox03').append('<p class="info03">' + newCar3.car_gearbox + '</p>');
      $('#engine').find('.Fuel_Consumption03').append('<p class="info03">' + newCar3.Fuel_Consumption + '</p>');
      $('#ex_interior').find('.seats03').append('<p class="info03">' + newCar3.seats + '</p>');
      $('#ex_interior').find('.lamp03').append('<p class="info03">' + newCar3.lamp + '</p>');
      $('#ex_interior').find('.automatic_lights03').append('<p class="info03">' + newCar3.automatic_lights + '</p>');
      $('#ex_interior').find('.aluminum_alloy_lazang03').append('<p class="info03">' + newCar3.aluminum_alloy_lazang + '</p>');
      $('#ex_interior').find('.air_conditioning03').append('<p class="info03">' + newCar3.air_conditioning + '</p>');
      $('#ex_interior').find('.central_screen03').append('<p class="info03">' + newCar3.central_screen + '</p>');
      $('#safety').find('.front_wheel_brake03').append('<p class="info03">' + newCar3.front_wheel_brake + '</p>');
      $('#safety').find('.rear_wheel_brake03').append('<p class="info03">' + newCar3.rear_wheel_brake + '</p>');
      $('#btn-order').find("#btn03").append(
        '<button class="btn btn-success info03" style="text-align: center; font-weight: bolder;"><a href="/user/order/' + id3 + '" style="color:white; font-weight:bolder;">Order</a></button>'

      );
      $('#btn-order').find("#btn03").append(
        '<button class="btn btn-danger info03" onClick="delete_compare3(' + id3 + ')" style="text-align: center; font-weight: bolder;">Remove</button>'
      );

      localStorage.setItem("compare3", JSON.stringify(oldData3));
      $('#modal_compare3').modal("hide");
      // $('#modal_compare3').removeClass('show');
      // document.getElementById('modal_compare3').style.display == 'none';
      // $('.modal-backdrop').removeClass('show');
    };
  </script>

  <!-- Delete_compare -->
  <script type="text/javascript">
    function delete_compare(id1) {
      if (localStorage.getItem('compare') != null) {
        var data1 = JSON.parse(localStorage.getItem('compare'));
        var index1 = data1.findIndex(item => item.id1 === id1);
        data1.splice(index1, 1);
        localStorage.setItem('compare', JSON.stringify(data1));
        $('.compare_icon1').find('.info01').remove();
        $('#vehicle-picker-1').removeClass('d-none');
        $('#dimension').find('.modal_size01').find('.info01').remove();
        $('#dimension').find('.modal_weight01').find('.info01').remove();
        $('#engine').find('.engine01').find('.info01').remove();
        $('#engine').find('.wattage01').find('.info01').remove()
        $('#engine').find('.engine_shutdown_function01').find('.info01').remove();
        $('#engine').find('.car_gearbox01').find('.info01').remove();
        $('#engine').find('.Fuel_Consumption01').find('.info01').remove();
        $('#ex_interior').find('.seats01').find('.info01').remove();
        $('#ex_interior').find('.lamp01').find('.info01').remove();
        $('#ex_interior').find('.automatic_lights01').find('.info01').remove();
        $('#ex_interior').find('.aluminum_alloy_lazang01').find('.info01').remove();
        $('#ex_interior').find('.air_conditioning01').find('.info01').remove();
        $('#ex_interior').find('.central_screen01').find('.info01').remove();
        $('#safety').find('.front_wheel_brake01').find('.info01').remove();
        $('#safety').find('.rear_wheel_brake01').find('.info01').remove();
        $('#btn-order').find("#btn01").find('.info01').remove();

      }
    }
  </script>
  <script type="text/javascript">
    function delete_compare2(id2) {
      if (localStorage.getItem('compare2') != null) {
        var data2 = JSON.parse(localStorage.getItem('compare2'));
        var index2 = data2.findIndex(item => item.id2 === id2);
        data2.splice(index2, 1);
        localStorage.setItem('compare2', JSON.stringify(data2));
        $('.compare_icon2').find('.info02').remove();
        $('#vehicle-picker-2').removeClass('d-none');
        $('#dimension').find('.modal_size02').find('.info02').remove();
        $('#dimension').find('.modal_weight02').find('.info02').remove();
        $('#engine').find('.engine02').find('.info02').remove();
        $('#engine').find('.wattage02').find('.info02').remove()
        $('#engine').find('.engine_shutdown_function02').find('.info02').remove();
        $('#engine').find('.car_gearbox02').find('.info02').remove();
        $('#engine').find('.Fuel_Consumption02').find('.info02').remove();
        $('#ex_interior').find('.seats02').find('.info02').remove();
        $('#ex_interior').find('.lamp02').find('.info02').remove();
        $('#ex_interior').find('.automatic_lights02').find('.info02').remove();
        $('#ex_interior').find('.aluminum_alloy_lazang02').find('.info02').remove();
        $('#ex_interior').find('.air_conditioning02').find('.info02').remove();
        $('#ex_interior').find('.central_screen02').find('.info02').remove();
        $('#safety').find('.front_wheel_brake02').find('.info02').remove();
        $('#safety').find('.rear_wheel_brake02').find('.info02').remove();
        $('#btn-order').find("#btn02").find('.info02').remove();

      }
    }
  </script>
  <script type="text/javascript">
    function delete_compare3(id3) {
      if (localStorage.getItem('compare3') != null) {
        var data3 = JSON.parse(localStorage.getItem('compare3'));
        var index3 = data3.findIndex(item => item.id3 === id3);
        data3.splice(index3, 1);
        localStorage.setItem('compare3', JSON.stringify(data3));
        $('.compare_icon3').find('.info03').remove();
        $('#vehicle-picker-3').removeClass('d-none');
        $('#dimension').find('.modal_size03').find('.info03').remove();
        $('#dimension').find('.modal_weight03').find('.info03').remove();
        $('#engine').find('.engine03').find('.info03').remove();
        $('#engine').find('.wattage03').find('.info03').remove()
        $('#engine').find('.engine_shutdown_function03').find('.info03').remove();
        $('#engine').find('.car_gearbox03').find('.info03').remove();
        $('#engine').find('.Fuel_Consumption03').find('.info03').remove();
        $('#ex_interior').find('.seats03').find('.info03').remove();
        $('#ex_interior').find('.lamp03').find('.info03').remove();
        $('#ex_interior').find('.automatic_lights03').find('.info03').remove();
        $('#ex_interior').find('.aluminum_alloy_lazang03').find('.info03').remove();
        $('#ex_interior').find('.air_conditioning03').find('.info03').remove();
        $('#ex_interior').find('.central_screen03').find('.info03').remove();
        $('#safety').find('.front_wheel_brake03').find('.info03').remove();
        $('#safety').find('.rear_wheel_brake03').find('.info03').remove();
        $('#btn-order').find("#btn03").find('.info03').remove();

      }
    }
  </script>

  <!-- Script sroll to top -->
  <script>
    myBtn = document.getElementById('btnScrollTop');
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        myBtn.style.display = "block";
      } else {
        myBtn.style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- Script open/close button info -->
  <script>
    $("#dimension-infor").on('click', function() {
      $("#dimension").toggle(200);
    });
    $("#engine-infor").on('click', function() {
      $("#engine").toggle(200);
    });
    $("#ex_interior-infor").on('click', function() {
      $("#ex_interior").toggle(200);
    });
    $("#safety-infor").on('click', function() {
      $("#safety").toggle(200);
    });
  </script>

  
</body>

@endsection