<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/plugins.css') }}"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/web/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/web/css/custom.css?v=1.1') }}"/>
    <link rel="shortcut icon" href="{{ asset('assets/web/image/favicon.ico') }}" type="image/x-icon">
    <title>@yield('page_title')</title>
</head>
<body class="@if (str_contains(url()->full(), '/products/show')) elevet-enable @endif">
    <div id="overlay" style="display:none;">
        <div class="spinner"></div>
        <br/>
        Loading...
    </div>
    <div class="site-wrapper">
        <!-- Site Header Starts -->
        <header class="header petmark-header-1">
            <div class="header-wrapper">
                @include('web.include.header.header-wrapper')
            </div>
            <div class="header-nav-wrapper">
                @include('web.include.header.header-nav-wrapper')
            </div>
        </header>
        <!-- Site Header End -->

        <!-- Site Content Starts -->
        @yield('content')
        <!-- Site Content End -->

        <!-- Site Footer Starts -->
        <footer class="site-footer">
            <div class="container">
                @include('web.include.footer.container')
            </div>
            <div class="footer-copyright">
                @include('web.include.footer.copyright')
            </div>
        </footer>
        <!-- Site Footer End -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/web/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/web/js/ajax.js') }}"></script>
    <script src="{{ asset('assets/web/js/custom.js') }}"></script>
    @yield('script')
</body>
</html>