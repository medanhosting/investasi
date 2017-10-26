@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Pembayaran</h2>
                <div class="short-text">
                    <h5>
                        <a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('my-wallet')}}">Dompet Saya</a>
                        <i class="fa fa-angle-double-right"></i>Top Up Dompet
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Causes Wrapper -->
    <div class="causes-page-wrapper single-cause">
        <div class="container" style="margin-bottom: 20px;">
            <div class="row cause">
                <div class="col-md-10 col-md-offset-1">
                    <div class="image-wrapper">
                        <img class="img-responsive" src="assets/img/causes/single-cause.jpg" alt="">
                    </div>
                    <div class="meta">
                        <h2>Pembayaran Gagal</h2>
                    </div>
                    <div class="clearfix">
                        <div class="foundings">
                            <p>Pembayaran anda gagal atau dibatalkan</p>
                        </div>
                    </div>
                    <div class="info-block" style="margin: 0; padding: 0;">
                        <a href="{{ route('my-wallet') }}" class="btn btn-big btn-solid" style="margin-left: 10px;">Kembali ke Dompet Saya</a>
                        <a href="{{ route('index') }}" class="btn btn-big btn-solid">Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection