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
    <div class="report-container">
        <!-- Button trigger modal -->
        <button id="chart1" type="button" class="manage-option" data-toggle="modal" data-target="#donutmodel">
            <!-- click -->
            <div class="">
                <i class="fa-solid fa-chart-pie"></i>
                <p>Doanh Thu Theo Khu Vực</p>
            </div>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="donutmodel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Doanh Thu Theo Khu Vưc</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Body -->
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="donutChart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 425px;" width="600px" height="300" class="chartjs-render-monitor"></canvas>
                            <div>
                                <p>Khu Vực Miền Bắc: </p>
                                <p>Khu Vực Miền Trung: </p>
                                <p>Khu Vực Miền Nam: </p>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <button id="chart2" type="button" class="manage-option" data-toggle="modal" data-target="#linemodel">
            <!-- click -->
            <div class="">
                <i class="fa-solid fa-chart-line"></i>
                <p>Doanh Thu Theo Quý</p>
            </div>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="linemodel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Doanh Thu Theo Qúy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Body -->
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="lineChart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 425px;" width="600px" height="300" class="chartjs-render-monitor"></canvas>
                            <div>
                                <p>Quý 1: </p>
                                <p>Quý 2: </p>
                                <p>Quý 3: </p>
                                <p>Quý 4: </p>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <button id="chart3" type="button" class="manage-option" data-toggle="modal" data-target="#piemodel">
            <!-- click -->
            <div class="">
                <i class="fa-solid fa-chart-pie"></i>
                <p>Tỷ Lệ Khách Hàng</p>
            </div>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="piemodel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tỷ Lệ Khách Hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Body -->
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="pieChart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 425px;" width="600px" height="300" class="chartjs-render-monitor"></canvas>
                            <div>
                                <p>Khách Vãn Lai: </p>
                                <p>Thành Viên: </p>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
@section('script-section')

<script type="text/javascript">
   var btn=document.getElementById("chart1");
   var btn1=document.getElementById("chart2");
   var btn2=document.getElementById("chart3");
    var donutChart = document.getElementById('donutChart');
    var lineChart = document.getElementById('lineChart');
    var pieChart = document.getElementById('pieChart');
        btn.addEventListener("click", function () {
          
           
            var myChart = new Chart(donutChart, {
                type: 'doughnut',
                data: {
                    labels: ['Miền Bắc','Miền Trung','Miền Nam'],
                    datasets: [
          {
            data: [400,600,300],

            // thay so liệu vào đây
            backgroundColor : ['#f56954', '#3c8dbc', '#d2d6de'],
          }
        ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                }
            });
        });

        // chart 2
        btn1.addEventListener("click", function () {
          
           
          var myChart = new Chart(lineChart, {
              type: 'line',
              data: {
                  labels: ['Quý 1','Quý 2','Quý 3','Quý 4'],
                  datasets: [
                        {
                            label: 'Xe Đã Bán',
                            data: [80, 30, 63, 20],
                            backgroundColor: 'midnightblue',
                            borderColor: 'rgb(240, 132, 31);',
                            borderWidth: 1
                        }
                    ]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  },
              }
          });
      });
    //   chart 3
      btn2.addEventListener("click", function () {
          
           
          var myChart = new Chart(pieChart, {
              type: 'pie',
              data: {
                  labels: ['Thành Viên','Khách'],
                  datasets: [
        {
          data: [1600,300],

          // thay so liệu vào đây
          backgroundColor : ['#3c8dbc', '#d2d6de'],
        }
      ]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  },
              }
          });
      });

        
     

</script>

@endsection