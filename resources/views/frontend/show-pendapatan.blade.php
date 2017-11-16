@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Pendapatan</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Pendapatan</h5>
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
                            <li class="active"><a href="#equity" data-toggle="tab">Saham</a></li>
                            <li><a href="#debt" data-toggle="tab">Debt Portfolio</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="equity">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Saham</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-debt" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Total Dividen</th>
                                                <th>Update Terkini</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($transactions as $trx)
                                                    <tr>
                                                        <td>{{ $idx }}</td>
                                                        <td>{{ $trx->Product->name}}</td>
                                                        <td>{{ $trx->total_price }}</td>
                                                        <td>{{ $trx->created_on }}</td>
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
                                        <table id="datatable-responsive-equity" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Status Kolektibilitas</th>
                                                <th>Total Bunga / Kupon Diterima</th>
                                                <th>Tanggal Pembayaran Terakhir</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($transactions as $trx)
                                                    <tr>
                                                        <td>{{ $idx }}</td>
                                                        <td>{{ $trx->Product->name}}</td>
                                                        @php($color = 'background-color: green')
                                                        <td style="{{$color}}">

                                                        </td>
                                                        <td>{{ $trx->total_price }}</td>
                                                        <td>{{ $trx->created_on }}</td>
                                                    @php( $idx++ )
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="col-md-6" style="text-align: right;">
                                            <p>Keterangan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ URL::asset('frontend_images/keterangan.jpg') }}">
                                        </div>
                                    </div>
                                </div>
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