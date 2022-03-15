@extends('dashboard.layouts.layout')
@section('content')
@section('page_title')
    {{ "Home" }}
@endsection
    <link rel="stylesheet" href="/css/homepage.css">
    <link id="import_link_font_icon" rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Mulish:300,400,600,700&amp;display=swap&amp;subset=vietnamese">


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
                                <h2 class="titleCarousel">{{ __('Smart Technology For The Future') }}</h2>

                                <h5 class="contentCarousel">
                                    {{ __("With customer-centred philosophy, VinFast smart cars are integrated with world's most advanced") }}
                                    <br>
                                    {{ __('techonologies, namely AI based machine learning & deep learning, high-level autopilot for a') }}
                                    <br>
                                    {{ __('comfortable ride, immersive entertainment & personalized experience.') }}
                                </h5>
                            </div>
                            <img src="/HomepageImage/carouselHome/pic1.png" class="d-block w-100" alt="First slide">
                        </div>

                        <div class="carousel-item">
                            <div class="caption d-none d-md-block">
                                <h2 class="titleCarousel">{{ __('Passionate Design') }}</h2>
                                <h5 class="contentCarousel">
                                    {{ __('In collaboration with Pininfarina, a world-famous car design firm, VinFast offers premium & classy') }}
                                    <br>
                                    {{ __('design for every line of car. Each model is packed with distinctive & elegant exterior as well as modern') }}
                                    <br>
                                    {{ __('interior with meticulous attention to details.') }}
                                </h5>
                            </div>
                            <img src="/HomepageImage/carouselHome/pic2.png" class="d-block w-100" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <div class="caption d-none d-md-block">
                                <h2 class="titleCarousel">{{ __('World-class Safety Standards') }}</h2>
                                <h5 class="contentCarousel">
                                    {{ __('With customers assurance as the top priority, VinFast cars are equipped with state-of-art safety') }}<br>
                                    {{ __("features to protect drivers and passengers, meeting the rigorous standards of the world's top vehicle") }}
                                    <br>
                                    {{ __('assessment organizations, such as ASEAN NCAP, EURO NCAP, and NHTSA.') }}
                                </h5>
                            </div>
                            <img src="/HomepageImage/carouselHome/pic3.png" class="d-block w-100" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <div class="caption d-none d-md-block">
                                <h2 class="titleCarousel">{{ __('Excellent Experience') }}</h2>
                                <h5 class="contentCarousel">
                                    {{ __('VinFast cars enable their owners to enjoy the best values of our ecosystem, from the Online-To-Offline') }}<br>
                                    {{ __('business model that integrates e-commerce and in-person experiences at dealership, showrooms and ') }}<br>
                                    {{ __('charging stations nationwide, to outstanding after-sales service quality and dedication to customers.') }}
                                </h5>
                            </div>
                            <img src="/HomepageImage/carouselHome/pic4.png" class="d-block w-100" alt="Fourth slide">
                        </div>
                        <div class="carousel-item">
                            <div class="caption d-none d-md-block">
                                <h2 class="titleCarousel">{{ __('Understanding Polices') }}</h2>
                                <h5 class="contentCarousel">
                                    {{ __('VinFast always has the most beneficial sales and after-sales policy for customers. VinFast is also a ') }}<br>
                                    {{ __('pioneer in promoting the trend of using electric vehicles, towards a green and sustainable future with a ') }}<br>
                                    {{ __('battery policy and the only 10-year warranty on the market for electric cars.') }}
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
        @foreach($models as $model)
        <div class="col item">
          <img class="carImg" src="/storage/files/Image_Car/{{$model->image}}" alt="">
          <img class="carGif" src="/storage/files/Image_Car/gif/{{$model->gif}}" alt="">
          <div class="info">
            <div class="slogan">
              {{-- <div>
              {{__('Break the limits together')}}
              </div> --}}
            </div>
            <div class="title">
              <div>
              {{$model->model_name}}
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="type">
                <div>{{__("Vehicles")}}</div>
                <div>{{$model->car_type}}</div>

              </div>
              <div class="price">
                <div>{{__("Listed price")}}</div>
                @php
								 $carprice_nonFormat = $model->price;   				 
                 $car_price = number_format($carprice_nonFormat); 
							 @endphp 
                <div>{{__("from")}} {{$car_price}}VND</div>
              </div>
            </div>
          </div>

          @if(Auth::check())
          <a href="/user/auth/modeldetails/{{$model->model_id}}" class="view-detail">{{__("View Detail")}}</a>
          @else
          <a href="/user/modeldetails/{{$model->model_id}}" class="view-detail">{{__("View Detail")}}</a>
          @endif

                </div>
            @endforeach
        </div>


    </div>

    <!-- End CarCarousel -->
    <div class="TextCarousel">
        <img class="img-blue" src="https://storage.googleapis.com/vinfast-data-01/htcptg_1639632316_1639673399.jpg"
            alt="">
        <div class="container-fluid">
            <div class="row">
                <div class="col"></div>
                <div class="col-md-11 content-body">
                    <div class="content-title">
                        <h2>{{ __('Aspiration to conquer the world') }}</h2>
                    </div>
                    <div class="htcptg owl-carousel owl-theme child">
                        <div class="item">
                            <div class="desc">
                                {{ __('Aspiration to conquer the world') }}<br>
                                {{ __('but two vehicles are designed and manufactured ') }}<br>
                                {{ __('within 12 months.”') }}
                            </div>
                            <div class="author">
                                - Top Gear -
                            </div>
                        </div>
                        <div class="item">
                            <div class="desc">
                                {{ __('“The key success right from the production ') }}<br>
                                {{ __('process of VinFast mainly comes from their ') }}<br>
                                {{ __('prestige partners named ABB, Bosch, Magna ') }}<br>

                            </div>
                            <div class="author">
                                - CNBC -
                            </div>

                        </div>
                        <div class="item">
                            <div class="desc">
                                {{ __('“VinFast - Vietnamese automobile brand ') }}<br>
                                {{ __('of Vingroup is a typical model for their prompt ') }}<br>
                                {{ __('rehabilitation and astronautic move after ') }}<br>
                                {{ __('Vietnam has successfully controlled the Covid-19 pandemic , etc.”') }}
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
