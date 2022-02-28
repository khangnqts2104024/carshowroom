<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/layout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

 
  
</head>

<body>
	<input type="hidden" value="{{ url('') }}" id="url">

  <div class="container-fluid">
      <!-- Start navbar -->


    <!-- nav PC -->

  <nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-light nav-pc sticky-top">
    <a href="{{route('user.home')}}"  class="logoVinFast"><img src="https://vinfastauto.com/themes/porto/img/logo-header.svg" alt="Vinfast" /></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav ml-auto mt-lg-0 my-nav">
        <li class="nav-item dropdown menu-area ">
          <a class="nav-link dropdown-toggle" href="#" id="mega-one" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{__('home.Car')}}</a>
          <div class="dropdown-menu mega-area text-center" aria-labelledby="mega-one">
                    <div class="row d-flex justify-content-around text-center menu-show-car">
                        <div class="col">
                           <img src="/HomepageImage/slide2/VFe34.png" alt="">
                           <div class="item-name">VFe34</div>
                           <div class="item-price">{{__("from")}} 690.000.000 vnđ</div>
                           <a class="view-detail-a" href="">{{__("View Detail.")}}</a>
                        </div>
                        <div class="col">
                           <img src="/HomepageImage/slide2/Fadil.png" alt="">
                           <div class="item-name">Fadil</div>
                           <div class="item-price">{{__("from")}} 382.500.000 vnđ</div>
                           <a class="view-detail-a" href="">{{__("View Detail.")}}</a>
                        </div>
                        <div class="col">
                           <img src="/HomepageImage/slide2/LuxA.png" alt="">
                           <div class="item-name">LuxA2.0</div>
                           <div class="item-price">{{__("from")}} 949.435.000 vnđ</div>
                           <a class="view-detail-a" href="">{{__("View Detail")}}</a>
                        </div>
                        <div class="col">
                           <img src="/HomepageImage/slide2/LuxSA.png" alt="">
                           <div class="item-name">LUX SA2.0</div>
                           <div class="item-price">{{__("from")}} 1.220.965.000 vnđ</div>
                           <a class="view-detail-a" href="">{{__("View Detail.")}}</a>
                        </div>
                        <div class="col">
                           <img src="/HomepageImage/slide2/President.png" alt="">
                           <div class="item-name">President</div>
                           <div class="item-price">{{__("from")}} 3.800.000.000 vnđ</div>
                           <a class="view-detail-a" href="">{{__("View Detail.")}}</a>
                        </div>
                    </div>
                    <div class="desc">{{__("Sales policy may be updated subject to VinFast Policy from time to time.")}}</div>
                    <div class="view_all">
                      <a href="#">{{__("View All Cars")}}</a>
                    </div>
          </div>
        </li>
        <li class="nav-item PromotionButton"><a class="nav-link"  href="#">{{__('home.Special Offers')}}</a></li>
        <li class="nav-item ServiceButton"><a class="nav-link"  href="#">{{__('home.Service')}}</a></li>
        <li class="nav-item ToolButton"><a class="nav-link"  href="#">{{__('home.Tools')}}</a></li>
		<li class="nav-item d-flex" style="align-items: center;flex-direction:column;">
			
			<div class="switch mt-1">
					<input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox">
					<label for="language-toggle"></label>
					@if(App::getLocale() == 'vi')
						<span class="on" id="activeLang">VN</span>
						<span class="off" id="disableLang">EN</span>
						
					@elseif(App::getLocale() == 'en')
						<span class="on" id="activeLang">EN</span>
						<span class="off" id="disableLang">VN</span>
					@endif
			</div>

		 
			  
		</li>
        <li class="nav-item AccountButton"><a class="nav-link"  href="{{ route('user.login') }}">{{__('home.Account')}}</a></li>
        <li class="nav-item dropdown menu-area2">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-bars" style="font-size: 18px;" aria-hidden="true"></i></a>
          <div class="dropdown-menu mega-area2 dropdown-menu-right" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="#">Hệ thống Showroom và Đại lý</a>
            <a class="dropdown-item" href="#">Tin tức</a>
            <a class="dropdown-item" href="#">Câu hỏi thường gặp</a>
            <a class="dropdown-item" href="#">Liên hệ</a>
          </div>
        </li>

      </ul>
    </div>
  </nav>


  
  <!-- end nav PC -->

    @yield('content')
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script src="/js/layout.js"></script>
  @stack('scriptsHomePage')
</body>

<footer>
	<div class="footer-wrap">
	<div class="container first_class">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<h3>BE THE FIRST TO KNOW</h3>
					<p>Get all the latest information on  Vinfast Services, Events, Jobs
						and Fairs. Sign up for our newsletter today.</p>
				</div>
				<div class="col-md-4 col-sm-6">
				<form class="newsletter">
					 <input type="text" placeholder="Email Address"> 
                    <button class="newsletter_submit_btn" type="submit"><i class="fa fa-paper-plane"></i></button>	
				</form>
				
				</div>
				<div class="col-md-4 col-sm-6">
				<div class="col-md-12">
					<div class="standard_social_links">
				<div>
					<li class="round-btn btn-facebook"><a href="#"><i class="fa fa-facebook"></i></a>

					</li>
					<li class="round-btn btn-linkedin"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

					</li>
					<li class="round-btn btn-twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>

					</li>
					<li class="round-btn btn-instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>

					</li>
					<li class="round-btn btn-whatsapp"><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>

					</li>
					<li class="round-btn btn-envelop"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>

					</li>
				</div>
			</div>	
				</div>
					<div class="clearfix"></div>
				<div class="col-md-12"><h3 style="text-align: right;">Stay Connected</h3></div>
				</div>
			</div>
	</div>
		<div class="second_class">
			<div class="container second_class_bdr">
			<div class="row">
				<div class="col-md-4 col-sm-6">
               
					<div class="footer-logo text-center"><img src="https://vinfastauto.com/themes/porto/img/logo-header.svg" alt="Vinfast" >
					</div>
					
				</div>
				<div class="col-md-2 col-sm-6">
					<h3>Quick  LInks</h3>
					<ul class="footer-links">
						<li><a href="#">Home</a>
						</li>
						<li><a href="#">About us</a>
						</li>
						<li><a href="#">Vinfast Partners</a>
						</li>
						<li><a href="#">Contact Us</a>
						</li>
						<li><a href="#" target="_blank">Terms &amp; Conditions</a>
						</li>
						<li><a href="#" target="_blank">Privacy Policy</a>
						</li>
						<li><a href="#">Sitemap</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6">
					<h3>OUR SERVICES</h3>
					<ul class="footer-category">
						<li><a href="#">Fresher Jobs</a>
						</li>
						<li><a href="#">InternEdge - Internships &amp; Projects </a>
						</li>
						<li><a href="#">Resume Edge - Resume Writing Services</a>
						</li>
						<li><a href="#">Readers Galleria - Curated Library</a>
						</li>
						<li><a href="#">Trideus - Campus Ambassadors</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-3 col-sm-6">
					<h3>Vinfast Events</h3>
					<ul class="footer-links">
						<li><a href="#">Triedge Events</a>
						</li>

						<li><a href="#">Jobs &AMP; Internship Fair 2019</a>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
		</div>
		
		<div class="row">
			<div class="container-fluid">
			<div class="copyright"> Copyright 2022 | All Rights Reserved by VINFAST Ltd.</div>
			</div>
			
		</div>
	</div>
	
</footer>


</html>

