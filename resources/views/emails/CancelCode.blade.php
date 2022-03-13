<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <input type="hidden" class="idToken" value="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .im{
            color: black !important;
        }
    </style>
</head>
  <body>
      <div class="container">
          <h3>{{__('Dear mr/ms')}} {{$details['Customer Name']}},</h3>
          
          <p>{{__('VINFAST has completed the step of checking the personal information of your order')}} &nbsp;({{$details['Order Code']}}).</p>
          <p>{{__('We hereby confirm that all information provided is complete and correct')}}.</p>
          <p>{{__('In the next step, please make a deposit at the Payment button for the order to be processed')}}.</p>
          <p>{{__('Your cancel code:')}} &nbsp; {{$details['Cancel Code']}} </p>
           <p>{{__('During the payment process, if you have any problems that need assistance, please contact email')}}  support@vinfast.com.</p>
           <p>{{__('Thank you')}}.</p>
           <br>
           <h3>VINFAST</h3>

      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>