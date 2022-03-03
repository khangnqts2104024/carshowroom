@extends('layouts.layout')
@section('content')

<!-- Bootstrap CSS -->

<link rel="stylesheet" href="/css/compare.css" />


<body>
  <!-- Header-->

  <!-- Menu-->

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
            <a id="vehicle-picker-1" class="vehicle-picker" href data-index="0" data-toggle="modal" data-target="#modal_compare" data="1" onclick="add_compare">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">Lựa chọn xe</p>
            </a>
          </td>
          <td scope="col">
            <div class="compare_icon"></div>
            <a id="vehicle-picker-1" class="vehicle-picker" href="" data-index="1" data-toggle="modal" data-target="#modal_compare" data="2">
              <i class="bi bi-zoom-in text-center"></i>
              <p class="text-center">Lựa chọn xe</p>
            </a>
          </td>
          <td scope="col">
            <div class="compare_icon"></div>
            <a id="vehicle-picker-1" class="vehicle-picker" href="" data-index="2" data-toggle="modal" data-target="#modal_compare" data="3">
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
                <td data-index="0" data-section="dimension" data-field="size"></td>
                <td data-index="1" data-section="dimension" data-field="size"></td>
                <td data-index="2" data-section="dimension" data-field="size"></td>
              </tr>

              <tr>
                <th>Tự trọng/Tải trọng (Kg)</th>
                <td data-index="0" data-section="dimension" data-field="weight"></td>
                <td data-index="1" data-section="dimension" data-field="weight"></td>
                <td data-index="2" data-section="dimension" data-field="weight"></td>
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
                <td data-index="0" data-section="engine" data-field="engine"></td>
                <td data-index="1" data-section="engine" data-field="engine"></td>
                <td data-index="2" data-section="engine" data-field="engine"></td>
              </tr>

              <tr>
                <th>Công Xuất Tối Đa</th>
                <td data-index="0" data-section="engine" data-field="wattage"></td>
                <td data-index="1" data-section="engine" data-field="wattage"></td>
                <td data-index="2" data-section="engine" data-field="wattage"></td>
              </tr>
              <tr>
                <th>Chức Năng Tự Động Tắt Động Cơ</th>
                <td data-index="0" data-section="engine" data-field="engine_shutdown_function"></td>
                <td data-index="1" data-section="engine" data-field="engine_shutdown_function"></td>
                <td data-index="2" data-section="engine" data-field="engine_shutdown_function"></td>
              </tr>

              <tr>
                <th>Hôp số</th>
                <td data-index="0" data-section="engine" data-field="car_gearbox"></td>
                <td data-index="1" data-section="engine" data-field="car_gearbox"></td>
                <td data-index="2" data-section="engine" data-field="car_gearbox"></td>
              </tr>

              <tr>
                <th>Mức tiêu thụ nhiên liệu</th>
                <td data-index="0" data-section="engine" data-field="Fuel_Consumption"></td>
                <td data-index="1" data-section="engine" data-field="Fuel_Consumption"></td>
                <td data-index="2" data-section="engine" data-field="Fuel_Consumption"></td>
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
                <td data-index="0" data-section="ex_interior" data-field="seats"></td>
                <td data-index="1" data-section="ex_interior" data-field="seats"></td>
                <td data-index="2" data-section="ex_interior" data-field="seats"></td>
              </tr>
              <tr>
                <th>Đèn Chiếu</th>
                <td data-index="0" data-section="ex_interior" data-field="lamp"></td>
                <td data-index="1" data-section="ex_interior" data-field="lamp"></td>
                <td data-index="2" data-section="ex_interior" data-field="lamp"></td>
              </tr>

              <tr>
                <th>Chế Độ Đèn Tự Động</th>
                <td data-index="0" data-section="ex_interior" data-field="automatic_lights"></td>
                <td data-index="1" data-section="ex_interior" data-field="automatic_lights"></td>
                <td data-index="2" data-section="ex_interior" data-field="automatic_lights"></td>
              </tr>
              <tr>
                <th>Lazang Hợp Kim Nhôm</th>
                <td data-index="0" data-section="ex_interior" data-field="aluminum_alloy_lazang"></td>
                <td data-index="1" data-section="ex_interior" data-field="aluminum_alloy_lazang"></td>
                <td data-index="2" data-section="ex_interior" data-field="aluminum_alloy_lazang"></td>
              </tr>
              <tr>
                <th>Hệ Thống Điều Hòa</th>
                <td data-index="0" data-section="ex_interior" data-field="air_conditioning"></td>
                <td data-index="1" data-section="ex_interior" data-field="air_conditioning"></td>
                <td data-index="2" data-section="ex_interior" data-field="air_conditioning"></td>
              </tr>
              <tr>
                <th>Màn Hình Trung Tâm</th>
                <td data-index="0" data-section="ex_interior" data-field="central_screen"></td>
                <td data-index="1" data-section="ex_interior" data-field="central_screen"></td>
                <td data-index="2" data-section="ex_interior" data-field="central_screen"></td>
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
                <td data-index="0" data-section="safety" data-field="front_wheel_brake"></td>
                <td data-index="1" data-section="safety" data-field="front_wheel_brake"></td>
                <td data-index="2" data-section="safety" data-field="front_wheel_brake"></td>
              </tr>

              <tr>
                <th>Phanh Sau</th>
                <td data-index="0" data-section="safety" data-field="rear_wheel_brake"></td>
                <td data-index="1" data-section="safety" data-field="rear_wheel_brake"></td>
                <td data-index="2" data-section="safety" data-field="rear_wheel_brake"></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>



      <!-- Modal -->
      <div class="modal fade" id="modal_compare" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                @foreach($cars as $car)
                <li class="list-group-item">
                  <a href="" class="d-flex" data-model="" data-edition="" 
                      id="{{$car->model_id}}">
                    <div>
                      <input type="checkbox" class="car-select">{{$car->model_id}}
                    </div>
                    <div>{{$car->car_type}}</div>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <script>
    $('#exampleModal').on('show.bs.modal', event => {
      var button = $(event.relatedTarget);
      var modal = $(this);
      console.log(event)
    });
  </script>
  </div>

  <script>
    var acc = document.getElementsByClassName("btn-block");
    var i;
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");

      });
    }
  </script>
  <script>
    $(document).ready(function() {
        $('.car-select').on('click', function(e){
          e.preventDefault();
          var model_id = $('.id')
        });

     });
  
  </script>


</body>

@endsection;