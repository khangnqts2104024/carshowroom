@extends('dashboard.layouts.layout')
@section('content')


    <link rel="stylesheet" href="/css/order.css">
    <input type="hidden" class="idToken" value="{{ csrf_token() }}">
   

    @if(isset($car_id_fromlayout))
        <input type="hidden" id="model_id" value="{{$car_id_fromlayout}}">
    @endif

    @if(isset($province_matp_cost_estimate))
         <input type="hidden"  id="province_matp_cost_estimate" value="{{$province_matp_cost_estimate}}">
    @endif
         <input type="hidden" id="order_code" value="{{session()->get('order_code')}}">

    @if(isset($car_images))
        @foreach($car_images as $car_image)
        <input type="hidden" id="CarImagePath" value="{{$car_image->image}}">
        @endforeach
    @endif
    @if(Auth::check())
        <input type="hidden" class="url_Get_ModelInFo" value="/user/auth/getModelInfo">
        <input type="hidden" class="url_Get_ShowRoom" value="/user/auth/getShowRoom">
        <input type="hidden" class="url_Get_ShowRoomAddress" value="/user/auth/getShowRoomAddress">
        <input type="hidden" class="url_Get_Fees" value="/user/auth/CostEstimate/getFees">
        <input type="hidden" class="url_Submit_Order" value="/user/auth/CustomerSubmitOrder">
    @else
        <input type="hidden" class="url_Get_ModelInFo" value="/user/getModelInfo">
        <input type="hidden" class="url_Get_ShowRoom" value="/user/getShowRoom">
        <input type="hidden" class="url_Get_ShowRoomAddress" value="/user/getShowRoomAddress">
        <input type="hidden" class="url_Get_Fees" value="/user/CostEstimate/getFees">
        <input type="hidden" class="url_Submit_Order" value="/user/SubmitOrder">
    @endif
    
    <div class="container">
        <div class="title d-flex justify-content-between">
            <h2>{{__('Product Order Form')}}</h2>
            <div class="message">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @if(Session::get('success'))
                   @if(Auth::check())
                        @if(App::getLocale()=='en')
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="http://127.0.0.1:8000/user/profile/auth/order_history">&nbsp; Go To Mange Orders Page</a></span>
                        @else
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="http://127.0.0.1:8000/user/profile/auth/order_history">&nbsp; Đến Trang Quản Lý Đơn Hàng</a></span>
                        @endif
                   @else
                        @if(App::getLocale()=='en')
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="http://127.0.0.1:8000/user/order_tracking">&nbsp; Go To Search Order Status Page</a></span>
                        @else
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="http://127.0.0.1:8000/user/order_tracking">&nbsp; Đến Trang Tra Cứu Đơn Hàng</a></span>
                        @endif
                   @endif
                @elseif(Session::has('fail'))
                        @if(App::getLocale()=='en')
                            <span class="alert alert-danger">{{Session::get('fail')}}</span>
                        @else
                            <span class="alert alert-danger">{{Session::get('fail')}}</span>
                        @endif
                @endif
                <!-- Modal HTML -->
                <div id="EmailSent" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="icon-box">
                                    <i class="material-icons">&#10003;</i>
                                </div>				
                                <h4 class="modal-title w-100">{{__('Awesome!')}}</h4>	
                            </div>
                            <div class="modal-body">
                                <p class="text-center">{{__('Your order is successful. Check your email for details.')}}</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div> 
                        
            </div>

            

        </div>
        <div class="d-flex d-flexCustom">
            @if(Auth::check())
                {{-- Customer Order --}}
                 <form action="{{route('user.CustomerSubmitOrder')}}" method="post" id="submitOrder">
            @else
            {{-- Guest Order --}}
                <form action="{{route('user.GuestSubmitOrder')}}" method="post" id="submitOrder">
            @endif
                @csrf
                <div class="d-flex" style="flex-direction: column">
                  <label class="labelCustom">
                    <span class="fname">{{__('Full Name')}} <span class="required">*</span></span>
                    @if(isset($user))
                        @foreach($user as $userinfo)
                             <input  class="input rounded   shadow-sm" type="text" id="fullname" name="fullname" placeholder="{{__('Enter your Fullname')}}" required value="{{$userinfo->fullname}}">
                             <input class="input" type="hidden" name="customer_id"  value="{{$userinfo->customer_id}}">
                         @endforeach
                         <span class="text-danger">@error('fullname'){{$message}}@enderror</span>
                    @else
                         <input class="input rounded   shadow-sm" type="text" id="fullname" name="fullname" placeholder="{{__('Enter your Fullname')}}" required value="{{old('fullname')}}">
                         <span class="text-danger">@error('fullname'){{$message}}@enderror</span>
                    @endif
                  </label>

                  <label class="labelCustom">
                    <span>{{__('CostEstimate.Province/City')}}<span class="required">*</span></span>
                    <div class="Province">
                        <select class="rounded shadow-sm" name="provinces" id="provinces" required>
                            <option id="SelectYourProVince" value="">{{__('Select Your Province/City')}}</option>
                          @if(isset($provinces))
                            @foreach($provinces as $province)
                                 <option  value="{{$province->matp}}" >{{$province->name}}</option>
                             @endforeach
                          @endif
   
                           <span class="text-danger">@error('provinces'){{$message}}@enderror</span>
                        </select>
                    </div>
                </label>

                  <label class="labelCustom">
                    <span>{{__('Phone Number')}}<span class="required">*</span></span>
                    @if(isset($user))
                        @foreach($user as $userinfo)
                            <input class="input rounded   shadow-sm" type="text" name="phone_number" placeholder="{{__('Enter your Phone Number')}}" required value="{{$userinfo->phone_number}}">
                        @endforeach
                        <span class="text-danger">@error('phone_number'){{$message}}@enderror</span>
                    @else
                         <input class="input rounded   shadow-sm" type="text" required name="phone_number" placeholder="{{__('Enter your Phone Number')}}" value="">
                         <span class="text-danger">@error('phone_number'){{$message}}@enderror</span>
                    @endif
                </label>

                <label class="labelCustom">
                    <span>{{__('Address')}} <span class="required">*</span></span>
                    @if(isset($user))
                         @foreach($user as $userinfo)
                             <input class="input rounded   shadow-sm" type="text" name="address" required placeholder="{{__('House number and street name')}}" value="{{$userinfo->address}}">
                        @endforeach
                        <span class="text-danger">@error('address'){{$message}}@enderror</span>
                    @else
                    <input class="input rounded   shadow-sm" type="text" name="address"  placeholder="{{__('House number and street name')}}" value="" required>
                    <span class="text-danger">@error('address'){{$message}}@enderror</span>
                    @endif
                    
                    
                </label>

                <label class="labelCustom">
                    <span>{{__('Email Address')}} <span class="required">*</span></span>
                    @if(isset($user))
                        @if(Auth::check())
                            @foreach($user as $userinfo)
                                <input readonly class="input rounded   shadow-sm" type="email" id="email" name="email" placeholder="{{__('Enter your Email')}}" value="{{$userinfo->email}}" required>
                            @endforeach   
                        @else
                            @foreach($user as $userinfo)
                                <input class="input rounded   shadow-sm" type="email" id="email" name="email" placeholder="{{__('Enter your Email')}}" value="{{$userinfo->email}}" required>
                            @endforeach   
                        @endif
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    @else
                        <input class="input rounded   shadow-sm" type="email" name="email" placeholder="{{__('Enter your Email')}}" value="" required>
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    @endif
                    
                    
                </label>

                <label class="labelCustom">
                    <span>{{__('Region')}}<span class="required">*</span></span>
                    <select class="rounded   shadow-sm"  name="warehouses" id="warehouses" required>
                        <option value="" >{{__('Select your Region')}}</option>
                        @if(isset($warehouses))
                            @foreach($warehouses as $warehouse)
                                 <option value="{{$warehouse->id}}" >{{$warehouse->warehouse_name}}</option>
                             @endforeach
                        @endif
                    </select>  
                    <span class="text-danger">@error('warehouses'){{$message}}@enderror</span>
                </label>

                <label class="labelCustom">
                    <span>{{__('Model')}}<span class="required">*</span></span>
                      <div class="Model">
                          <select class="rounded   shadow-sm"  name="models" id="models" required>
                            
                              <option id="SelectYourModel" value="">{{__('Select your Model')}}</option>
                                @if(isset($models))
                                    @foreach($models as $model)
                                         <option  value="{{$model->model_id}}" >{{$model->model_name}} - {{$model->color}}</option>
                                    @endforeach
                                @endif
                                
                            </select>   
                            <span class="text-danger">@error('models'){{$message}}@enderror</span>
                      </div>
                </label>

                <label class="labelCustom">
                    <span>{{__('ShowRoom')}}<span class="required">*</span></span>
                    <select class="rounded shadow-sm" name="showrooms" id="showrooms" required>
                    </select>  
                    <span class="text-danger">@error('showrooms'){{$message}}@enderror</span>
                </label>
                
                <label class="labelCustom">
                    <span>{{__('ShowRoom Address')}} <span class="required" required>*</span></span>
                    <textarea name="showroomAddressText" id="showroomAddressText" cols="48" rows="2" readonly ></textarea>
                </label>

                <input type="hidden" name="OrderPrice" id="OrderPrice" value="">

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
                        <td><a href="">{{__("Quantity")}}</a></td>
                        <td class="Quantity" name='Quantity' id="Quantity" style="color: rgb(3,86,179)">1</td>
                    </tr>

                    <tr>
                        <td><a href="">{{__("Other Fees")}}</a></td>
                        <td class="ortherFees" name='ortherFees' id="ortherFees" style="color: rgb(3,86,179)">0 VND</td>
                    </tr>

                    @if(Auth::check())
                        <tr>
                            <td><a href="">{{__("Offers")}}</a></td>
                            <td class="offers_span" name='offers_span' id="offers_span" style="color: rgb(3,86,179)">0 VND</td>
                            <input type="hidden" id="offer_price" value="member">
                        </tr>
                    
                    @endif


                    <tr>
                        <td style="color: red">Total</td>
                        <td class="deposit" id="CostEstimatedPrice" style="color: red">0 VND</td>
                        
                      </tr>

                    <tr>
                      <td style="color: red">{{__('Deposit')}} (1%)</td>
                      <td class="deposit" style="color: red">0 VND</td>
                    </tr>

                   
                    <tr>
                        <td>{{__('Shipping')}}</td>
                        <td>{{__('Free Shipping')}}</td>
                    </tr>
                </table>
                {{-- <div>
                    <input type="radio" name="dbt" value="dbt" checked> {{__('Cash Directly')}}
                </div>
                <p class="textPayment">
                    Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                    Your order will not be shipped until the funds have cleared in our account.
                </p> --}}
              
                
                <button class="buttonCustom" id="buttonSubmit" type="submit" form="submitOrder">{{__('Place Order')}}</button>
            </div><!-- Yorder -->
        </div>
    </div>
    
    
@push('scriptUserOrder')
<script src="/js/profile/order.js"></script>
@endpush
@endsection

