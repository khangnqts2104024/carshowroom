@extends('dashboard.layouts.layout')
@section('content')
@section('page_title')
    {{ "Model Details" }}
@endsection
    <link rel="stylesheet" href="/css/order.css">

    <div class="container">
        <div class="title d-flex justify-content-between">
            <h2>Model Details</h2>
        </div>
        <div class="d-flex d-flexCustom align-items-center flex-column">

            @foreach ($show_model as $model_detail)
                <div class="d-flex" style="flex-direction: column;">
                    <div class="imgCarHolder-phat">
                        <img src="{{ asset('storage/files/Image_Car/' . $model_detail->image) }}" id="showImageCar"
                            alt="">
                    </div>
                    <table class="tableCustom">
                        <tr>
                            <th colspan="2">{{ $model_detail->model_name }}</th>
                        </tr>
                        <tr>
                            <td>{{__('Size')}}</td>
                            <td>{{ $model_detail->size }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Weight')}}</td>
                            <td>{{ $model_detail->weight }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Engine')}}</td>
                            <td>{{ $model_detail->engine }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Wattage')}}</td>
                            <td>{{ $model_detail->wattage }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Front wheel brake')}}</td>
                            <td>{{ $model_detail->front_wheel_brake }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Rear wheel brake')}}</td>
                            <td>{{ $model_detail->rear_wheel_brake }}</td>
                        </tr>
                    </table>

                    @if(Auth::check())
                    <a href="/user/auth/order/{{ $model_detail->model_id }}" style="color: white;"><button
                        class="buttonCustom" id="buttonSubmit">Đặt xe</button></a>

                    @else
                    <a href="/user/order/{{ $model_detail->model_id }}" style="color: white;"><button
                        class="buttonCustom" id="buttonSubmit">{{__('Order Car')}}</button></a>

                    @endif
                    
                    <!-- <img src="{{ asset('storage/files/Image_Car/' . $model_detail->image) }}" alt=""> -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
