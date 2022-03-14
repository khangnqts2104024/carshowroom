@extends('dashboard.layouts.layout')
@section('content')
<input type="hidden" class="idToken" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/order_tracking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    
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
                            <input type="hidden" id="order_code_mail_success"
                                value="{{ Session::get('order_code') }}">
                                <input type="hidden" id="order_id_mail_success"
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
                                <th>#</th>
                                <th>{{ __('Order Code') }}</th>
                                <th>{{ __('Order Date') }}</th>
                                <th>{{ __('Order Price') }}</th>
                                <th class="order_status_title">{{ __('Order Status') }}</th>
                                <th>{{ __('Customer Name') }}</th>
                                <th>{{ __('Model Name') }}</th>
                                <th>{{ __('Order Details') }}</th>
                                <th class="order_payment_title">{{ __('Payment') }}</th>
                                <th class="order_cancel_title">{{ __('Cancel Order') }}</th>
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
                                {{ __('This action cannot be undone.If a deposit has been made, the deposit will not be refunded if you cancel the order.') }}
                            </p>
                            
                            <p><button class="btn btn-info btn-sm rounded-pill" id="send_email" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">{{__('Get Cancel Confirm Code From Email')}}</button></p>
                            <p>{{ __('Please type') }} <span
                                    style="font-weight: bolder;">{{__('Code')}}</span>
                                {{ __('to confirm') }}</p>
                            <input type="text" name="input" id="text-confirm" class="rounded-pill shadow-sm">
                        </form>
                    </div>
                    <div class="modal-footer ajax-button"> 
                        
                        <button type="submit" form="formCancel" class="btn btn-danger btn-sm submitCancelBtn" >{{ __('Yes, I want to cancel') }}</button>
                        <button type="button" class="btn btn-success btn-sm CloseBtn">{{ __('No, I need to reconsider') }}</button>
                    </div>
                </div>
            </div>
        </div>

        

 

 @push('scriptOrderTracking')
    <script src="/js/order_tracking.js"></script>
@endpush
@endsection


