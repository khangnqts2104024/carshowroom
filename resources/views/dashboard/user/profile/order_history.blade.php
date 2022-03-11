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
                        <h1 class="m-0">{{ __('UserProfilesettings.Order History') }}</h1>
                    </div>

                </div>
            </div>
        </div>

        {{-- main-content --}}
        <div class="content">
            <div class="container">

                <div class="success_messages"></div>

                <table id="OrderHistoryList" class="table table-hover table-bordered compact" style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>{{__('Order Code')}}</th>
                            <th>{{__('Order Date')}}</th>
                            <th >{{__('Order Price')}}</th>
                            <th class="order_status_title">{{__('Order Status')}}</th>
                            <th>{{__('Customer Name')}}</th>
                            <th>{{__('Order Details')}}</th>
                            <th style="display: none;" class="order_payment_title">{{__('Payment')}}</th>
                            <th style="display: none;" class="order_cancel_title">{{__('Cancel')}}</th>
                        </tr>
                    </thead>

                    <tbody class="table-hover">
                        @php $STT = 1 @endphp
                        @foreach ($order_infos as $order_info)
                            <tr class="item-info">
                                <td>{{ $STT++ }}</td>
                                <td>{{ $order_info->order_code }}</td>
                                <td>{{ $order_info->order_date }}</td>
                                <td class="text-center" class="order_price">
                                    
                                    @php
                                       echo number_format($order_info->order_price ) 
                                    @endphp
                                    VNĐ
                                </td>
                                <td class="text-center" class="order_status">{{ $order_info->order_status }}</td>
                                <td class="text-center">{{ $order_info->fullname }}</td>
                                <td class="text-center" class="order_details"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#model{{ $STT }}">
                                        Show
                                    </button>
                                </td>
                                <td style="display: none;" class="text-center" class="order_payment">
                                    <form action="{{ route('user.profile.momo_payment') }}" method="post">
                                        @csrf
                                        @php
                                            $deposit= $order_info->order_price*(1/100);
                                        @endphp
                                        <input type="hidden" name="deposit" value="{{ $deposit }}">
                                        <input type="hidden" name="order_id" value="{{ $order_info->order_id }}">
                                        <button type="submit" class="btn btn-info btn-sm" name="payUrl">Momo</button>
                                    </form>
                                </td>
                                <td style="display: none;" class="text-center" class="order_cancel">
                                    <form action="" method="post" class="custcanceledForm">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm custcanceledBtn" name="payUrl">Cancel</button>
                                    </form>
                                </td>
                            </tr>


                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            <div class="modal fade" id="model{{ $STT }}" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Order Detail</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row d-flex flex-row">
                                                    <div class="col-md-7">
                                                        <img width="100%" height="auto"
                                                            src="/storage/files/Image_Car/Fadil.png" alt="">
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>



    @push('scriptOrder_HisTory')
        <script src="/js/profile/order_history.js"></script>
    @endpush
@endsection
