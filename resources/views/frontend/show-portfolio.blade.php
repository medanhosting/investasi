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
                <div id="tabs" class="panel with-nav-tabs panel-default">
                    <div  id="tabs" class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li {{$isActiveTabPending}}><a href="{{route('portfolio', ['tab' => 'pending'])}}">Pending Transaksi</a></li>
                            <li {{$isActiveTabEquity}}><a href="{{route('portfolio', ['tab' => 'equity'])}}">Saham / Bagi Produk</a></li>
                            <li {{$isActiveTabDebt}}><a href="{{route('portfolio', ['tab' => 'debt'])}}">Hutang Portfolio</a></li>
                            <li><a href="#portfolio" data-toggle="tab">Portfolio Breakdown</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade {{$isActivePending}}" id="pending">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Pending Transaksi</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-pending" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Beli</th>
                                                <th>Jumlah Investasi</th>
                                                <th>Jenis</th>
                                                <th>Update Terkini</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($transactionPending as $trx)
                                                    <tr>
                                                        <td>{{ $idx }}</td>
                                                        <td>
                                                            <a href="{{ route('project-detail', ['id' => $trx->product_id]) }}">{{ $trx->Product->name}}</a>
                                                        </td>
                                                        <td>{{ $trx->created_on }}</td>
                                                        <td>{{ $trx->total_price }}</td>
                                                        <td>{{ $trx->Product->Category->name }}</td>
                                                        <td>Tahap Pengumpulan Dana</td>
                                                    </tr>
                                                    @php( $idx++ )
                                                        @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{$isActiveEquity}}" id="equity">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Saham / Bagi Hasil</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-equity" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Beli</th>
                                                <th>Jumlah Investasi</th>
                                                <th>Jenis</th>
                                                <th>Update Terkini</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($transactionSahamHasil as $trx)
                                                    <tr>
                                                        <td>{{ $idx }}</td>
                                                        <td>
                                                            <a href="{{ route('project-detail', ['id' => $trx->product_id]) }}">{{ $trx->Product->name}}</a>
                                                        </td>
                                                        <td>{{ $trx->created_on }}</td>
                                                        <td>{{ $trx->total_price }}</td>
                                                        <td>{{ $trx->Product->Category->name }}</td>
                                                        <td>{{ $trx->created_on }}</td>
                                                    </tr>
                                                    @php( $idx++ )
                                                        @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{$isActiveDebt}}" id="debt">

                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Hutang</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-debt" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Beli</th>
                                                <th>Jumlah Investasi</th>
                                                <th>Update Pembayaran</th>
                                                <th>Status Kolektibilitas</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($transactionHutang as $trx)
                                                    <tr>
                                                        <td>{{ $idx }}</td>
                                                        <td>
                                                            <a href="{{ route('project-detail', ['id' => $trx->product_id]) }}">{{ $trx->Product->name}}</a>
                                                        </td>
                                                        <td>{{ $trx->created_on }}</td>
                                                        <td>{{ $trx->total_price }}</td>
                                                        <td>{{ $trx->total_price }}</td>
                                                        @php($color = 'background-color: green')
                                                        <td style="{{$color}}">

                                                        </td>
                                                    </tr>
                                                    @php( $idx++ )
                                                        @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-6" style="text-align: right;">
                                            <p>Keterangan</p>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ URL::asset('frontend_images/keterangan.jpg') }}" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="portfolio">
                                <h2>Portfolio Breakdown</h2>
                                <h5>Dompet : Rp {{ $userDompet }}</h5>
                                <h5>Investasi : Rp {{ $userInvestasi }}</h5>
                                <h5>Pendapatan : Rp {{ $userPendapatan }}</h5>

                                <input type="hidden" id="dompet" value="{{ $userDompet }}">
                                <input type="hidden" id="investasi" value="{{ $userInvestasi }}">
                                <input type="hidden" id="pendapatan" value="{{$userPendapatan }}">
                                {{--<div id="chart_wrap"><div id="chart_div"></div></div>--}}
                                <div id="chart_wrap"><div id="chart"></div></div>
                                <p id="canvas_size"></p>
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

        $(window).on("throttledresize", function (event) {
            drawChart();
        });

        function drawChart() {
            var dompetFormatedVal = $('#dompet').val();
            var dompetVal = dompetFormatedVal.replace(".", "");

            var investFormatedVal = $('#investasi').val();
            var investVal = investFormatedVal.replace(".", "")

            var pendapatanFormatedVal = $('#pendapatan').val();
            var pendapatanVal = pendapatanFormatedVal.replace(".", "");

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Breakdown'],
                ['Dompet', parseInt(dompetVal)],
                ['Investasi', parseInt(investVal)],
                ['Pendapatan', parseInt(pendapatanVal)]
            ]);
            var chart = new google.visualization.PieChart(document.getElementById('chart'));
            var widthWindow = $(window).width();
            if(widthWindow < 480){
                var options = {
                    chartArea : {'left':'0', 'bottom':'10%', 'width': '75%', 'height': '75%'},
                    legend:{alignment :'top'}
                };

                chart.draw(data, options);
            }
            else{
                var options = {
                    chartArea : {'left':'0', 'bottom':'10%', 'width': '100%', 'height': '100%'},
                    legend: {position: 'labeled', alignment:'center'}
                };

                chart.draw(data, options);
            }
        }
    </script>

@endsection