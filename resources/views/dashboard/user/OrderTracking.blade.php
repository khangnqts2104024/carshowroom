@extends('dashboard.layouts.layout')
@section('content')
<input type="hidden" class="idToken" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/order_tracking.css">
    
    
    {{-- get url --}}
    <input type="hidden" value="{{ url('') }}" id="url">

   
    {{-- Center SideBar Content --}}
    <div class="content-wrapper container" style="margin-top:70px;margin-bottom:500px;">
        {{-- Header content --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row rowCustom mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 ml-5">{{__('Order Tracking')}}</h1>
                        @if (Session::get('order_code'))
                            <input type="text" id="order_code_mail_success"
                                value="{{ Session::get('order_code') }}">
                                <input type="text" id="order_id_mail_success"
                                value="{{ Session::get('order_id') }}">
                       @endif
                    </div>

                </div>
            </div>
        </div>

        {{-- main-content --}}
        <div class="content">
            <div class="container-fluid">
                
                    <div class="success_messages"></div>

                     <!-- Custom rounded search bars with input group -->
        <form class="formCustom" action="{{route('user.getOrderCode')}}" method="POST" id="formSubmitOrderTracking">
            @csrf
            <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
              <div class="input-group">
                <input type="search" id="order_code_input" value="" placeholder="{{__('Enter your order code')}}" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                <div class="input-group-append">
                  <button id="searchOrderBtn" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
        </form>
          <!-- End -->
                
                    <table id="OrderHistoryList" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>

                                <th>STT</th>
                                <th>Order Code</th>
                                <th>Order Date</th>
                                <th>Order Price</th>
                                <th>Order Status</th>
                                <th>Customer Name</th>
                                <th>Order Details</th>
                                <th>Payment</th>
                                <th>Cancel</th>
                            </tr>
                        </thead>
                        

                        <tbody id="show_order_tracking" class="text-center">
                               
                        </tbody>
                        


                    </table>
                
            </div>
        </div>
      
    </div>
    
    
        <!-- Modal Cancel Order-->
        <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ __('Do you really want to cancel your order?') }}</h5>
                        <button type="button" class="close CloseBtn"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <form class="text-center" action="" method="post" id="formCancel">
                            @csrf
                            <p class="alert alert-warning text-errors">
                                {{ __("Unexpected bad things will happen if you don't read this!") }}
                            </p>
                            
                            <p>{{ __('This action cannot be undone. The deposit will not be refunded if you cancel the order.') }}
                            </p>
                            
                            <p>Click <a id="send_email" href="">here</a>
                                to get Cancellation confirmation code from email</p>
                            <p>{{ __('Please type') }} <span
                                    style="font-weight: bolder;">Code</span>
                                {{ __('to confirm') }}</p>
                            <input type="text" name="input" id="text-confirm" class="rounded shadow-sm">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" form="formCancel" class="btn btn-danger btn-sm submitCancelBtn">{{ __('Yes, I want to cancel') }}</button>
                        <button type="button" class="btn btn-success btn-sm CloseBtn">{{ __('No, I need to reconsider') }}</button>
                    </div>
                </div>
            </div>
        </div>

    

 @push('scriptOrderTracking')
    <script src="/js/order_tracking.js"></script>
@endpush
@endsection


