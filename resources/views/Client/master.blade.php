<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('Client/fonts/front.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Client/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('Client/css/aos.css') }}">
    <link href="{{ asset('Client/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset(mix('css/client.css')) }}">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        @include('Client.layouts.header')

        @yield('content')

        @include('Client.layouts.footer')

        @include('Client.layouts.loader')
    </div>

    <script src="{{ asset('Client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Client/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('Client/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('Client/js/popper.min.js') }}"></script>
    <script src="{{ asset('Client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Client/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('Client/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('Client/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('Client/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('Client/js/aos.min.js') }}"></script>
    <script src="{{ asset('Client/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('Client/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('Client/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('Client/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('Client/js/main.js') }}"></script>

    @yield('script')
</body>
</html>
