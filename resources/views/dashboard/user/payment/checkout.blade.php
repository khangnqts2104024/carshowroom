@extends('dashboard.layouts.layout')
@section('content')

   

    <link rel="stylesheet" href="checkout.css">

  @if(isset($resultCode))
    @if($resultCode == 0)
      <div class="jumbotron text-center" style="margin-top:50px;">
        <h1 class="display-3">{{__('Your Payment Was Successful')}}</h1>
        @if(Auth::check())
        <p class="lead"> {{__('Thank you for your payment. You can track your order')}} <a href="http://127.0.0.1:8000/user/profile/auth/order_history">{{__('here')}}</a>.</p>
        @else
        <p class="lead"> {{__('Thank you for your payment. You can track your order')}} <a href="http://127.0.0.1:8000/user/order_tracking">{{__('here')}}</a>.</p>
        @endif
        
        <hr>
        <p>
          {{__('Having trouble?')}} <a href="mailto:carshowroom2022@gmail.com">{{__('Send Email For Us')}}</a>
        </p>
        <p class="lead">
          @if(Auth::check())
            <a class="btn btn-primary btn-sm" href="/user/auth/home" role="button">{{__('Continue to homepage')}}</a>
          @else
          <a class="btn btn-primary btn-sm" href="/user/home" role="button">{{__('Continue to homepage')}}</a>
          @endif
        </p>
      </div>
    
    @else
    <div class="jumbotron text-center" style="margin-top:50px;">
      <h1 class="display-3">{{__('Payment Failed')}}</h1>
        <p class="lead"> {{__('Your payment was not successfully processed. Please contact')}} <a href="mailto:carshowroom2022@gmail.com">{{__('our customer support')}}</a>  {{__('or try')}} <a href="/user/momo_payment/{{$order_id}}/{{$deposit}}">{{__('payment again')}}</a>.</p>
      <hr>
      
      <p class="lead">
        @if(Auth::check())
          <a class="btn btn-primary btn-sm" href="/user/auth/home" role="button">{{__('Back to homepage')}}</a>
        @else
          <a class="btn btn-primary btn-sm" href="/user/home" role="button">{{__('Back to homepage')}}</a>
        @endif
      </p>
    </div>
    @endif
  @endif
   

@endsection