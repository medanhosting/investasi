@extends('layouts.frontend')

@section('body-content')

    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Pengajuan Owner</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Pengajuan Owner</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- about wrapper -->
    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="about-right-text" style="padding-top:0;">
                        <div class="widget-title">
                            <h4>Submit Proyek/Produk Anda</h4>
                        </div>
                        <p class="first">
                            Apakah Anda ingin mengajukan produk atau proyek ke website kami? hubungi kami melalui chat box atau email untuk informasi lebih lanjut.
                        </p>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection