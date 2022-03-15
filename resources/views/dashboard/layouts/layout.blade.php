<!doctype html>
<html lang="en">

<head>
  {{-- <title>Vinfast Showroom</title> --}}
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
  <title>@yield('page_title')</title>
 
  
</head>

<body>
	<input type="hidden" value="{{ url('') }}" id="url">
	<input type="hidden" class="idToken" value="{{ csrf_token() }}">
	@if(Auth::check())
		<input type="hidden" id="authLogin" value="authLogin">
	@endif
  <div class="container-fluid">
      <!-- Start navbar -->


    <!-- nav PC -->

  <nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-light nav-pc sticky-top">
    @if(Auth::check())
		<a href="{{route('user.home_auth')}}"  class="logoVinFast"><img src="https://vinfastauto.com/themes/porto/img/logo-header.svg" alt="Vinfast" /></a>
	@else
	<a href="{{route('user.home')}}"  class="logoVinFast"><img src="https://vinfastauto.com/themes/porto/img/logo-header.svg" alt="Vinfast" /></a>
	@endif
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
                       
                    </div>
                    <div class="desc">{{__("Sales policy may be updated subject to VinFast Policy from time to time.")}}</div>
                    
          </div>
        </li>
        
        @if(Auth::check())
			<li class="nav-item ServiceButton"><a class="nav-link"  href="/user/auth/order">{{__('Order Car')}}</a></li>
			<li class="nav-item CostEstimation"><a class="nav-link"  href="/user/auth/CostEstimate">{{__('home.Cost Estimation')}}</a></li>
		@else
			<li class="nav-item CostEstimation"><a class="nav-link"  href="/user/CostEstimate">{{__('home.Cost Estimation')}}</a></li>
			<li class="nav-item ServiceButton"><a class="nav-link"  href="/user/order">{{__('Order Car')}}</a></li>
		@endif
		@if(Auth::check())
		<li class="nav-item ToolButton"><a class="nav-link"  href="{{url('/user/auth/compare')}}">{{__('home.Compare Car')}}</a></li>
		@else
		<li class="nav-item ToolButton"><a class="nav-link"  href="{{url('/user/compare')}}">{{__('home.Compare Car')}}</a></li>
		@endif
        

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
		@if(Auth::check())
			<li class="nav-item AccountButton"><a class="nav-link" id="username" href="{{ route('user.login') }}"></a></li>
		@else
			<li class="nav-item AccountButton"><a class="nav-link"  href="{{ route('user.login') }}">{{__('home.Account')}}</a></li>
		@endif
        
        <li class="nav-item dropdown menu-area2">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-bars" style="font-size: 18px;" aria-hidden="true"></i></a>
          <div class="dropdown-menu mega-area2 dropdown-menu-right" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="/user/order_tracking">{{__('Order Tracking')}}</a>
            <a class="dropdown-item" href="{{url('/AboutUs')}}">{{__('About us')}}</a>
            
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
 
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  
  @stack('scriptCostEstimate')
  @stack('scriptsHomePage')
  @stack('scriptUserOrder')
  @stack('scriptOrderTracking')
  <script src="/js/layout.js"></script>
</body>

<footer>
	<div class="footer-wrap">
	<div class="container first_class">
			<div class="row d-flex" style="justify-content: space-around">
				<div class="col-md-4 col-sm-6">
					<h3>{{__('home.BE THE FIRST TO KNOW')}}</h3>
					<p>{{__('home.Get all the latest information on Vinfast Services, Events, Jobs and Fairs. Sign up for our newsletter today.')}}</p>
				</div>
				{{-- <div class="col-md-4 col-sm-6">
				<form class="newsletter">
					 <input type="text" placeholder="Email Address"> 
                    <button class="newsletter_submit_btn" type="submit"><i class="fa fa-paper-plane"></i></button>	
				</form>
				
				</div> --}}
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
				<div class="col-md-12"><h3 style="text-align: right;">{{__('home.STAY CONNECTED')}}</h3></div>
				</div>
			</div>
	</div>
		<div class="second_class">
			<div class="container second_class_bdr">
			<div class="row d-flex" style="justify-content: space-around;">
				<div class="col-md-4 col-sm-6">
               
					<div class="footer-logo text-center"><img src="/image/logoVinfast.png" alt="Vinfast" >
					</div>
					
				</div>
				<div class="col-md-2 col-sm-6">
					<h3>{{__('home.Quick Links')}}</h3>
					<ul class="footer-links">
						@if(Auth::check())
							<li><a href="{{route('user.home_auth')}}">{{__('home.Home')}}</a>
						@else
							<li><a href="{{route('user.home')}}">{{__('home.Home')}}</a>
						@endif

						
						</li>
						<li><a href="{{url('/AboutUs')}}">{{__('About us')}}</a>
						</li>
						<li><a href="https://vinfastauto.us/privacy-policy" target="_blank">{{__('Privacy Policy')}}</a>
						</li>
						
					</ul>
				</div>
				<div class="col-md-3 col-sm-6">
					<h3>{{__('home.OUR EVENTS')}}</h3>
					<ul class="footer-category">
						<li><a href="https://vinfastauto.us/events/ces2022/mediacenter">{{__('home.Media Center')}}</a>
						</li>
						<li><a href="https://vinfastauto.us/events/CES2022">{{__('home.VinFast Global EV Day')}} </a>
						</li>
						<li><a href="https://vinfastauto.us/events/globalpremiere">{{__('home.Vinfast EV Global Premiere')}}</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				
			</div>
			
		</div>
		</div>
		
		<div class="row">
			<div class="container-fluid">
			<div class="copyright"> {{__('home.Copyright 2022 | All Rights Reserved by VINFAST Ltd.')}}</div>
			</div>
			
		</div>
	</div>
	
</footer>


</html>

