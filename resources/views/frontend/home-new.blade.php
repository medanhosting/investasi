@extends('layouts.frontend-home')

@section('body-content')
    @if(auth()->check())
        <!-- Features -->
        <div class="features-wrapper one">
            <div class="container">
                <div class="section-name one">
                    <h2>Halo</h2>
                    <div class="short-text">
                        <h5>Selamat Datang, {{ \Illuminate\Support\Facades\Auth::user()->first_name }} {{ \Illuminate\Support\Facades\Auth::user()->last_name }}</h5>
                    </div>
                </div>
                <div class="row features">
                    <div class="col-md-3 col-sm-6" data-toggle="tooltip" data-placement="bottom" title="Investasi sekarang adalah list proyek yang dapat didanai, link ini sama seperti pada link investasi pada menu utama di header">
                        <div class="feature clearfix">
                            <div class="icon_we"><i class="fa fa-handshake-o" aria-hidden="true"></i></div>
                            <h4>Investasi sekarang</h4>
                            <div class="feature-div">
                                <p>{{$onGoingProducts}} berjalan, {{$recentProductCount}} terbaru</p>
                                {{--<p>3 hampir selesai, 3 selesai</p>--}}
                            </div>
                            <a href="{{route('project-list', ['tab' => 'debt'])}}" class="btn btn-min btn-secondary
						"><span>Lihat Semua</span></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 " data-toggle="tooltip" data-placement="bottom" title="Dompet saya adalah menu yang digunakan investor untuk melakukan deposit, memeriksa saldo maupun melakukan penarikan.">
                        <div class="feature clearfix">
                            <div class="icon_we"><i class="fa fa-money"></i></div>
                            <h4>Dompet Saya</h4>
                            <div class="feature-div">
                                <p>Rp. {{$user->wallet_amount}}</p>
                            </div>
                            <a href="{{route('my-wallet')}}" class="btn btn-min btn-secondary
						"><span>Lihat Semua</span></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-toggle="tooltip" data-placement="bottom" title="Portfolio Saya adalah menu untuk investor memerika portfolio investasi yang mereka miliki.">
                        <div class="feature  clearfix">
                            <div class="icon_we"><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                            <h4> Portfolio Saya </h4>
                            <div class="feature-div">
                                @if($pendingTransaction > 0 && $onGoingTransaction > 0)
                                    <p>{{$pendingTransaction}} pending, {{$onGoingTransaction}} berjalan </p>
                                @endif
                                @if($pendingTransaction > 0)
                                    <p>{{$pendingTransaction}} pending</p>
                                @endif
                                @if($onGoingTransaction > 0)
                                    <p>{{$onGoingTransaction}} berjalan </p>
                                @endif
                                @if($finishTransaction > 0)
                                    <p>{{$finishTransaction}} selesai</p>
                                @endif

                            </div>
                            <a href="{{route('portfolio', ['tab' => 'pending'])}}" class="btn btn-min btn-secondary
						"><span>Lihat Semua</span></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-toggle="tooltip" data-placement="bottom" title="Pendapatan adalah menu investor melakukan pengecekan terhadap hasil keuntungan (kerugian) hasil bunga atau dividen atau bagi hasil dari investasinya.">
                        <div class="feature  clearfix">
                            <div class="icon_we"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <h4>Pendapatan</h4>
                            <div class="feature-div">
                                <p>Rp. {{$user->income}}</p>
                            </div>
                            <a href="{{route('pendapatan')}}" class="btn btn-min btn-secondary">
                                <span>Lihat Semua</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- basic-slider start -->
        <div class="slider-section">
            <div class="slider-active owl-carousel">
                <div class="single-slider slider-screen nrbop" style="background-image: url({{ URL::asset('frontend_images/slides/Banner1.jpg') }});background-size: 100%;">
                    {{--<div class="container">--}}
                        {{--<div class="slider-content text-white">--}}
                            {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >Apakah Anda tau? </h2>--}}
                            {{--<p class="b_faddown2">Tidak ada satupun zebra memiliki pola belang yang sama.--}}
                                {{--<br />Demikian juga dalam setiap bisnis dan investasi <br> Oleh karena itu kami ada </p>--}}
                            {{--<div class="slider_button b_faddown3"><a href="#">Investasi Sekarang</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="single-slider slider-screen nrbop" style="background-image: url({{ URL::asset('frontend_images/slides/Banner2.jpg') }});background-size: 100%;">
                    {{--<div class="container">--}}
                        {{--<div class="slider-content text-white">--}}
                            {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >Sukses dimulai dari hal kecil  </h2>--}}
                            {{--<p class="b_faddown2">Investasi yang sukses dimulai dari bisnis yang sukses--}}
                                {{--<br />semua kesuksesan selalu dimulai dari awal yang kosong. <br>Kami menghargai setiap bisnis dan investasi Anda</p>--}}
                            {{--<div class="slider_button b_faddown3"><a href="#">Investasi Sekarang</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

                <div class="single-slider slider-screen nrbop" style="background-image: url({{ URL::asset('frontend_images/slides/Banner3.jpg') }});background-size: 100%;">
                    {{--<div class="container">--}}
                        {{--<div class="slider-content text-white">--}}
                            {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >Berinvestasilah pada proyek terbaru kami </h2>--}}
                            {{--<p class="b_faddown2">Pabrik XYZ adalah pabrik pembuatan obat-obatan yang dapat anda investasikan dana Anda hari ini juga.--}}
                                {{--<br />Silahkan akses link untuk mendapatkan info lengkap!</p>--}}
                            {{--<div class="slider_button b_faddown3"><a href="#">Investasi Sekarang</a></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    @endif

    <!-- apa itu investasi.me -->
    <div class="special-cause fullpage_background2">
        <div class="row">
            <div class="col-md-offset-6 col-md-6 col-xs-12">
                <div class="section-name-first parallax one" style="line-height: 1.3;padding-top:10%;margin-bottom: 5%;color:white !important;">
                    <h2 style="color: white !important;">Apa itu Investasi.me</h2>
                    <h1>Cara baru pinjam-meminjan Uang<br>Jadilah bagian dari gaya hidup dan budaya baru! </h1>
                    <span style="font-size:14px;">
                        Ada banyak potensi bisnis, usaha dan industri di Indonesia yang hingga saat ini belum dapat kesempatan untuk bisa
                        menjadi lebih besar dan lebih cepat berkembang.<br>
                        Investasi.me hadir untuk bisa mempertemukan semua masyarakat Indonesi yang memiliki semangat sama untuk
                        bisa saling membantu dan merasakan manfaat dari perkembangan tesebut.<br>
                        Anda bisa melihat aneka bisnis, usaha dan industri yang potensial dan jailah pemodal akan usaha tersebut
                        serta mendapatkan imbal hasil (return) yang menarik.<br>
                        Anda juga bisa mendapatkan bantuan dari pada pemodal di Investasi.me denga menawarkan usaha Anda disini
                        dengan bunga maupun bagi hasil yang ringan bagi usaha Anda. <br>
                        Anda dan kami ada untuk membuat kita semua maju bersama!
                    </span>
                </div>
                <div class="btns-wrapper">
                    <a href="#" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Baca Selanjutnya</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- p2p lending -->
    <div class="special-cause fullpage_background3">
            <div class="row">
                <div class="col-md-6 col-xs-12 donet__area" style="background: none; border: none;">
                    <div class="section-name parallax one" style="color: white !important;">
                        <h2>P2P Lending </h2>
                        <h1>Ayo Partisipasi Sekarang</h1>
                        <h2>Dapatkan return atas bantuan yang Anda berikan hinggi 20%*</h2>
                        <span>*) Nilai tersebut adalah simulasi pinjaman dengan rating C dan di setahunkan</span>
                    </div>
                    <div class="btns-wrapper">
                        <a href="{{ route('register') }}" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Daftar Sekarang</span></a>
                    </div>
                </div>
            </div>
    </div>

    <!-- langkah -->
    <div class="special-cause fullpage_background4">
        <div class="row">
            <div class="section-name one">
                <div class="short-text">
                    <h5 style="color: white !important;">Memberikan Bantuan & Meminjam di <span style="color:#ff7a00;">Investasi.me</span></h5>
                </div>
                <h2 style="color: white !important;">Langkah Mudah dalam Memulai</h2>
            </div>

            <div class="team-members row">
                <div class="col-md-3 col-sm-6 col-xs-12 hidden-sm">
                    <div class="homepage-section4-text" style="display: table; #position: relative; overflow: hidden;">
                        <div style=
                             "#position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
                            <div style=" #position: relative; #top: -50%; color: white !important;">
                                <h2>Memberikan bantuan</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 center">
                    <img src="{{ URL::asset('frontend_images/homepage/bantuan-1.png') }}" alt="" class="homepage-section4">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 center">
                    <img src="{{ URL::asset('frontend_images/homepage/bantuan-2.png') }}" alt="" class="homepage-section4">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 center">
                    <img src="{{ URL::asset('frontend_images/homepage/bantuan-3.png') }}"alt="" class="homepage-section4">
                </div>
            </div>
            <div class="team-members row">
                <div class="col-md-3 col-sm-6 col-xs-12 hidden-sm">
                    <div class="homepage-section4-text" style="display: table; #position: relative; overflow: hidden;">
                        <div style=
                             "#position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
                            <div style=" #position: relative; #top: -50%;color: white !important;">
                                <h2>Meminjamkan</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 center">
                    <img src="{{ URL::asset('frontend_images/homepage/meminjam-1.png') }}"alt="" class="homepage-section4">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 center">
                    <img src="{{ URL::asset('frontend_images/homepage/meminjam-2.png') }}" alt="" class="homepage-section4">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 center">
                    <img src="{{ URL::asset('frontend_images/homepage/meminjam-3.png') }}" alt="" class="homepage-section4">
                </div>
            </div>
        </div>
    </div>

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
                                    <span>Jenis Project</span>
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
                                    Progress {{$percentage}}&
                                    <br>
                                    <div class="progress-bar-wrapper min">
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
                    <a class="btn btn-min btn-solid" style="background-color: white !important;color: #ff7a00 !important;"><span>Daftarkan Proyek</span></a>
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

@endsection
