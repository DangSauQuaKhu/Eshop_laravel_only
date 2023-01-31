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

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  {{-- <link rel="stylesheet" href="{{asset('frondend/css/bootstrap5.css')}}"> --}}
    <!-- Scripts -->
   <link rel="stylesheet" href="{{asset('/frondend/css/custom.css')}}">
   <link rel="stylesheet" href="{{asset('/frondend/css/bootstrap5.css')}}">
   <link rel="stylesheet" href="{{asset('/frondend/css/owl.carousel.min.css')}}">
   <link rel="stylesheet" href="{{asset('/frondend/css/owl.theme.default.min.css')}}">
   <style>
    a{
        text-decoration: none !important;
    }
    
   </style>
 
  
</head>
<body>
       @include('layouts.inc.frontnavbar')
        <div class="content">
            @yield('content')
        </div>

    <script src="{{asset('/frondend/js/jquery-3.6.3.min.js')}}"defer></script>
   
    <script src="{{asset('/frondend/js/bootstrap.bundle.min.js')}}"defer></script>
    
    <script src="{{asset('/frondend/js/owl.carousel.min.js')}}"defer></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
    <script>
      swal("{{session ('status')}}");
          </script>
        
    @endif
   @yield('scripts') 
    
</body>
</html>
