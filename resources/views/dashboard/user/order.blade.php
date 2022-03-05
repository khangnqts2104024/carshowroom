@extends('dashboard.layouts.layout')
@section('content')
    <link rel="stylesheet" href="/css/order.css">
    <input type="hidden" class="idToken" value="{{ csrf_token() }}">
    <input type="hidden" id="model_id" value="{{$car_id_fromlayout}}">
    @foreach($car_images as $car_image)
    <input type="hidden" id="CarImagePath" value="{{$car_image->image}}">
    @endforeach
    @if(Auth::check())
        <input type="hidden" class="url_Get_ModelInFo" value="/user/auth/getModelInfo">
        <input type="hidden" class="url_Get_ShowRoom" value="/user/auth/getShowRoom">
        <input type="hidden" class="url_Get_ShowRoomAddress" value="/user/auth/getShowRoomAddress">
    @else
        <input type="hidden" class="url_Get_ModelInFo" value="/user/getModelInfo">
        <input type="hidden" class="url_Get_ShowRoom" value="/user/getShowRoom">
        <input type="hidden" class="url_Get_ShowRoomAddress" value="/user/getShowRoomAddress">
    @endif
    
    <div class="container">
        <div class="title d-flex justify-content-between">
            <h2>{{__('Product Order Form')}}</h2>
            <div class="message">
                
                @if(Session::get('success'))
                    @if(App::getLocale()=='en')
                         <span class="alert alert-success">{{Session::get('success')}}<a href="">Go To Mange Orders</a></span>
                    @else
                        <span class="alert alert-success">{{Session::get('success')}}<a href="">Đến Trang Quản Lý Đơn Hàng</a></span>
                    @endif
                @endif
                @if(Session::has('fail'))
                        @if(App::getLocale()=='en')
                            <span class="alert alert-danger">{{Session::get('fail')}}</span>
                        @else
                            <span class="alert alert-danger">{{Session::get('fail')}}</span>
                        @endif
                @endif
                
            </div>
        </div>
        <div class="d-flex d-flexCustom">
            <form action="{{route('user.CustomerSubmitOrder')}}" method="POST" id="submitOrder">
                @csrf
                <div class="d-flex" style="flex-direction: column">
                  <label class="labelCustom">
                    <span class="fname">{{__('Full Name')}} <span class="required">*</span></span>
                    @if(isset($user))
                        @foreach($user as $userinfo)
                             <input class="input" type="text" name="fullname" placeholder="{{__('Enter your Fullname')}}" required value="{{$userinfo->fullname}}">
                             <input class="input" type="hidden" name="customer_id"  value="{{$userinfo->customer_id}}">
                         @endforeach
                         <span class="text-danger">@error('fullname'){{$message}}@enderror</span>
                    @else
                         <input class="input" type="text" name="fullname" placeholder="{{__('Enter your Fullname')}}" required value="">
                         <span class="text-danger">@error('fullname'){{$message}}@enderror</span>
                    @endif
                  </label>

                  <label class="labelCustom">
                    <span>{{__('Citizen ID')}}<span class="required">*</span></span>
                    @if(isset($user))
                        @foreach($user as $userinfo)
                            <input class="input" type="text" name="citizen_id" placeholder="{{__('Enter your CitizenID')}}" required value="{{$userinfo->citizen_id}}">
                        @endforeach
                        <span class="text-danger">@error('citizen_id'){{$message}}@enderror</span>
                    @else
                         <input class="input" type="text" required name="citizen_id" placeholder="{{__('Enter your CitizenID')}}" value="">
                         <span class="text-danger">@error('citizen_id'){{$message}}@enderror</span>
                    @endif
                </label>

                  <label class="labelCustom">
                    <span>{{__('Phone Number')}}<span class="required">*</span></span>
                    @if(isset($user))
                        @foreach($user as $userinfo)
                            <input class="input" type="text" name="phone_number" placeholder="{{__('Enter your Phone Number')}}" required value="{{$userinfo->phone_number}}">
                        @endforeach
                        <span class="text-danger">@error('phone_number'){{$message}}@enderror</span>
                    @else
                         <input class="input" type="text" required name="phone_number" placeholder="{{__('Enter your Phone Number')}}" value="">
                         <span class="text-danger">@error('phone_number'){{$message}}@enderror</span>
                    @endif
                </label>

                <label class="labelCustom">
                    <span>{{__('Address')}} <span class="required">*</span></span>
                    @if(isset($user))
                         @foreach($user as $userinfo)
                             <input class="input" type="text" name="address" required placeholder="{{__('House number and street name')}}" value="{{$userinfo->address}}">
                        @endforeach
                        <span class="text-danger">@error('address'){{$message}}@enderror</span>
                    @else
                    <input class="input" type="text" name="address"  placeholder="{{__('House number and street name')}}" value="" required>
                    <span class="text-danger">@error('address'){{$message}}@enderror</span>
                    @endif
                    
                    
                </label>

                <label class="labelCustom">
                    <span>{{__('Email Address')}} <span class="required">*</span></span>
                    @if(isset($user))
                        @foreach($user as $userinfo)
                            <input class="input" type="email" name="email" placeholder="{{__('Enter your Email')}}" value="{{$userinfo->email}}" required>
                        @endforeach   
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    @else
                    <input class="input" type="email" name="email" placeholder="{{__('Enter your Email')}}" value="" required>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    @endif
                    
                    
                </label>

                <label class="labelCustom">
                    <span>{{__('Region')}}<span class="required">*</span></span>
                    <select  name="warehouses" id="warehouses" required>
                        <option value="select" >{{__('Select your Region')}}</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{$warehouse->id}}" >{{$warehouse->warehouse_name}}</option>
                        @endforeach
                    </select>  
                    <span class="text-danger">@error('warehouses'){{$message}}@enderror</span>
                </label>

                <label class="labelCustom">
                    <span>{{__('Model')}}<span class="required">*</span></span>
                      <div class="Model">
                          <select  name="models" id="models" required>
                              
                              <option id="SelectYourModel" value="{{__('Select your Model')}}">{{__('Select your Model')}}</option>
                                @foreach($models as $model)
                                 <option value="{{$model->model_id}}" >{{$model->model_name}}</option>
                                @endforeach
                                
                            </select>   
                            <span class="text-danger">@error('models'){{$message}}@enderror</span>
                      </div>
                </label>

                <label class="labelCustom">
                    <span>{{__('ShowRoom')}}<span class="required">*</span></span>
                    <select  name="showrooms" id="showrooms" required>
                    </select>  
                    <span class="text-danger">@error('showrooms'){{$message}}@enderror</span>
                </label>
                
                <label class="labelCustom">
                    <span>{{__('ShowRoom Address')}} <span class="required" required>*</span></span>
                    <textarea name="showroomAddressText" id="showroomAddressText" cols="48" rows="2" readonly ></textarea>
                </label>
                
                
                <input type="hidden" name="subtotal_price" id="subtotal_price" value="">

                <div class="imgCarHolder">
                  <img src="/image/logoVinfast.png" id="showImageCar" alt="">
                </div>
                </div>
            </form>
            <div class="Yorder">
                <table class="tableCustom">
                    <tr>
                        <th colspan="2">{{__('Your Order')}}</th>
                    </tr>
                    <tr>
                        <td class="carname"></td>
                        <td class="carprice"></td>
                    </tr>

                    <tr>
                        <td>{{__('Notional Price')}}</td>
                        <td class="subtotal" name='subtotal' style="color: red">0 VND</td>
                        
                    </tr>

                    <tr>
                      <td style="color: red">{{__('Deposit')}} (20%)</td>
                      <td class="deposit" style="color: red">0 VND</td>
                    </tr>

                   
                    <tr>
                        <td>{{__('Shipping')}}</td>
                        <td>{{__('Free Shipping')}}</td>
                    </tr>
                </table>
                <div>
                    <input type="radio" name="dbt" value="dbt" checked> {{__('Cash Directly')}}
                </div>
                <p class="textPayment">
                    Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                    Your order will not be shipped until the funds have cleared in our account.
                </p>
              
                
                <button class="buttonCustom" type="submit" form="submitOrder">{{__('Place Order')}}</button>
            </div><!-- Yorder -->
        </div>
    </div>
    
    
@push('scriptUserOrder')
<script src="/js/profile/order.js"></script>
@endpush
@endsection

