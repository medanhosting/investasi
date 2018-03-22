@extends('layouts.frontend-home')

@section('body-content')
    @if(auth()->check())
        <!-- Features -->
        <div class="features-wrapper one">
            <div class="container" style="margin-top: 40px;">
                <div class="section-name one">
                    <h2>
                        Halo Selamat Datang , {{ \Illuminate\Support\Facades\Auth::User()->first_name }} {{ \Illuminate\Support\Facades\Auth::user()->last_name }}
                        <br>
                        Saat ini Anda memiliki {{$onGoingProducts}} proyek berjalan
                    </h2>
                </div>
                <div class="row features">
                    <div class="col-md-4 col-sm-12" data-toggle="tooltip" data-placement="bottom" title="Investasi sekarang adalah list proyek yang dapat didanai, link ini sama seperti pada link investasi pada menu utama di header">
                        <a href="{{route('project-list', ['tab' => 'debt'])}}">
                            <div class="feature clearfix">
                                <img class="homepage-section1-img" src="{{ URL::asset('frontend_images/homepage/login-1.png') }}">
                                <h4>Danai Proyek</h4>
                                <div class="feature-div">
                                    <p>Saat ini terdapat {{$recentProductCount}} proyek bisa Anda danai</p>
                                    {{--<p>3 hampir selesai, 3 selesai</p>--}}
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-12 " data-toggle="tooltip" data-placement="bottom" title="Dompet saya adalah menu yang digunakan investor untuk melakukan deposit, memeriksa saldo maupun melakukan penarikan.">

                        <a href="{{route('my-wallet')}}">
                            <div class="feature clearfix">
                                <img class="homepage-section1-img" src="{{ URL::asset('frontend_images/homepage/login-2.png') }}">
                                <h4>Penarikan & Penambahan Dana</h4>
                                <div class="feature-div">
                                    <p>Total Dana Anda saat ini Rp. {{$user->wallet_amount}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-12" data-toggle="tooltip" data-placement="bottom" title="Pendapatan adalah menu investor melakukan pengecekan terhadap hasil keuntungan (kerugian) hasil bunga atau dividen atau bagi hasil dari investasinya.">

                        <a href="{{route('pendapatan')}}">
                            <div class="feature  clearfix">
                                <img class="homepage-section1-img" src="{{ URL::asset('frontend_images/homepage/login-3.png') }}">
                                <h4>Ringkasan Akun Anda </h4>
                                <div class="feature-div">
                                    <p>Monitor pendapatan Anda disini</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else

        <!-- apa itu indofund.id -->
        <div class="special-cause fullpage_background">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="section-name-first parallax one" style="line-height: 1.3;padding-top:10%;margin-bottom: 5%;color:white !important; margin-left: 15%;">
                        <h1 style="color: white !important;">{{ $section_1->content_1 }}</h1>
                        <br>
                        <h3 style="color: white !important;line-height: 25px;">
                            {!! $section_1->content_2 !!}
                        </h3>
                        <br><br>
                        <a href="{{ $section_1->link }}" class="btn btn-big btn-solid "><span style="font-size: 16px;">{{ $section_1->content_3 }}</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- basic-slider start -->
        {{--<div class="slider-section">--}}
            {{--<div class="slider-active owl-carousel">--}}
                {{--<div class="single-slider slider-screen nrbop" style="background-image: url({{ URL::asset('frontend_images/slides/Banner1.jpg') }});background-size: 100%;">--}}
                    {{--<div class="container">--}}
                        {{--<div class="slider-content text-white">--}}
                            {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >Apakah Anda tau? </h2>--}}
                            {{--<p class="b_faddown2">Tidak ada satupun zebra memiliki pola belang yang sama.--}}
                                {{--<br />Demikian juga dalam setiap bisnis dan investasi <br> Oleh karena itu kami ada </p>--}}
                            {{--<div class="slider_button b_faddown3"><a href="#">Investasi Sekarang</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="single-slider slider-screen nrbop" style="background-image: url({{ URL::asset('frontend_images/slides/Banner2.jpg') }});background-size: 100%;">--}}
                    {{--<div class="container">--}}
                        {{--<div class="slider-content text-white">--}}
                            {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >Sukses dimulai dari hal kecil  </h2>--}}
                            {{--<p class="b_faddown2">Investasi yang sukses dimulai dari bisnis yang sukses--}}
                                {{--<br />semua kesuksesan selalu dimulai dari awal yang kosong. <br>Kami menghargai setiap bisnis dan investasi Anda</p>--}}
                            {{--<div class="slider_button b_faddown3"><a href="#">Investasi Sekarang</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="single-slider slider-screen nrbop" style="background-image: url({{ URL::asset('frontend_images/slides/Banner3.jpg') }});background-size: 100%;">--}}
                    {{--<div class="container">--}}
                        {{--<div class="slider-content text-white">--}}
                            {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >Berinvestasilah pada proyek terbaru kami </h2>--}}
                            {{--<p class="b_faddown2">Pabrik XYZ adalah pabrik pembuatan obat-obatan yang dapat anda investasikan dana Anda hari ini juga.--}}
                                {{--<br />Silahkan akses link untuk mendapatkan info lengkap!</p>--}}
                            {{--<div class="slider_button b_faddown3"><a href="#">Investasi Sekarang</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        <!-- apa itu indofund.id -->
        <div class="special-cause fullpage_background2">
            <div class="row">
                <div class="col-md-offset-6 col-md-6 col-xs-12">
                    <div class="section-name-first parallax one" style="line-height: 1.3;padding-top:5%;margin-bottom: 3%;">
                        {{--<h2 style="color: white !important;">Apa itu Investasi.me</h2>--}}
                        <h1>{{ $section_2->content_1 }}</h1>
                        <h2 style="color:black;">{!! $section_2->content_2 !!}</h2>
                        <img src="{{ URL::asset('frontend_images/homepage/border.png') }}" style="padding: 5% 5% 5% 0;">
                        <br>
                        <span style="font-size:14px;">
                            {!! $section_2->content_3 !!}
                        </span>
                    </div>
                    <div class="btns-wrapper">
                        <a href="{{ $section_2->link }}" class="btn btn-big btn-solid "><span>{{ $section_2->content_4 }}</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- p2p lending -->
        <div class="special-cause fullpage_background3">
            <div class="row">
                <div class="col-md-6 col-xs-12 donet__area" style="background: none; border: none;padding-left: 10%;">
                    <div class="section-name parallax one" style="color: white !important; padding-bottom:5%;">
                        <h2>{{ $section_3->content_1 }} </h2>
                        <h1 class="homepage-section3-h1">{{ $section_3->content_2 }}</h1>
                        <img src="{{ URL::asset('frontend_images/homepage/border.png') }}" style="padding: 5% 5% 5% 0;">
                        <br>
                        <h2>{{ $section_3->content_3 }}</h2>
                        <span>{{ $section_3->content_4 }}</span>
                    </div>
                    <div class="btns-wrapper">
                        <a href="{{ $section_3->link }}" class="btn btn-big btn-solid "><span style="font-size: 20px;">{{ $section_3->content_5 }}</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- langkah -->
        <div class="special-cause fullpage_background4">
            <div class="row">
                <div class="section-name one">
                    <div class="short-text">
                        <span style="color: white !important;font-size: 24px;">{{ $section_4_1->content_1 }}</span>
                    </div>
                    <h1 style="color: white !important;font-size:70px;">{{ $section_4_1->content_2 }}</h1>
                </div>

                <div class="team-members row" style="padding: 5% 10% 0 10%;">
                    <div class="col-md-3 col-sm-12 col-xs-12 hidden-sm">
                        <div class="homepage-section4-img-text" style="display: table; #position: relative; overflow: hidden;">
                            <div style=
                                 "#position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
                                <div style=" #position: relative; #top: -50%; color: white !important;">
                                    <h2>{{ $section_4_2->content_1 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 hidden-lg hidden-md hidden-xs" style="padding:30px 0 20px 0;">
                        <h2 style="color: white !important;">{{ $section_4_2->content_1 }}</h2>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 center">
                        <img src="{{ URL::asset('frontend_images/homepage/'.$section_4_2->content_2) }}" alt="" class="homepage-section4-img">
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 center">
                        <img src="{{ URL::asset('frontend_images/homepage/'.$section_4_2->content_3) }}" alt="" class="homepage-section4-img">
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 center">
                        <img src="{{ URL::asset('frontend_images/homepage/'.$section_4_2->content_4) }}"alt="" class="homepage-section4-img">
                    </div>
                </div>
                <div class="team-members row" style="padding: 0 10% 0 10%;">
                    <div class="col-md-3 col-sm-12 col-xs-12 hidden-sm">
                        <div class="homepage-section4-img-text" style="display: table; #position: relative; overflow: hidden;">
                            <div style=
                                 "#position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
                                <div style=" #position: relative; #top: -50%;color: white !important;">
                                    <h2>{{ $section_4_3->content_1 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 hidden-lg hidden-md hidden-xs" style="padding:30px 0 20px 0;">
                        <h2 style="color: white !important;">{{ $section_4_3->content_1 }}</h2>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 center">
                        <img src="{{ URL::asset('frontend_images/homepage/'.$section_4_3->content_2) }}"alt="" class="homepage-section4-img">
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 center">
                        <img src="{{ URL::asset('frontend_images/homepage/'.$section_4_3->content_3) }}" alt="" class="homepage-section4-img">
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 center">
                        <img src="{{ URL::asset('frontend_images/homepage/'.$section_4_3->content_4) }}" alt="" class="homepage-section4-img">
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- proyek -->
    <div class="special-cause fullpage_background5">
        <div class="row">
            <div class="one">
                <h2>Proyek Berjalan Saat ini</h2>
                <br>
                <h3>Lihat daftar proyek yang dapat Anda danai hari ini</h3>
                </div>
            </div>
                <div style="margin: 40px; !important">

                    @foreach($recentProducts as $product)

                        @php( $togo = $product->getOriginal('raising') - $product->getOriginal('raised') )
                        @php( $togo = number_format($togo,0, ",", ".") )
                        @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                        @php( $percentage = number_format($percentage, 0) )
                        <a href="{{ route('project-detail', ['id' => $product->id]) }}">
                            <div class="col-md-12 project-border">
                                <div class="col-md-2">
                                    <span>Nama Project</span>
                                    <br>
                                    <span style="color: #ff7a00">{{ $product->name }}</span>
                                    <br>
                                    <span>{{ $product->Category->name }}</span>
                                </div>
                                <div class="col-md-2">
                                    Nominal
                                    <br>
                                    <span style="color: #ff7a00">{{ $product->raising }}</span>
                                </div>
                                <div class="col-md-2">
                                    Rating Rate
                                    <br>
                                    <span style="color: #ff7a00">A 14%</span>
                                </div>
                                <div class="col-md-2">
                                    Waktu
                                    <br>
                                    <span style="color: #ff7a00">1 tahun</span>
                                </div>
                                <div class="col-md-2">
                                    Progress {{$percentage}}%
                                    <br>
                                    <div class="min">
                                        <div class="progress-bar-outer">
                                            <div class="progress-bar-inner">
                                                <div class="progress-bar">
                                                    <span data-percent="{{$percentage}}"><span class="pretng">{{$percentage}}%</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    Masa Penawaran
                                    <br>
                                    <span style="color: #ff7a00">{{ $product->days_left }} hari lagi</span>
                                </div>

                            </div>
                        </a>

                    @endforeach
                </div>

                <div>
                    <a href="{{route('project-list', ['tab' => 'debt'])}}" class="btn btn-min btn-solid"><span>Berikan Bantuan</span></a>
                    <a href="https://goo.gl/forms/EzQ4QPgIWnmLp6ry1" class="btn btn-min btn-solid" style="background-color: white !important;color: #ff7a00 !important;"><span>Daftarkan Proyek</span></a>
                </div>
        </div>


    <!-- Blog -->
    <section  class="blog-area blog-post-wrapper" style="background: #ff7a00 none repeat scroll 0 0; color:white">
        <div class="container">
            <div class="section-name one">
                <h2>Artikel & Berita Proyek Terbaru</h2>
                <div class="short-text">
                    <h5>Update terkini & ikuti berita terbaru Invesetasi.me</h5>
                </div>
            </div>
            <div class="row">

            @foreach($recentBlogs as $recentBlog)
                <!-- Blog Single -->
                <div class="col-md-3 col-sm-6">
                    <div class="blog-box">
                        <div class="blog-top-desc"><strong> {{ \Carbon\Carbon::parse($recentBlog->created_at)->format('j M Y ') }} - Kategori : Progress Project</strong>
                        </div>
                        <img src="{{ URL::asset('storage/project/Kerupuk_Top.jpg') }}" alt="">
                        <div class="blog-btm-desc">
                            <p>
                                {{ $highlightBlog[$recentBlog->id] }}
                                - <a href="{{ route('blog', ['id' => $recentBlog->id]) }}" class="read-more">Baca Selanjutnya</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Blog Single -->
            @endforeach

            </div>
        </div>
    </section>

    <!-- Subscribe -->
    <div class="subscribe-form-div">
        <div class="section-name one  subscribe-section">
            <div class="subcribe widget clearfix">
                <h2>Dapatkan Berita & Informasi Terbaru ke Email Anda</h2>
                {!! Form::open(['url'=>'subscribeEmail','id'=>'subscribe-form'])!!}
                <div class="col-md-offset-2 col-md-3 col-sm-12 field">
                    <input style="margin-bottom: 5%;color:white;" type="text" name="name" id="name" class="subscribe-field" placeholder="Ketikkan nama Anda disini">
                </div>
                <div class="col-md-3 col-sm-12 field">
                    <input style="margin-bottom: 5%;color:white;" type="email" name="email" id="email" class="subscribe-field" placeholder="Ketikkan alamat E-mail Anda disini">
                </div>
                <div class="col-md-3 col-sm-12 field">
                    {!! Form::submit('Kirim',['class'=>'btn btn-min btn-solid subscribe-submit', 'id'=>'subscribe-button'])!!}
                    <i id="subscribe-spinner" class="fa fa-circle-o-notch fa-spin" style="font-size:24px;display: none;"></i>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        &nbsp;
    </div>
@endsection


@include('frontend.partials._modal-ads', compact('section_Popup'))
