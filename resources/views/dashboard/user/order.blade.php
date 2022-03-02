@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="/css/order.css">
    <input type="hidden" class="idToken" value="{{ csrf_token() }}">

    <div class="container">
        <div class="title">
            <h2>Product Order Form</h2>
        </div>
        <div class="d-flex d-flexCustom">
            <form action="{{route('user.submitOrder')}}" method="POST" id="submitOrder">
                @csrf
                <div class="d-flex" style="flex-direction: column">
                  <label class="labelCustom">
                    <span class="fname">Full Name <span class="required">*</span></span>
                    @foreach($user as $userinfo)
                        <input class="input" type="text" name="fullname" value="{{$userinfo->fullname}}">
                        <input class="input" type="hidden" name="customer_id" value="{{$userinfo->customer_id}}">
                    @endforeach
                  </label>

                  <label class="labelCustom">
                    <span>Phone Number<span class="required">*</span></span>
                    @foreach($user as $userinfo)
                        <input class="input" type="text" name="phone_number" value="{{$userinfo->phone_number}}">
                    @endforeach
                    
                </label>

                <label class="labelCustom">
                    <span>Address <span class="required">*</span></span>
                    @foreach($user as $userinfo)
                        <input class="input" type="text" name="address" placeholder="House number and street name" value="{{$userinfo->address}}" required>
                    @endforeach
                    
                </label>

                <label class="labelCustom">
                    <span>Email Address <span class="required">*</span></span>
                    @foreach($user as $userinfo)
                        <input class="input" type="email" name="email" placeholder="House number and street name" value="{{$userinfo->email}}" required>
                    @endforeach
                    
                </label>

                <label class="labelCustom">
                  <span>Model</span>
                    <select  name="models" id="models">
                      <option value="select" >Select your model</option>
                        @foreach($models as $model)
                         <option value="{{$model->model_id}}" >{{$model->model_name}}</option>
                        @endforeach
                        {{-- <input type="hidden" value="" name="model_id" id="model_selected_option"> --}}
                    </select>   
              </label>

               
                
                <label class="labelCustom">
                    <span>Region <span class="required">*</span></span>
                    <select  name="warehouses" id="warehouses">
                        <option value="select" >Select your region</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{$warehouse->id}}" >{{$warehouse->warehouse_name}}</option>
                        @endforeach
                        {{-- <input type="hidden" value="" name="warehouse_id" id="warehouse_selected_option"> --}}
                      </select>  
                </label>

                <label class="labelCustom">
                    <span>ShowRooms <span class="required">*</span></span>
                    <select  name="showrooms" id="showrooms">
                    </select>  
                    {{-- <input type="hidden" value="" name="showroom_id" id="showroom_selected_option"> --}}
                </label>
                
                <label class="labelCustom">
                    <span>ShowRoom Address <span class="required">*</span></span>
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
                        <th colspan="2">Your order</th>
                    </tr>
                    <tr>
                        <td class="carname"></td>
                        <td class="carprice"></td>
                    </tr>

                    <tr>
                      <td style="color: red">Deposit (20%)</td>
                      <td class="deposit" style="color: red">0 VND</td>
                  </tr>

                    <tr>
                        <td>Subtotal</td>
                        <td class="subtotal" name='subtotal' style="color: red">0 VND</td>
                        
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free shipping</td>
                    </tr>
                </table>
                <div>
                    <input type="radio" name="dbt" value="dbt" checked> Cash Directly
                </div>
                <p class="textPayment">
                    Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                    Your order will not be shipped until the funds have cleared in our account.
                </p>
              
                
                <button class="buttonCustom" type="submit" form="submitOrder">Place Order</button>
            </div><!-- Yorder -->
        </div>
    </div>
    
    
@push('scriptUserOrder')
<script src="/js/profile/order.js"></script>
@endpush
@endsection

