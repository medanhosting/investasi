@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Portfolio</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Portfolio</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#equity" data-toggle="tab">Equity</a></li>
                            <li><a href="#debt" data-toggle="tab">Debt</a></li>
                            <li><a href="#portfolio" data-toggle="tab">Portfolio Breakdown</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="equity">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Equity</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-equity" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Investment Amount</th>
                                                <th>Option</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($transactions as $trx)
                                                    <tr>
                                                        <td>{{ $idx }}</td>
                                                        <td>{{ $trx->invoice }}</td>
                                                        <td>{{ $trx->user->first_name }}&nbsp;{{ $trx->user->last_name }}</td>
                                                        <td>{{ $trx->payment_method->description }}</td>
                                                        <td>
                                                            <a href="{{route('portfolio-detail'), ['id' => $trx->id]}}" class="btn btn-primary">Detail</a>
                                                        </td>
                                                    </tr>
                                                    @php( $idx++ )
                                                        @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="debt">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Debt</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-debt" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Investment Amount</th>
                                                <th>Option</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($transactions as $trx)
                                                    <tr>
                                                        <td>{{ $idx }}</td>
                                                        <td>{{ $trx->invoice }}</td>
                                                        <td>{{ $trx->user->first_name }}&nbsp;{{ $trx->user->last_name }}</td>
                                                        <td>{{ $trx->payment_method->description }}</td>
                                                        <td>
                                                            <a href="{{route('portfolio-detail'), ['id' => $trx->id]}}" class="btn btn-primary">Detail</a>
                                                        </td>
                                                    </tr>
                                                    @php( $idx++ )
                                                        @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="portfolio">
                                <h2>Portfolio Breakdown</h2>
                                {{--<div id="chart_wrap" style="position: relative; padding-bottom: 100%; height: 0; overflow:hidden;">--}}
                                {{--<div id="chart_div" style="position: absolute; top: 0; left: 0; width:100%; height:100%;"></div>--}}
                                {{--</div>--}}
                                <div id="chart_wrap"><div id="chart_div"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Breakdown'],
                ['Cash', 13],
                ['Investasi', 6],
                ['Earning', 4]
            ]);

            var options = {
                chartArea : {left:0, 'bottom':'10%', 'width': '100%', 'height': '100%'}
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        $(window).on("throttledresize", function (event) {
            var options = {
                width: '100%',
                height: '100%'
            };

            var data = google.visualization.arrayToDataTable([]);
            drawChart(data, options);
        });
    </script>

@endsection