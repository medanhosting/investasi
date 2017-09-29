<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Investasi.me</title>
    <!-- Bootstrap -->
    {{--<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/style.css') }}">

    <!-- Datatables -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/custom.css') }}" >

    <!-- Pie Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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


<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js "></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

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

<!-- Resize js -->
<script type="text/javascript" src="https://rawgit.com/louisremi/jquery-smartresize/master/jquery.throttledresize.js"></script>

<script>
    $('#datatable-responsive-debt').DataTable();
    $('#datatable-responsive-equity').DataTable();
</script>

</body>
</html>