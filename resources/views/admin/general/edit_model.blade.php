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
       <h4> Cập nhật dòng xe</h4>
        <link rel="stylesheet" href="/css/account.css">
    </header>
    <div class="panel-body ">
    <div class="panel-body flex-container ">

        @foreach($edit_model as $key => $edit_value)

        <div class="position-center phat">
            <form class="" role="form" action="{{URL::to('admin/general/updatemodel/'.$edit_value->model_id)}}" method="POST">

                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputPassword1">Tên dòng xe</label>
                    <input type="text" value="{{$edit_value->model_name}}" class="form-control" id="exampleInputPassword1" name="model_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Loại xe</label>
                    <input type="text" value="{{$edit_value->car_type}}" class="form-control" id="exampleInputPassword1" name="car_type">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kích thước</label>
                    <input type="text" value="{{$edit_value->size}}" class="form-control" id="exampleInputPassword1" name="size">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Khối lượng</label>
                    <input type="text" value="{{$edit_value->weight}}" class="form-control" id="exampleInputPassword1" name="weight">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Loại động cơ</label>
                    <input type="text" value="{{$edit_value->engine}}" class="form-control" id="exampleInputPassword1" name="engine">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Công suất tối đa (Hp/rpm)</label>
                    <input type="text" value="{{$edit_value->wattage}}" class="form-control" id="exampleInputPassword1" name="wattage">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Hộp số</label>
                    <input type="text" value="{{$edit_value->car_gearbox}}" class="form-control" id="exampleInputPassword1" name="car_gearbox">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tự động tắt động cơ</label>
                    <select name="engine_shutdown_function" class="form-control input-sm m-bot15">
                        <option value="0">Có</option>
                        <option value="1">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tiêu thụ nhiên liệu (lít/100km)</label>
                    <input type="text" value="{{$edit_value->fuel_consumption}}" class="form-control" id="exampleInputPassword1" name="fuel_consumption">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ống xả đôi</label>
                    <select name="exhaust_pipe" class="form-control input-sm m-bot15">
                        <option value="0">Có</option>
                        <option value="1">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">La-zăng hợp kim nhôm</label>
                    <input type="text" value="{{$edit_value->alluminum_alloy_lazang}}" class="form-control" id="exampleInputPassword1" name="alluminum_alloy_lazang">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Đèn chiếu</label>
                    <input type="text" value="{{$edit_value->lamp}}" class="form-control" id="exampleInputPassword1" name="lamp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chế độ đèn tự động</label>
                    <select name="automatic_lights" class="form-control input-sm m-bot15">
                        <option value="0">Có</option>
                        <option value="1">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chỗ ngồi</label>
                    <input type="text" value="{{$edit_value->seat}}" class="form-control" id="exampleInputPassword1" name="seat">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Màn hình trung tâm</label>
                    <input type="text" value="{{$edit_value->central_screen}}" class="form-control" id="exampleInputPassword1" name="central_screen">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Hệ thống diều hòa</label>
                    <input type="text" value="{{$edit_value->air_conditioning}}" class="form-control" id="exampleInputPassword1" name="air_conditioning">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phanh trước</label>
                    <input type="text" value="{{$edit_value->front_wheel_brake}}" class="form-control" id="exampleInputPassword1" name="front_wheel_brake">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phanh sau</label>
                    <input type="text" value="{{$edit_value->rear_wheel_brake}}" class="form-control" id="exampleInputPassword1" name="rear_wheel_brake">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Giá</label>
                    <input type="text" value="{{$edit_value->price}}" class="form-control" id="exampleInputPassword1" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kích hoạt giao diện</label>
                    <select name="active" class="form-control input-sm m-bot15">
                        <option value="active">Có</option>
                        <option value="inactive">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kích hoạt dòng xe</label>
                    <select name="released" class="form-control input-sm m-bot15">
                        <option value="active">Có</option>
                        <option value="inactive">Không</option>
                    </select>
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Màu</label>
                    <select name="color" class="form-control input-sm m-bot15">
                        <option value="white">Trắng</option>
                        <option value="red">Đỏ</option>
                        <option value="blue">Xanh</option>
                        <option value="black">Đen</option>
                    </select>
                </div> --}}
                
                <div class="form-group">
                    <label for="exampleInputFile">Thêm ảnh</label>
                    <input type="file" id="exampleInputFile" name="image" value="{{$edit_value->image}}">
                    <span><strong>Hình hiện tại: </strong>{{$edit_value->image}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Thêm ảnh động</label>
                    <input type="file" id="exampleInputFile" name="gif" value="{{$edit_value->gif}}">
                    <span><strong>Hình hiện tại: </strong>{{$edit_value->gif}}</span>
                </div>
                <button type="submit" name="edit_model" class="btn btn-info">Cập nhật dòng xe</button>
            </form>
        </div>
        @endforeach

</section>


@endsection
@section('script-section')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajx/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
	$('.mydatatable').DataTable();
</script>

<!--  -->
<script src="/backend/js/bootstrap.js"></script>
<script src="/backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/backend/js/scripts.js"></script>
<script src="/backend/js/jquery.slimscroll.js"></script>
<script src="/backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="/backend/js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="/backend/js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});

</script>
@endsection