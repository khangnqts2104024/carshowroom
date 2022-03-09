@extends('dashboard.user.profile.layouts.layout')
@section('content')
   
    <link rel="stylesheet" href="/css/profile/order_history_user.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    
    {{-- get url --}}
    <input type="hidden" value="{{ url('') }}" id="url">
    {{-- Center SideBar Content --}}
    <div class="content-wrapper">
        {{-- Header content --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row rowCustom mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{__('UserProfilesettings.Order History')}}</h1>
                    </div>

                </div>
            </div>
        </div>

        {{-- main-content --}}
        <div class="content">
            <div class="container-fluid">
                
                    <div class="success_messages"></div>
                
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

                        <tbody>
                            @php $STT = 1 @endphp
                            @foreach($order_infos as $order_info)
                                <tr>
                                    <td>{{$STT++}}</td>
                                    <td>{{$order_info->order_code}}</td>
                                    <td>{{$order_info->order_date}}</td>
                                    <td>{{$order_info->order_price}}</td>
                                    <td>{{$order_info->order_status}}</td>
                                    <td>{{$order_info->fullname}}</td>
            
                                    


                                    <td><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#model{{$STT}}">
                                        Launch
                                      </button></td>
                                </tr>
                                

                                <!-- Button trigger modal -->
                                
                                
                                <!-- Modal -->
                                <div class="modal fade" id="model{{$STT}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                </div>
                                
                                

                              
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Order Code</th>
                                <th>Order Date</th>
                                <th>Order Price</th>
                                <th>Order Status</th>
                                <th>Customer Name</th>
                                <th>Order Details</th>
                                
                            </tr>
                        </tfoot>


                    </table>
                    <form action="{{route('user.profile.momo_payment')}}" method="post">
                        @csrf
                        <button type="submit" name="payUrl">Thanh toán Momo</button>
                    </form>
            </div>
        </div>
      
    </div>

    

    @push('scriptOrder_HisTory')
    <script src="/js/profile/order_history.js"></script>
@endpush
@endsection


