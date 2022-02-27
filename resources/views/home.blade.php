@extends('layouts.layout')
@section('content')

<link rel="stylesheet" href="/css/homepage.css">
<link id="import_link_font_icon" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mulish:300,400,600,700&amp;display=swap&amp;subset=vietnamese">

  
    <div id="block-newhome-videotop">
      <video playsinline="" autoplay="" muted="" loop="" id="video-vinfast-banner" poster="/">
        <source src="/video/Videotop1.mp4" type="video/mp4">
      </video>
    </div>

    <img class="v-light" src="/HomepageImage/Vlight.svg" width="100%" alt="">


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
                  <h2 class="titleCarousel">{{__("Smart Technology For The Future")}}</h2>
                  
                  <h5 class="contentCarousel">
                    {{__("With customer-centred philosophy, VinFast smart cars are integrated with world's most advanced")}} <br>
                    {{__("techonologies, namely AI based machine learning & deep learning, high-level autopilot for a")}} <br>
                    {{__("comfortable ride, immersive entertainment & personalized experience.")}}
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic1.png" class="d-block w-100" alt="First slide">
              </div>

              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("Passionate Design")}}</h2>
                  <h5 class="contentCarousel">
                    {{__("In collaboration with Pininfarina, a world-famous car design firm, VinFast offers premium & classy")}} <br>
                    {{__("design for every line of car. Each model is packed with distinctive & elegant exterior as well as modern")}} <br>
                    {{__("interior with meticulous attention to details.")}}
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic2.png" class="d-block w-100" alt="Second slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("World-class Safety Standards")}}</h2>
                  <h5 class="contentCarousel">
                    {{__("With customers assurance as the top priority, VinFast cars are equipped with state-of-art safety")}}<br>
                    {{__("features to protect drivers and passengers, meeting the rigorous standards of the world's top vehicle")}} <br>
                    {{__("assessment organizations, such as ASEAN NCAP, EURO NCAP, and NHTSA.")}}
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic3.png" class="d-block w-100" alt="Third slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("Excellent Experience")}}</h2>
                  <h5 class="contentCarousel">
                    {{__("VinFast cars enable their owners to enjoy the best values of our ecosystem, from the Online-To-Offline")}}<br>
                    {{__("business model that integrates e-commerce and in-person experiences at dealership, showrooms and ")}}<br>
                    {{__("charging stations nationwide, to outstanding after-sales service quality and dedication to customers.")}}
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic4.png" class="d-block w-100" alt="Fourth slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">{{__("Understanding Polices")}}</h2>
                  <h5 class="contentCarousel">
                    {{__("VinFast always has the most beneficial sales and after-sales policy for customers. VinFast is also a ")}}<br>
                    {{__("pioneer in promoting the trend of using electric vehicles, towards a green and sustainable future with a ")}}<br>
                    {{__("battery policy and the only 10-year warranty on the market for electric cars.")}}
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic5.png" class="d-block w-100" alt="Fifth slide">
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

    <div class="CarCarousel">
      <div class="contentTop d-none d-md-block">
        <h2 class="titleCarousel">
          {{__("VinFast Car")}}
        </h2>
        <h5 class="contentCarousel">
          {{__("More than creating a new car, VinFast was born to represent")}}<br>
          {{__("the spirit and pride of the nation.")}}
          
        </h5>
      </div>
      <div class="carslide owl-carousel owl-theme row justify-content-around">
        <div class="col item">
          <img class="carImg" src="/HomepageImage/slide2/VFe34.png" alt="">
          <img class="carGif" src="/HomepageImage/slide2/gif/VFe34.gif" alt="">
          <div class="info">
            <div class="slogan">
              <div>
              Cùng bạn bứt phá mọi giới hạn
              </div>
            </div>
            <div class="title">
              <div>
              VF e34 
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="type">
                <div>Dòng xe</div>
                <div>SUV</div>

              </div>
              <div class="price">
                <div>Giá niêm yết</div>
                <div>từ 690 triệu</div>
              </div>
            </div>
          </div>

          <a href="#" class="view-detail">XEM CHI TIẾT</a>

        </div>
        <div class="col item">
          <img class="carImg" src="/HomepageImage/slide2/Fadil.png" alt="">
          <img class="carGif" src="/HomepageImage/slide2/gif/Fadil.gif" alt="">
          <div class="info">
            <div class="slogan">
              <div>
                Tối ưu mọi trải nghiệm
              </div>
            </div>
            <div class="title">
              <div>
                Fadil
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="type">
                <div>Dòng xe</div>
                <div>HATCHBACK</div>

              </div>
              <div class="price">
                <div>Giá niêm yết</div>
                <div>từ 382 triệu</div>
              </div>
            </div>
          </div>

          <a href="#" class="view-detail">XEM CHI TIẾT</a>

        </div>
        <div class="col item">
          <img class="carImg" src="/HomepageImage/slide2/LuxA.png" alt="">
          <img class="carGif" src="/HomepageImage/slide2/gif/LuxA.gif" alt="">
          <div class="info">

            <div class="slogan">
              <div>
                Tận hưởng từng khoảnh khắc
              </div>
            </div>
            <div class="title">
              <div>
                LUX A2.0
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="type">
                <div>Dòng xe</div>
                <div>SEDAN</div>

              </div>
              <div class="price">
                <div>Giá niêm yết</div>
                <div>từ 949 triệu</div>
              </div>
            </div>
          </div>

          <a href="#" class="view-detail">XEM CHI TIẾT</a>

        </div>
        <div class="col item">
          <img class="carImg" src="/HomepageImage/slide2/LuxSA.png" alt="">
          <img class="carGif" src="/HomepageImage/slide2/gif/LuxSA.gif" alt="">
          <div class="info">

            <div class="slogan">
              <div>
                Chinh phục mọi cung đường
              </div>
            </div>
            <div class="title">
              <div>
                LUX SA2.0
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="type">
                <div>Dòng xe</div>
                <div>SUV</div>

              </div>
              <div class="price">
                <div>Giá niêm yết</div>
                <div>từ 1.2 tỷ</div>
              </div>
            </div>
          </div>

          <a href="#" class="view-detail">XEM CHI TIẾT</a>

        </div>
        <div class="col item">
          <img class="carImg" src="/HomepageImage/slide2/President.png" alt="">
          <img class="carGif" src="/HomepageImage/slide2/gif/President.gif" alt="">
          <div class="info">
            <div class="slogan">
              <div>
                Dấu ấn người thủ lĩnh
              </div>
            </div>
            <div class="title">
              <div>
                PRESIDENT
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="type">
                <div>Dòng xe</div>
                <div>SUV</div>

              </div>
              <div class="price">
                <div>Giá niêm yết</div>
                <div>từ 3.8 tỷ</div>
              </div>
            </div>
          </div>
          <a href="#" class="view-detail">XEM CHI TIẾT</a>

        </div>
      </div>


    </div>

    <!-- End CarCarousel -->
    <div class="TextCarousel">
      <img class="img-blue" src="https://storage.googleapis.com/vinfast-data-01/htcptg_1639632316_1639673399.jpg" alt="">
      <div class="container-fluid">
        <div class="row">
          <div class="col"></div>
          <div class="col-md-11 content-body">
            <div class="content-title">
              <h2>Hành trình chinh phục thế giới</h2>
            </div>
            <div class="htcptg owl-carousel owl-theme child">
              <div class="item">
                <div class="desc">
                  “Trong ngành công nghiệp xe hơi, việc thiết kế và <br>
                  chế tạo không chỉ một mà hai chiếc xe chỉ trong <br>
                  vòng 12 tháng là tốc độ không tưởng”
                </div>
                <div class="author">
                  - Top Gear -
                </div>
              </div>
              <div class="item">
                <div class="desc">
                  “Chìa khóa để đạt thành công ngay từ khâu sản <br>
                  xuất của VinFast chính là các đối tác mạnh mẽ <br>
                  như ABB, Bosch, Magna Steyr và Siemens”
                </div>
                <div class="author">
                  - CNBC -
                </div>

              </div>
              <div class="item">
                <div class="desc">
                  “VinFast, thương hiệu ô tô Việt thuộc Tập đoàn <br>
                  Vingroup là điển hình tiêu biểu của việc nhanh <br>
                  chóng phục hồi và có tiến bước nhanh chóng <br>
                  sau khi Việt Nam thành công chống dịch Covid...”
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
