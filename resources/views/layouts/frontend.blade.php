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
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/style.css') }}">

    <!-- bootstrap-file-input -->
    <link href="{{ URL::asset('css/kartik-bootstrap-file-input/fileinput.min.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/custom.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/custom-bayu.css') }}" >

    <!-- Pie Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!-- HEADER -->
@include('frontend.partials._header')
<!-- //HEADER -->

@yield('body-content')

@include('frontend.partials._modal-ads')
<!-- FOOTER -->
@include('frontend.partials._footer')
<!-- //FOOTER -->

<!-- Scripts -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
<script type="text/javascript" src="{{ URL::asset('js/frontend/jquery2.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--<script type="text/javascript" src="{{ URL::asset('js/frontend/bootstrap.min.js') }}"></script>--}}

<!-- bootstrap-file-input -->
<script src="{{ URL::asset('js/kartik-bootstrap-file-input/fileinput.min.js') }}"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js "></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

<script type="text/javascript" src="{{ URL::asset('js/frontend/jquery.meanmenu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/progress-bar-appear.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/nivo-lightbox.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/isotope.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/countdown.js') }}"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBROUPyS84INXyl7iqq0NxSLmHudbQ_Dc4 "></script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBROUPyS84INXyl7iqq0NxSLmHudbQ_Dc4&libraries=places&callback=initMap" async defer></script>--}}

{{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&callback=initialize"></script>--}}

<script type="text/javascript" src="{{ URL::asset('js/frontend/plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/js.js') }}"></script>

<!-- Resize js -->
<script type="text/javascript" src="https://rawgit.com/louisremi/jquery-smartresize/master/jquery.throttledresize.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/frontend/custom-maps.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/custom-bayu.js') }}"></script>

<script>
    function adsModalFunction() {
        $("#adsModal").modal()
    }


    $('#datatable-responsive-debt').DataTable();
    $('#datatable-responsive-equity').DataTable();
    $('#datatable-responsive-sharing').DataTable();
    $('#verification-photo').fileinput();

    /**
     *  BootTree Treeview plugin for Bootstrap.
     *
     *  Based on BootSnipp TreeView Example by Sean Wessell
     *  URL:	http://bootsnipp.com/snippets/featured/bootstrap-30-treeview
     *
     *	Revised code by Leo "LeoV117" Myers
     *
     */
    $.fn.extend({
        treeview:	function() {
            return this.each(function() {
                // Initialize the top levels;
                var tree = $(this);

                tree.addClass('treeview-tree');
                tree.find('li').each(function() {
                    var stick = $(this);
                });
                tree.find('li').has("ul").each(function () {
                    var branch = $(this); //li with children ul

                    branch.prepend("<i class='tree-indicator glyphicon glyphicon-chevron-right'></i>");
                    branch.addClass('tree-branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');

                            icon.toggleClass("glyphicon-chevron-down glyphicon-chevron-right");
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();

                    /**
                     *	The following snippet of code enables the treeview to
                     *	function when a button, indicator or anchor is clicked.
                     *
                     *	It also prevents the default function of an anchor and
                     *	a button from firing.
                     */
                    branch.children('.tree-indicator, button, a').click(function(e) {
                        branch.click();

                        e.preventDefault();
                    });
                });
            });
        }
    });

    /**
     *	The following snippet of code automatically converst
     *	any '.treeview' DOM elements into a treeview component.
     */
    $(window).on('load', function () {
        $('.treeview').each(function () {
            var tree = $(this);
            tree.treeview();
        })
    })
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBROUPyS84INXyl7iqq0NxSLmHudbQ_Dc4&libraries=places&callback=init" async defer></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/gmaps.js') }}"></script>
</body>
</html>