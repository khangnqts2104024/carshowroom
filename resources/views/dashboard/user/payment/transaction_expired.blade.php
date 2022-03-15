@extends('dashboard.layouts.layout')
@section('content')
    <div class="container" style="padding-top: 30px;padding-bottom: 0px;">
        <h1></h1>
        <div class="jumbotron text-center" style="margin-top:50px;">
            <h1 class="display-3">{{__('Your Transaction Has Expired')}}</h1> 
            <hr>
            <p>
              {{__('Having trouble?')}} <a href="mailto:carshowroom2022@gmail.com">{{__('Send Email For Us')}}</a>
            </p>
            <p class="lead">
              @if(Auth::check())
                <a class="btn btn-primary btn-sm" href="/user/auth/home" role="button">{{__('Back to homepage')}}</a>
              @else
              <a class="btn btn-primary btn-sm" href="/user/home" role="button">{{__('Back to homepage')}}</a>
              @endif
            </p>
          </div>
    </div>
@endsection