@extends('dashboard.layouts.layout')
@section('content')
<link rel="stylesheet" href="/css/order.css">

<div class="container">
    <div class="title d-flex justify-content-between">
        <h2>Model Details</h2>
    </div>
    <div class="d-flex d-flexCustom">

        @foreach($show_model as $model_detail)
        <div class="d-flex" style="flex-direction: column">
            <div class="imgCarHolder">
                <img src="{{asset('storage/files/Image_Car/'. $model_detail->image)}}" id="showImageCar" alt="">
            </div>
            <table class="tableCustom">
                <tr>
                    <th colspan="2">{{$model_detail->model_name}}</th>
                </tr>
                <tr>
                    <td>Kích thước</td>
                    <td>{{$model_detail->size}}</td>
                </tr>
                <tr>
                    <td>Tự trọng/Tải trọng</td>
                    <td>{{$model_detail->weight}}</td>
                </tr>
                <tr>
                    <td>Loại động cơ</td>
                    <td>{{$model_detail->engine}}</td>
                </tr>
                <tr>
                    <td>Công suất tối đa</td>
                    <td>{{$model_detail->wattage}}</td>
                </tr>
                <tr>
                    <td>Phanh trước</td>
                    <td>{{$model_detail->front_wheel_brake}}</td>
                </tr>
                <tr>
                    <td>Phanh sau</td>
                    <td>{{$model_detail->rear_wheel_brake}}</td>
                </tr>
            </table>
            
            <a href="/user/order/{{$model_detail->model_id}}" style="color: white;"><button class="buttonCustom" id="buttonSubmit" >Đặt xe</button></a>

            <!-- <img src="{{asset('storage/files/Image_Car/'. $model_detail->image)}}" alt=""> -->
        </div>
        @endforeach
    </div>
</div>
@endsection