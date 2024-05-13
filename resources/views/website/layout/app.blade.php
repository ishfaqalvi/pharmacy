<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gurdeep singh osahan">
    <meta name="author" content="Gurdeep singh osahan">
    <title>@yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset(settings('website_fav_icon')) }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/website/vendor/slider/slider.css') }}">
    <!-- Select2 CSS -->
    <link href="{{ asset('assets/website/vendor/select2/css/select2-bootstrap.css') }}" />
    <link href="{{ asset('assets/website/vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome-->
    <link href="{{ asset('assets/website/vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/website/vendor/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/vendor/owl-carousel/owl.theme.css') }}">
</head>

<body>
    @include('website.layout.include.header')
   
    @include('website.layout.include.login')
   
    @yield('content')
   
    @include('website.layout.include.footer')

    @include('website.layout.include.cart-sidebar')
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/website/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- select2 Js -->
    <script src="{{ asset('assets/website/vendor/select2/js/select2.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('assets/website/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <!-- Slider Js -->
    <script src="{{ asset('assets/website/vendor/slider/slider.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/website/js/custom.js') }}"></script>
</body>
</html>