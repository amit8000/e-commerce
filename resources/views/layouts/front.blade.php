<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
    @yield('title')
  </title>



  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Styles -->

  <link href="{{ asset('front/css/b5.css') }}" rel="stylesheet">

  <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!--Goo font awesome -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="{{asset('plugin/css/style.css')}}" type="text/css">


</head>
<style>
  a {
    text-decoration: none !important;
  }
</style>

<body>


  @include('layouts.inc.frontnav')

  <div class="content">
    @yield('content')
  </div>






  <script src="{{ asset('front/js/bun.js') }}"></script>
 

 
  <script src="{{ asset('front/js/custom.js') }}"></script> 
  <script src="{{ asset('front/js/checkout.js') }}"></script>

  <script src="{{asset('front/js/jquery.min.js')}}"></script>





  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(session('status'))
  <script>
    swal("{{session('status')}}");
  </script>
  @endif
  @yield('scripts')
</body>

</html>