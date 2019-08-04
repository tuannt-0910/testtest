<!DOCTYPE html>
<html lang="en">
<head>
    <title>Academics &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
    <link href="{{ asset(mix('css/client.css')) }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ asset('Client/js/jquery.mb.YTPlayer.min.js') }}"></script>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        @include('Client.layouts.header')

        @yield('content')

        @include('Client.layouts.footer')
    </div>

    <script type="text/javascript" src="{{ asset(mix('js/client.js')) }}"></script>
</body>
</html>
