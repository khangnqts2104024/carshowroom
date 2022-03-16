@extends('layouts_admin.layoutadmin')
@section('title', 'all model')
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

  
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý dòng xe</h3>
                </div>
                <div class="option-container">
                    <a href="{{url('admin/general/addmodel')}}">
                        <div class="option"> Thêm dòng xe</div>
                    </a>
                </div>

                <div class="card-body">
                <!-- <div class="table-responsive phat"> -->
                <table id="myTable" class="table table-striped b-t b-light mydatatable">
                    <thead>
                        <tr>

                            <th style="width:30px;">
                                STT

                            </th>
                            <th>Tên dòng xe</th>
                            <th>Mã dòng xe</th>
                            <th>Màu</th>
                            <th>Kích hoạt</th>

                            <th style="width:50px;">Thông Tin chi tiết</th>
                            <th style="width:50px;">Xóa Dòng Xe</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $x=1 @endphp
                        @foreach($all_model as $key => $model)
                        <tr>
                        <td>{{ $x++ }}</td>    
                            <td>{{$model -> model_name}}</td>
                            <td><span class="text-ellipsis">{{$model -> model_id}}</span></td>
                            <td>
                                <span class="text-ellipsis">
                                    <?php
                                        if ($model -> color == 'red') { 
                                            echo 'Đỏ';
                                        } else if ($model -> color == 'blue') {
                                            echo 'Xanh';
                                        } else if ($model -> color == 'white'){
                                            echo 'Trắng';
                                        } else {
                                            echo 'Đen';
                                        }
                                    ?>
                                </span>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <?php
                                        if ($model -> active == 'active') { 
                                            echo 'Có';
                                        }
                                        else {
                                            echo 'Không';
                                        }
                                    ?>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <a href="{{URL::to('admin/general/editmodel/'.$model -> model_id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square text-success text-active" style="font-size: 30px;"></i>
                                </a></td>
                               <td style="text-align: center;"> <a onclick="return confirm('Bạn có muốn xóa?')" href="{{URL::to('admin/general/deletemodel/'.$model -> model_id)}}" class="active styling-edit" ui-toggle-class="">

                                    <i class="fa fa-times text-danger text" style="font-size: 30px;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <!-- </div> -->
                </div>

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
 
        <input id="massage1" type="text" hidden value="{{Session::get('message1')}}">
 


        </div>
    </div>
</section>
@endsection
</script>@section('script-section')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajx/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
	$('.mydatatable').DataTable();
    var massage=document.getElementById('massage');
    if(document.getElementById('massage').value!=''){alert(massage.value);}
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

