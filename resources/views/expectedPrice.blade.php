@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="/css/expectedPrice.css">

    <div class="row wrapperLayout mt-5">
        <div class="col-md-6 divLeft">
            <!-- <div class="showCar"></div> -->
            <div class="showCar">
                <img width="100%" src="/HomepageImage/slide2/President.png" alt="Vinfast" />
            </div>

            <div class="row fee-area1">
                <div class="col-4 item">
                    <div class="d-flex title-item">
                        <img class="registration-fee" src="/expectedPricePage/feeicon/registFee.png"/> 
                    </div>
                    <span>Phí trước bạ</span>
                    <p id="carRegistrationFeeSummary" class="font-weight-bold pt-2">0&nbsp;₫</p>

                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="inspection-fee" src="/expectedPricePage/feeicon/inspectFee.png"> 
                    </div>
                    <span>Phí đăng kiểm</span>
                    <p id="carRegistrationFeeSummary" class="font-weight-bold pt-2">0&nbsp;₫</p>
                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="license-fee" src="/expectedPricePage/feeicon/licenFee.png"> 
                    </div>
                    <span>Phí đăng kí biển số</span>
                    <p id="carRegistrationFeeSummary" class="font-weight-bold pt-2">0&nbsp;₫</p>
                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="road-fee" src="/expectedPricePage/feeicon/roadFee.png"> 
                    </div>
                    <span>Phí bảo trì <br> đường bộ</span>
                    <p id="carRegistrationFeeSummary" class="font-weight-bold pt-2">0&nbsp;₫</p>
                </div>
                <div class="col-4 item-fee">
                    <div class="d-flex title-item">
                        <img class="civil-fee" src="/expectedPricePage/feeicon/civilFee.png"> 
                    </div>
                    <span>Bảo hiểm <br> trách nhiệm dân sự</span>
                    <p id="carRegistrationFeeSummary" class="font-weight-bold pt-2">0&nbsp;₫</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Default form subscription -->
            <form action="" method="">

                <p class="h4 mb-4" style="white-space: nowrap;">DỰ TOÁN CHI PHÍ LĂN BÁNH</p>

                <div class="form-group">
                    <label for="">Mẫu xe</label>
                    <select class="form-control formRound" name="" id="">
                        <option disabled hidden>Lựa chọn</option>
                        <option>Vfe34</option>
                        <option>Fadil</option>
                        <option>LuxA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Phiên bản</label>
                    <select class="form-control formRound" name="" id="">
                        <option disabled hidden>Lựa chọn</option>
                        <option>Tiêu chuẩn</option>
                        <option>Nâng cao</option>
                        <option>Cao cấp</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tỉnh/Thành phố</label>
                    <select class="form-control formRound" name="" id="">
                        <option disabled hidden>Lựa chọn</option>
                        <option>Vfe34</option>
                        <option>Fadil</option>
                        <option>LuxA</option>
                    </select>
                </div>

                <div class="fee-area2">
                    <div class="listedPrice">
                        <span class="listedPrice">Giá niêm yết</span>
                        <span  id="carPrice">459.000.000&nbsp;₫</span>
                    </div>

                    <div class="registration-fee">
                        <span class="text-registration-fee">Phí trước bạ</span>
                        <span id="carRegistrationFee">0&nbsp;₫</span>
                    </div>

                    <div class="road-fee">
                        <span class="text-road-fee">Phí bảo trì đường bộ (1 năm)</span>
                        <span id="carRoadFee">0&nbsp;₫</span>
                    </div>

                    <div class="civilFee">
                        <span class="text-civilFee">Bảo hiểm trách nhiệm dân sự (1 năm)</span>
                        <span id="carCivilFee">0&nbsp;₫</span>
                    </div>

                    <div class="license-fee">
                        <span class="text-license-fee">Phí đăng kí biển số</span>
                        <span id="carLicenseFee">0&nbsp;₫</span>
                    </div>

                    <div class="inspection-fee">
                        <span class="text-inspection-fee">Phí đăng kiểm</span>
                        <span id="carInspectionFee">0&nbsp;₫</span>
                    </div>
 
                </div>

                <hr class="line">

                <div >
                    <div class="expectedPrice">
                        <span class="text-expectedPrice">Chi phí lăn bánh dự kiến</span>
                        <span id="carExpectedPrice">0 &nbsp; ₫</span>
                    </div>

                    <button type="submit" class="btn btn-block buttonDeposit mt-5">Đặt Cọc</button>
                    <a href="/register"><button class="btn btn-block buttonViewDetail">Xem chi tiết</button></a>
                    

                   
                    <p class="mt-5">Bảng tính trên chỉ mang tính chất tham khảo. Quý khách vui lòng liên hệ <b>Showroom/Đại lý</b>  gần nhất để có Báo giá chính xác nhất.</p>
    
                </div>




            </form>
            <!-- Default form subscription -->
        </div>
    </div>

    

@endsection