@extends('dashboard.user.profile.layouts.layout')
@section('content')
    <link rel="stylesheet" href="/css/profile/order_history_user.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}

    {{-- get url --}}
    <input type="hidden" value="{{ url('') }}" id="url">
    <input type="hidden" class="idToken" value="{{ csrf_token() }}">

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
                            <th>{{ __('Order Code') }}</th>
                            <th>{{ __('Order Date') }}</th>
                            <th>{{ __('Order Price') }}</th>
                            <th class="order_status_title">{{ __('Order Status') }}</th>
                            <th>{{ __('Customer Name') }}</th>
                            <th>{{ __('Order Details') }}</th>
                            <th style="display: none;" class="order_payment_title">{{ __('Payment') }}</th>
                            <th style="display: none;" class="order_cancel_title">{{ __('Cancel') }}</th>
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
                                        echo number_format($order_info->order_price);
                                    @endphp
                                    VNĐ
                                </td>

                                <td class="text-center" class="order_status"
                                    id="order_status_{{ $order_info->order_id }}">{{ $order_info->order_status }}</td>
                                <td class="text-center">{{ $order_info->fullname }}</td>
                                <td class="text-center" class="order_details"><button type="button"
                                        class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#model{{ $STT }}">
                                        Show
                                    </button>
                                </td>
                                <td style="display: none;" class="text-center" class="order_payment">
                                    @php
                                        $deposit = round($order_info->order_price * (1 / 100));
                                    @endphp
                                    <a
                                        href="http://127.0.0.1:8000/user/momo_payment/{{ $order_info->order_id }}/{{ $deposit }}"><button
                                            class="btn btn-danger btn-sm">Momo</button></a>
                                </td>
                                <td style="display: none;" class="text-center" class="order_cancel">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm cancelBtn"
                                        data-order-id-code="{{ $order_info->order_code }},{{ $order_info->order_id }}">
                                        Cancel
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal_{{ $order_info->order_id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        {{ __('Do you really want to cancel your order?') }}</h5>
                                                    <button type="button" class="close CloseBtn"
                                                        data-order-id-code="{{ $order_info->order_code }},{{ $order_info->order_id }}"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{ route('user.cancelContract') }}" method="post"
                                                        id="formcancel_{{ $order_info->order_id }}">
                                                        @csrf
                                                        <p class="alert alert-warning text-errors">
                                                            {{ __("Unexpected bad things will happen if you don't read this!") }}
                                                        </p>
                                                        <input type="hidden" name="order_id" class="order_id_this_order"
                                                            value="{{ $order_info->order_id }}">
                                                        <p>{{ __('This action cannot be undone. The deposit will not be refunded if you cancel the order.') }}
                                                        </p>
                                                        <p>Click <a id="send_email"
                                                                href="/send_cancel_code/{{ $order_info->order_code }}">here</a>
                                                            to get Cancellation confirmation code from email</p>
                                                        <p>{{ __('Please type') }} <span
                                                                style="font-weight: bolder;">Code</span>
                                                            {{ __('to confirm') }}</p>
                                                        <input type="text"
                                                            name="text-confirm_{{ $order_info->order_id }}"
                                                            id="text-confirm_{{ $order_info->order_id }}"
                                                            class="rounded shadow-sm">
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" form="formcancel_{{ $order_info->order_id }}"
                                                        data-order-id="{{ $order_info->order_id }}"
                                                        class="btn btn-danger btn-sm submitCancelBtn">{{ __('Yes, I want to cancel') }}</button>
                                                    <button type="button" class="btn btn-success btn-sm CloseBtn"
                                                        data-order-id-code="{{ $order_info->order_code }},{{ $order_info->order_id }}">{{ __('No, I need to reconsider') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if (Session::get('order_id'))
                                        <input data-order-id-code="{{ $order_info->order_code }},{{ $order_info->order_id }}" type="hidden" id="send_cancel_code_success"
                                            value="{{ Session::get('order_id') }}">
                                    @endif

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
                                                    <div class="col-md-6">
                                                        <img width="100%" height="auto"
                                                            src="/storage/files/Image_Car/Fadil.png" alt="">
                                                    </div>
                                                    <div class="col-md-6 d-flex flex-column">
                                                        <ul class="d-flex flex-row justify-content-between">
                                                            <li>{{ __('Model Name') }}:</li>
                                                            <li style="list-style-type: none;">
                                                                {{ $order_info->model_name }}</li>
                                                        </ul>

                                                        <ul class="d-flex flex-row justify-content-between">
                                                            <li>{{ __('Listed Price') }}:</li>

                                                            <li style="list-style-type: none;">
                                                                @php
                                                                    echo number_format($order_info->price);
                                                                @endphp
                                                                VNĐ
                                                            </li>
                                                        </ul>

                                                        <ul class="d-flex flex-row justify-content-between">
                                                            <li><a
                                                                    href="/user/auth/CostEstimate/{{ $order_info->model_id }}/{{ $order_info->matp }}">{{ __('Other Fees') }}:</a>
                                                            </li>

                                                            <li style="list-style-type: none;"> +
                                                                @php
                                                                    echo number_format($order_info->order_price - $order_info->price + $order_info->price * (10 / 100));
                                                                @endphp
                                                                VNĐ
                                                            </li>
                                                        </ul>

                                                        <ul class="d-flex flex-row justify-content-between">
                                                            <li>{{ __('Offers') }}:</li>

                                                            <li style="list-style-type: none;"> -
                                                                @php
                                                                    echo number_format($order_info->price * (10 / 100));
                                                                @endphp
                                                                VNĐ
                                                            </li>
                                                        </ul>

                                                        <ul class="d-flex flex-row justify-content-between">
                                                            <li>Quantity:</li>
                                                            <li style="list-style-type: none;">1</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

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
