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
                  <h2 class="titleCarousel">Công nghệ thông minh cho tương lai</h2>
                  <h5 class="contentCarousel">
                    Đặt khách hàng làm trọng tâm, các mẫu xe thông minh của VinFast được ứng dụng những công nghệ <br>
                    ưu việt hàng đầu thế giới, mở ra không gian hưởng thụ tiện nghi, giải trí hoàn hảo cùng trải nghiệm <br>
                    cá nhân hóa đáng giá nhất.
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic1.png" class="d-block w-100" alt="First slide">
              </div>

              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">Thiết kế đầy đam mê</h2>
                  <h5 class="contentCarousel">
                    Kết hợp với nhà thiết kế xe nổi tiếng thế giới Pininfarina, VinFast mang đến chất lượng thiết kế đẳng cấp <br>
                    cho từng dòng xe. Theo đuổi triết lý trải nghiệm chạm sinh học, những chiếc xe VinFast sở hữu vẻ ngoài <br>
                    sang trọng đặc trưng cùng khoang nội thất đậm chất tương lai, được chăm chút trong từng chi tiết.
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic2.png" class="d-block w-100" alt="Second slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">Đẳng cấp an toàn quốc tế</h2>
                  <h5 class="contentCarousel">
                    Đặt sự an tâm của khách hàng lên trên hết, những chiếc xe của VinFast được trang bị các tính năng an toàn <br>
                    tối tân nhất để bảo vệ người lái và mọi hành khách trên xe, đáp ứng tiêu chuẩn khắt khe của <br>
                    các tổ chức đánh giá xe uy tín hàng đầu thế giới như ASEAN NCAP, EURO NCAP, NHTSA...
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic3.png" class="d-block w-100" alt="Third slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">Trải nghiệm xuất sắc</h2>
                  <h5 class="contentCarousel">
                    Sở hữu xe VinFast chính là tận hưởng những giá trị tốt nhất của một hệ sinh thái đẳng cấp, từ mô hình <br>
                    O2O tích hợp thương mại điện tử và trải nghiệm tại hệ thống Đại lý/Showroom/Trạm sạc rộng khắp, <br>
                    tới chất lượng dịch vụ hậu mãi vượt trội và sự tận tâm trong từng khoảnh khắc của khách hàng.
                  </h5>
                </div>
                <img src="/HomepageImage/carouselHome/pic4.png" class="d-block w-100" alt="Fourth slide">
              </div>
              <div class="carousel-item">
                <div class="caption d-none d-md-block">
                  <h2 class="titleCarousel">Chính sách thấu hiểu</h2>
                  <h5 class="contentCarousel">
                    VinFast luôn có chính sách bán hàng và hậu mãi có lợi nhất cho khách hàng. VinFast cũng tiên phong <br>
                    thúc đẩy xu hướng sử dụng xe điện, hướng tới tương lai xanh, bền vững bằng chính sách pin và chế độ <br>
                    bảo hành 10 năm duy nhất trên thị trường cho ô tô điện.
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
          Xe ô tô
        </h2>
        <h5 class="contentCarousel">
          Hơn cả việc tạo nên một chiếc xe mới, VinFast ra đời đại diện cho <br>
          tinh thần và niềm kiêu hãnh dân tộc.
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
              <h2>Hành trìnhh chinhh phục thế giới</h2>
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
