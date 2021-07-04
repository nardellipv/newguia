<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Guía Celíaca | @yield('title','Comercios celíacos Argentinos') {{ date('Y') }}</title>

    <!-- Fav and touch icons -->

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="{{ asset('styleWeb/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="{{ asset('styleWeb/assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Flaticons -->
    <link href="{{ asset('styleWeb/assets/css/font/flaticon.css') }}" rel="stylesheet">
    <!-- Swiper Slider -->
    <link href="{{ asset('styleWeb/assets/css/swiper.min.css') }}" rel="stylesheet">
    <!-- Range Slider -->
    <link href="{{ asset('styleWeb/assets/css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <!-- magnific popup -->
    {{--  <link href="{{ asset('styleWeb/assets/css/magnific-popup.css') }}" rel="stylesheet"> --}}
    <!-- Nice Select -->
    {{--  <link href="{{ asset('styleWeb/assets/css/nice-select.css') }}" rel="stylesheet"> --}}
    <!-- Custom Stylesheet -->
    <link href="{{ asset('styleWeb/assets/css/style.css') }}" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="{{ asset('styleWeb/assets/css/responsive.css') }}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <!-- place -->

    @yield('style')

    {!! htmlScriptTagJsApi() !!}
</head>

<body>
    <!-- Navigation -->
    @include('web.parts._header')
    <div class="main-sec"></div>
    <!-- Navigation -->
    @include('sweetalert::alert')


    @yield('content')


    <!-- footer -->
    @include('web.parts._footer')
    <!-- footer -->

    <!-- Place all Scripts Here -->
    <!-- jQuery -->
    <script src="{{ asset('styleWeb/assets/js/jquery.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ asset('styleWeb/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('styleWeb/assets/js/bootstrap.min.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('styleWeb/assets/js/ion.rangeSlider.min.js') }}"></script>
    <!-- Swiper Slider -->
    <script src="{{ asset('styleWeb/assets/js/swiper.min.js') }}"></script>
    <!-- Nice Select -->
    <script src="{{ asset('styleWeb/assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('styleWeb/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- sticky sidebar -->
    <script src="{{ asset('styleWeb/assets/js/sticksy.js') }}"></script>
    <!-- Munch Box Js -->
    <script src="{{ asset('styleWeb/assets/js/munchbox.js') }}"></script>
    <!-- /Place all Scripts Here -->
</body>

</html>