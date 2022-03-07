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

    @foreach($car_images as $car_image)
    <input type="hidden" id="CarImagePath" value="{{$car_image->image}}">
    @endforeach
    @if(Auth::check())
        <input type="hidden" class="url_Get_ModelInFo" value="/user/auth/getModelInfo">
        <input type="hidden" class="url_Get_ShowRoom" value="/user/auth/getShowRoom">
        <input type="hidden" class="url_Get_ShowRoomAddress" value="/user/auth/getShowRoomAddress">
        <input type="hidden" class="url_Get_Fees" value="/user/auth/CostEstimate/getFees">
    @else
        <input type="hidden" class="url_Get_ModelInFo" value="/user/getModelInfo">
        <input type="hidden" class="url_Get_ShowRoom" value="/user/getShowRoom">
        <input type="hidden" class="url_Get_ShowRoomAddress" value="/user/getShowRoomAddress">
        <input type="hidden" class="url_Get_Fees" value="/user/CostEstimate/getFees">
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
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="">Go To Mange Orders Page</a></span>
                        @else
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="">Đến Trang Quản Lý Đơn Hàng</a></span>
                        @endif
                   @else
                        @if(App::getLocale()=='en')
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="">Go To Search Order Status Page</a></span>
                        @else
                            <span class="success-message alert alert-success">{{Session::get('success')}}<a href="">Đến Trang Tra Cứu Đơn Hàng</a></span>
                        @endif
                   @endif
                @elseif(Session::has('fail'))
                        @if(App::getLocale()=='en')
                            <span class="alert alert-danger">{{Session::get('fail')}}</span>
                        @else
                            <span class="alert alert-danger">{{Session::get('fail')}}</span>
                        @endif
                @endif
                
                <!-- Modal -->
                <div class="modal fade" id="EmailSent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Order Success</h5>
                                    <button type="button" class="close XCloseBtn"  aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                An email sent!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cancelBtn">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                        
            </div>

            

        </div>
        <div class="d-flex d-flexCustom">
            @if(Auth::check())
                {{-- Customer Order --}}
                 <form action="{{route('user.CustomerSubmitOrder')}}" method="POST" id="submitOrder">
            @else
            {{-- Guest Order --}}
                <form action="{{route('user.GuestSubmitOrder')}}" method="POST" id="submitOrder">
            @endif
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
                         <input class="input" type="text" name="fullname" placeholder="{{__('Enter your Fullname')}}" required value="{{old('fullname')}}">
                         <span class="text-danger">@error('fullname'){{$message}}@enderror</span>
                    @endif
                  </label>

                  <label class="labelCustom">
                    <span>{{__('CostEstimate.Province/City')}}<span class="required">*</span></span>
                    <div class="Province">
                        <select class="" name="provinces" id="provinces" required>
                            <option id="SelectYourProVince" value="">{{__('Select Your Province/City')}}</option>
                            @foreach($provinces as $province)
                                <option value="{{$province->matp}}" >{{$province->name}}</option>
                           @endforeach
                           <span class="text-danger">@error('provinces'){{$message}}@enderror</span>
                        </select>
                    </div>
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
                        <td><a href="">Other Fees</a></td>
                        <td class="ortherFees" name='ortherFees' id="ortherFees" style="color: red">0 VND</td>
                    </tr>

                    <tr>
                        <td style="color: red">Total</td>
                        <td class="deposit" id="CostEstimatedPrice" style="color: red">0 VND</td>
                        
                      </tr>

                    <tr>
                      <td style="color: red">{{__('Deposit')}} (5%)</td>
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
              
                
                <button class="buttonCustom" id="buttonSubmit" type="submit" form="submitOrder">{{__('Place Order')}}</button>
            </div><!-- Yorder -->
        </div>
    </div>
    
    
@push('scriptUserOrder')
<script src="/js/profile/order.js"></script>
@endpush
@endsection

