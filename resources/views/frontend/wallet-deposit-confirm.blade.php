@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Top Up Dompet</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('my-wallet')}}">Dompet Saya</a>
                        <i class="fa fa-angle-double-right"></i>Top Up Dompet
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="donation-wrapper">
                    <div class="container" >
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                {!! Form::open(array('action' => 'Frontend\WalletController@DepositSubmit', 'method' => 'POST', 'role' => 'form')) !!}
                                {{ csrf_field() }}

                                <div class="custom-container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Jumlah Top Up
                                        </div>
                                        <div class="col-md-6">
                                            <span class="pull-right">Rp {{ $amountStr }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            Biaya Admin
                                        </div>
                                        <div class="col-md-6">
                                            <span class="pull-right">Rp 4.000</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            Total Top Up
                                        </div>
                                        <div class="col-md-6">
                                            <span class="pull-right">Rp {{ $totalAmountStr }}</span>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            {{ Form::hidden('amount', $amount, array('id' => 'amount')) }}
                                            {{ Form::hidden('method', 'bank_transfer', array('id' => 'method')) }}
                                            <hr>
                                            <p style="font-size: 12px;">Anda akan berpindah ke halaman pembayaran kami. Mohon mengikuti instruksi yang akan kami berikan.</p>
                                            <button type="submit" class="btn btn-primary">Top Up Sekarang!</button>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection