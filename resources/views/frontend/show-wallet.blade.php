@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Dompet Saya</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Dompet Saya</h5>
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
                                <i class="fa fa-money fa-1x"></i> Dompet = Rp {{$user->wallet_amount}}
                            </h3>
                            <h3>
                                <i class="fa fa-money fa-1x"></i> Investme Point = {{$user->investme_point}}
                            </h3>

                        </div>
                        <div class="col-md-5 col-xs-12 center" style="padding-top:3%;">
                            <a href="{{route('deposit')}}" class="btn btn-big btn-success">Top Up Dompet</a>
                            <a href="{{route('withdraw')}}" class="btn btn-big btn-warning">Penarikan Dana</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Riwayat</h2>
                            <div class="clearfix"></div>
                        </div>
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
                                    @foreach($statements as $statement)
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
@endsection