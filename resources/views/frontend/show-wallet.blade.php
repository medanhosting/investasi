@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Total Dana Saya</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Total Dana Saya</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-7 col-xs-12 center">
                            <h3>
                                <i class="fa fa-money fa-1x"></i> Total Dana = Rp {{$user->wallet_amount}}
                            </h3>
                            <h3>
                                <i class="fa fa-money fa-1x"></i> Investme Point = {{$user->investme_point}}
                            </h3>

                        </div>
                        <div class="col-md-5 col-xs-12 center" style="padding-top:3%;">
                            <a href="{{route('deposit')}}" class="btn btn-big btn-success">Top Up Dana</a>
                            <a href="{{route('withdraw')}}" class="btn btn-big btn-warning">Penarikan Dana</a>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12">
                    <h2>Riwayat</h2>
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" >
                                <li><a href="#topup" data-toggle="tab">Top up</a></li>
                                <li><a href="#withdraw" data-toggle="tab">Penarikan</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="topup">
                                    <div class="x_panel">
                                        <div class="x_content table-responsive">
                                            <table id="datatable-responsive-debt" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Deskripsi</th>
                                                    <th class="text-right">Jumlah</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php( $idx = 1 )
                                                    @foreach($statementsTopup as $statement)
                                                        <tr>
                                                            <td>{{ $idx }}</td>
                                                            <td>{{ $statement->created_at }}</td>
                                                            <td>Top up dengan order id = {{ $statement->order_id }}</td>
                                                            <td class="text-right">Rp {{ $statement->amount }}</td>
                                                            @if($statement->status_id == 3)
                                                                <td>Pending</td>
                                                            @elseif($statement->status_id == 7)
                                                                <td>Dibatalkan</td>
                                                            @elseif($statement->status_id == 16)
                                                                <td>Top up Pending</td>
                                                            @elseif($statement->status_id == 17)
                                                                <td>Top up Selesai</td>
                                                            @else
                                                                <td>Selesai</td>
                                                            @endif

                                                        </tr>
                                                        @php( $idx++ )
                                                            @endforeach
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="withdraw">
                                    <div class="x_panel">
                                        <div class="x_content table-responsive">
                                            <table id="datatable-responsive-debt" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Deskripsi</th>
                                                    <th class="text-right">Jumlah</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @php( $idx = 1 )
                                                    @foreach($statementsWithdraw as $statement)
                                                        <tr>
                                                            <td>{{ $idx }}</td>
                                                            <td>{{ $statement->date }}</td>
                                                            <td>{{ $statement->description }}</td>
                                                            <td class="text-right">Rp {{ $statement->amount }}</td>
                                                            @if($statement->status_id == 3)
                                                                <td>Pending</td>
                                                            @elseif($statement->status_id == 7)
                                                                <td>Dibatalkan</td>
                                                            @else
                                                                <td>Selesai</td>
                                                            @endif

                                                        </tr>
                                                        @php( $idx++ )
                                                            @endforeach
                                                </tbody>
                                            </table>


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
@endsection