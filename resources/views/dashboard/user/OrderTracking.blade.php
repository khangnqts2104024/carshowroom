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
                    </div>

                </div>
            </div>
        </div>

        {{-- main-content --}}
        <div class="content">
            <div class="container-fluid">
                
                    <div class="success_messages"></div>

                     <!-- Custom rounded search bars with input group -->
        <form action="{{route('user.getOrderCode')}}" method="POST" id="formSubmitOrderTracking">
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

                            </tr>
                        </thead>

                        <tbody id="show_order_tracking" class="text-center">
                                
                                <!-- Modal -->
                                {{-- <div class="modal fade" id="model{{$STT}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <h5 class="modal-title">Order Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row d-flex flex-row">
                                                        <div class="col-md-7">
                                                            <img width="100%" height="auto" src="/storage/files/Image_Car/Fadil.png" alt="">
                                                        </div>
                                                        <div class="col-md-5 d-flex flex-column">
                                                            <ul class="d-flex flex-row justify-content-between">
                                                                <li>Model Name:</li>
                                                                <li>Fadil</li>
                                                            </ul>

                                                            <ul class="d-flex flex-row justify-content-between">
                                                                <li>Model Price:</li>
                                                                <li>425.000.000</li>
                                                            </ul>

                                                            <ul class="d-flex flex-row justify-content-between">
                                                                <li>Quantity:</li>
                                                                <li>1</li>
                                                            </ul>

                                                            <ul class="d-flex flex-row justify-content-between">
                                                                <li>Order Status:</li>
                                                                <li>ORDERED</li>
                                                            </ul>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                          
                        </tbody>
                        


                    </table>
                
            </div>
        </div>
      
    </div>

    

 @push('scriptOrderTracking')
    <script src="/js/order_tracking.js"></script>
@endpush
@endsection


