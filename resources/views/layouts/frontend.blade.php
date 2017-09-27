<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Investasi.me</title>
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/style.css') }}">


    <!-- HTML5 shim and Respond.js') }} for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->

</head>
<body>

<!-- HEADER -->
@include('frontend.partials._header')
<!-- //HEADER -->

@yield('body-content')

<!-- FOOTER -->
@include('frontend.partials._footer')
<!-- //FOOTER -->

<!-- Scripts -->
<script type="text/javascript" src="{{ URL::asset('js/frontend/jquery2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/jquery.meanmenu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/progress-bar-appear.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/nivo-lightbox.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/isotope.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/countdown.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBEypW1XtGLWpikFPcityAok8rhJzzWRw "></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/gmaps.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/js.js') }}"></script>

</body>
</html>