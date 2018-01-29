<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Investasi.me</title>
    <!-- Bootstrap -->
    {{--<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{ URL::asset('css/frontend/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ URL::asset('owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/style.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Theme Style -->
    {{--<link rel="stylesheet" href="{{ URL::asset('css/frontend/custom.css') }}" >--}}
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/custom-newhome.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/custom-bayu.css') }}" >



</head>
<body>

<!-- HEADER -->
@include('frontend.partials._header')
<!-- //HEADER -->

@yield('body-content')

@include('frontend.partials._modal-ads')
<!-- FOOTER -->
@include('frontend.partials._footer-new')
<!-- //FOOTER -->

<!-- Scripts -->
<script type="text/javascript" src="{{ URL::asset('js/frontend/jquery2.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type="text/javascript" src="{{ URL::asset('js/frontend/jquery.meanmenu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/progress-bar-appear.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/nivo-lightbox.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/isotope.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/countdown.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/frontend/plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/js.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('js/frontend/custom-bayu.js') }}"></script>


<!-- ZOPIM Live Chat -->
{{--<!--Start of Zendesk Chat Script-->--}}
{{--<script type="text/javascript">--}}
    {{--window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=--}}
        {{--d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.--}}
    {{--_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");--}}
        {{--$.src="https://v2.zopim.com/?5DR2k2P8dAZxMsdjIfGMPxZySekfGBLC";z.t=+new Date;$.--}}
            {{--type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");--}}
{{--</script>--}}
{{--<!--End of Zendesk Chat Script-->--}}

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5a6ade9d4b401e45400c6944/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<script>
    function adsModalFunction() {
        $("#adsModal").modal()
    }

    $( document ).ready(function() {
        setTimeout(adsModalFunction, 60000);
    });
</script>


</body>
</html>