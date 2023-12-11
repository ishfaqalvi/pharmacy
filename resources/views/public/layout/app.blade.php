<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/web/css/plugins.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/web/css/main.css') }}"/>
    <link rel="shortcut icon" href="{{ asset('assets/web/image/favicon.ico') }}" type="image/x-icon">
    <title>Sakoon Pharmacy</title>
</head>
<body class="">
    <div class="site-wrapper">
        <header class="header petmark-header-1">
            @include('public.layout.header')
        </header>
        @yield('content')
        <footer class="site-footer">
            @include('public.layout.footer')
        </footer>
    </div>
    <script src="{{ asset('assets/web/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/web/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('assets/web/js/custom.js') }}"></script>
</body>
</html>