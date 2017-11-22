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
    <link href="{{ URL::asset('css/admin/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ URL::asset('css/admin/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ URL::asset('css/admin/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/admin/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }} " rel="stylesheet">

    {{-- include timeline-dotted css --}}
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/timeline-dotted.css') }}" >

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/custom.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('css/frontend/custom-bayu.css') }}" >

    <!-- Pie Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

    <!-- include libraries(jQuery, bootstrap, fontawesome) -->
    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
    {{--<link href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.0/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.7.0/summernote.js"></script>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/jquery2.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ URL::asset('js/frontend/bootstrap.min.js') }}"></script>--}}

<!-- bootstrap-file-input -->
<script src="{{ URL::asset('js/kartik-bootstrap-file-input/fileinput.min.js') }}"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js "></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="{{ URL::asset('css/admin/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('css/admin/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ URL::asset('css/admin/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>

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

{{-- js for wysiwyg editor --}}
<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">

<script src="{{ URL::asset('js/admin/summernote/summernote.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/admin/summernote/summernote.css') }}">


<script type="text/javascript" src="{{ URL::asset('js/frontend/custom-maps.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/frontend/custom-bayu.js') }}"></script>


<script>

    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }

        $('.summernote').summernote({
            height: 400
        });
    });

    $('#datatable-responsive-debt').DataTable({
        "responsive": {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        }
    });
    $('#datatable-responsive-equity').DataTable({
        "responsive": {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        }
    });
    $('#datatable-responsive-pending').DataTable({
        "responsive": {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        }
    });
    $('#datatable-responsive-sharing').DataTable({
        "responsive": {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        }
    });
    $('#datatable-responsive-blog').DataTable({
        "responsive": {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        },
        "paging": false,
        "searching": false,
    });
    $('#datatable-responsive').DataTable({
        "responsive": {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate,
                type: ''
            }
        }
    });

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

    //        $('.nav-tabs > li > a').on("click",function(e){
    //            e.preventDefault();
    //
    //            $($.fn.dataTable.tables( true ) ).css('width', '100%');
    //            $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
    //        });
    //        $('#tabs').tabs({
    //            activate: recalculateDataTableResponsiveSize,
    //            create: recalculateDataTableResponsiveSize
    //        });
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

<!-- ZOPIM Live Chat -->
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="https://v2.zopim.com/?5DR2k2P8dAZxMsdjIfGMPxZySekfGBLC";z.t=+new Date;$.
            type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59f6e999249e3f1c"></script>


</body>
</html>