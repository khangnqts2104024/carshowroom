@extends('layouts.layout')
@section('content')

<link rel="stylesheet" href="/css/homepage.css">
<link id="import_link_font_icon" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mulish:300,400,600,700&amp;display=swap&amp;subset=vietnamese">

<div class="container">

    <div class="wrapperCarousel">
      <div class="row">
        <div class="col-md-12">
          <div id="carouselId" class="carousel slide" data-bs-touch="true" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselId" data-slide-to="0" class="active"></li>
              <li data-target="#carouselId" data-slide-to="1"></li>
              <li data-target="#carouselId" data-slide-to="2"></li>
              <li data-target="#carouselId" data-slide-to="3"></li>
              <li data-target="#carouselId" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="caption d-none d-md-block">
                 
                  <h2 class="titleCarousel">
                    {{__("VinFast tham dự triển lãm di động toàn cầu MWC 2022")}} <br>
                  </h2>
                </div>
                <img src="\HomepageImage\news\topic1\VinFast_new_thamDuQuocTe.jpg" class="d-block w-100" alt="First slide">
              </div>

              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("VinFast và Nas Academy tổ chức cuộc thi toàn cầu")}}</h2>
                </div>
                <img src="\HomepageImage\news\topic4\vin_NasAcademy.jpg" class="d-block w-100" alt="Second slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("VinFast thay đổi lựa chọn màu sơn")}}</h2>
                
                </div>
                <img src="\HomepageImage\news\topic2\Vin_thay đổi màu xe.png" class="d-block w-100" alt="Third slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("ETrải nghiệm không gian hiện đại, đẳng cấp tại VinFast Nguyễn Văn Linh")}}</h2>

                </div>
                <img src="\HomepageImage\news\topic3\vin_NguyenVanLinh.jpg" class="d-block w-100" alt="Fourth slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("VinFast triển khai dịch vụ sửa chữa lưu động")}}</h2>
                  
                </div>
                <img src="\HomepageImage\news\vin_suachualuudong.png" class="d-block w-100" alt="Fifth slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>

    </div>

    </div>
    <!-- End CarCarousel -->
    @yield('topic')
    <div class="TextCarousel">
      <img class="img-blue" src="https://storage.googleapis.com/vinfast-data-01/htcptg_1639632316_1639673399.jpg" alt="">
      <div class="container-fluid">
        <div class="row">
          <div class="col"></div>
          <div class="col-md-11 content-body">
            <div class="content-title">
              <h2>{{__("Aspiration to conquer the world")}}</h2>
            </div>
            <div class="htcptg owl-carousel owl-theme child">
              <div class="item">
                <div class="desc">
                   {{__("Aspiration to conquer the world")}}<br>
                  {{__("but two vehicles are designed and manufactured ")}}<br>
                  {{__("within 12 months.”")}}
                </div>
                <div class="author">
                  - Top Gear -
                </div>
              </div>
              <div class="item">
                <div class="desc">
                  {{__("“The key success right from the production ")}}<br>
                  {{__("process of VinFast mainly comes from their ")}}<br>
                  {{__("prestige partners named ABB, Bosch, Magna ")}}<br>
                  
                </div>
                <div class="author">
                  - CNBC -
                </div>

              </div>
              <div class="item">
                <div class="desc">
                  {{__("“VinFast - Vietnamese automobile brand ")}}<br>
                  {{__("of Vingroup is a typical model for their prompt ")}}<br>
                  {{__("rehabilitation and astronautic move after ")}}<br>
                  {{__("Vietnam has successfully controlled the Covid-19 pandemic , etc.”")}}
                </div>
                <div class="author">
                  - Bloomberg -
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


@push('scriptsHomePage')
<script src="/js/home.js"></script>
@endpush



@endsection
