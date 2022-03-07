@extends('dashboard.layouts.layout')
@section('content')
    <input type="hidden" class="idToken" value="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/CostEstimate.css">

    @if (Auth::check())
        <input type="hidden" class="url_Get_ModelInFo" value="/user/auth/CostEstimate/getModelInfo">
        <input type="hidden" class="url_Get_Fees" value="/user/auth/CostEstimate/getFees">
    @else
        <input type="hidden" class="url_Get_Fees" value="/user/CostEstimate/getFees">
        <input type="hidden" class="url_Get_ModelInFo" value="/user/CostEstimate/getModelInfo">
    @endif


    <div class="row wrapperLayout mt-5">
        <div class="col-md-6 divLeft">
            <!-- <div class="showCar"></div> -->
            <div class="showCar d-flex mt-5 justify-content-around">
                <img width="100%" class="align-self-center" src="/image/logoVinfast.png" id="showImageCar" alt="">
            </div>

            <div class="row fee-area1">
                <div class="col-4 item">
                    <div class="d-flex title-item">
                        <img class="registration-fee" src="/CostEstimatePage/feeicon/registFee.png" />
                    </div>
                    <span>{{ __('CostEstimate.Registration fee') }}</span>

                    <p class="font-weight-bold pt-2 carRegistration-fee">0&nbsp;₫</p>

                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="inspection-fee" src="/CostEstimatePage/feeicon/inspectFee.png">
                    </div>
                    <span>{{ __('CostEstimate.Inspection fee') }}</span>
                    <p class="font-weight-bold pt-2 carInspection-fee">0&nbsp;₫</p>
                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="license-fee" src="/CostEstimatePage/feeicon/licenFee.png">
                    </div>
                    <span>{{ __('CostEstimate.License plate fee') }}</span>
                    <p class="font-weight-bold pt-2 carLicense-fee">0&nbsp;₫</p>
                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="road-fee" src="/CostEstimatePage/feeicon/roadFee.png">
                    </div>
                    <span>{{ __('CostEstimate.Road usage fee') }}</span>
                    <p class="font-weight-bold pt-2 carRoad-fee">0&nbsp;₫</p>
                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="civil-fee" src="/CostEstimatePage/feeicon/civilFee.png" style="height:18px;">
                    </div>
                    <span>{{ __('CostEstimate.Civil liability insurance') }}</span>
                    <p class="font-weight-bold pt-2 carCivil-fee">0&nbsp;₫</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Default form subscription -->
            
           
            <form action="{{}}" method="POST">
           

                <p class="h4 mb-4" style="white-space: nowrap;">{{ __('CostEstimate.Cost Estimation') }}</p>

                <div class="form-group">
                    <label for="">{{ __('CostEstimate.Model') }}</label>
                    <select class="form-control formRound" name="models" id="models">
                        <option id="SelectYourModel" value="{{ __('Select your Model') }}">{{ __('Select your Model') }}
                        </option>
                        @foreach ($models as $model)
                            <option value="{{ $model->model_id }}">{{ $model->model_name }}</option>
                        @endforeach
                        <span class="text-danger">
                            @error('models')
                                {{ $message }}
                            @enderror
                        </span>

                    </select>
                </div>

                <div class="form-group">
                    <label for="">{{ __('CostEstimate.Province/City') }}</label>
                    <select class="form-control formRound" name="provinces" id="provinces">
                        <option id="SelectYourProVince" value="{{ __('Select Your Province/City') }}">
                            {{ __('Select Your Province/City') }}</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->matp }}">{{ $province->name }}</option>
                        @endforeach
                        <span class="text-danger">
                            @error('provinces')
                                {{ $message }}
                            @enderror
                        </span>
                    </select>
                </div>

                <div class="fee-area2">
                    <div class="listedPrice d-flex align-items-center">
                        <span class="listedPrice">{{ __('CostEstimate.Listed Price') }}</span>
                        <span id="carPrice" style="align-items: center">0&nbsp;₫</span>
                    </div>

                    <div class="registration-fee">
                        <span class="text-registration-fee">{{ __('CostEstimate.Registration fee (5%)') }}</span>
                        <span class="carRegistration-fee">0&nbsp;₫</span>
                    </div>

                    <div class="road-fee">
                        <span class="text-road-fee">{{ __('CostEstimate.Road usage fee (1 year)') }}</span>
                        <span class="carRoad-fee">0&nbsp;₫</span>
                    </div>

                    <div class="civilFee">
                        <span class="text-civilFee">{{ __('CostEstimate.Civil liability insurance (1 year)') }}</span>
                        <span class="carCivil-fee">0&nbsp;₫</span>
                    </div>

                    <div class="license-fee">
                        <span class="text-license-fee">{{ __('CostEstimate.License plate fee') }}</span>
                        <span class="carLicense-fee">0&nbsp;₫</span>
                    </div>

                    <div class="inspection-fee">
                        <span class="text-inspection-fee">{{ __('CostEstimate.Inspection fee') }}</span>
                        <span class="carInspection-fee">0&nbsp;₫</span>
                    </div>

                </div>

                <hr class="line">

                <div>


                    <input type="hidden" name="allFees" value="" id="allFees">
                    <input type="hidden" name="costEstimated" value="" id="costEstimated">

                    <div class="CostEstimate">
                        <span class="text-CostEstimate">{{ __('CostEstimate.Estimated Rolling Cost') }}</span>
                        <span id="carCostEstimate">0 &nbsp; ₫</span>
                    </div>

                    <button type="submit" class="btn btn-block buttonDeposit mt-5">{{ __('Order Car') }}</button>
            </form>

            <a href="#"><button class="btn btn-block buttonViewDetail">{{ __('View Detail.') }}</button></a>



            <p class="mt-5">
                {{ __('CostEstimate.The above table is for reference only. Please contact the nearest Showroom/Dealer for the most accurate quotation.') }}
            </p>

        </div>




        </form>
        <!-- Default form subscription -->
    </div>
    </div>


    @push('scriptCostEstimate')
        <script src="/js/costestimate.js"></script>
    @endpush
@endsection
