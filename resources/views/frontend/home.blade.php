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

    <!-- News -->
    <section  class="blog-area blog-post-wrapper" style="padding-bottom:0;">
        <div class="container">
            <div class="section-name one">
                <h2>Berita Terbaru</h2>
                <div class="short-text">
                    <h5>Berita terbaru seputar investasi</h5>
                </div>
            </div>
            <div class="row">
                @foreach($recentBlogs as $recentBlog)
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-box">
                            <div class="blog-top-desc">
                                <div class="blog-date">
                                    {{ \Carbon\Carbon::parse($recentBlog->created_at)->format('j M Y ') }}
                                </div>
                                <h4>{{$recentBlog->title}}</h4>
                                <i class="fa fa-user"></i> <strong>{{$recentBlog->user_admin->first_name}} {{$recentBlog->user_admin->last_name}}</strong>
                            </div>
                            <img src="{{ URL::asset('storage/project/Kerupuk_Top.jpg') }}" alt="">
                            <div class="read-more-description" style="height:170px;text-align: left;">
                                {{ $highlightBlog[$recentBlog->id] }}
                                <p class="read-more">
                                    <a href="{{ route('blog', ['id' => $recentBlog->id]) }}" class="btn btn-min btn-solid">
                                        Baca Selengkapnya  <i class="fa fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- New Project -->
    <div class="causes-wrapper causes-wrapper-custom">
        <div class="container">
            <div class="section-name one">
                <h2>Proyek Terbaru</h2>
                <div class="short-text">
                    <h5>3 Proyek terbaru untuk investasi saya</h5>
                </div>
            </div>
            <div class="causes">
                <div class="causes-list row">
                    @foreach($recentProducts as $product)

                        @php( $togo = $product->getOriginal('raising') - $product->getOriginal('raised') )
                        @php( $togo = number_format($togo,0, ",", ".") )
                        @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                        @php( $percentage = number_format($percentage, 0) )
                        <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 legal health">
                            <div class="cause content-box">
                                <div class="img-wrapper">
                                    <div class="overlay">
                                    </div>
                                    <a href="{{ route('project-detail', ['id' => $product->id]) }}">
                                        <img class="img-responsive" src="{{ URL::asset('storage/project/'.$product->image_path) }}" alt="">
                                    </a>
                                </div>
                                <div class="info-block">
                                    <h4><a href="{{ route('project-detail', ['id' => $product->id]) }}">{{ $product->name }}</a></h4>
                                    {{--<p>{{ $product->description }}</p>--}}
                                    <div class="foundings">
                                        <div class="progress-bar-wrapper min">
                                            <div class="progress-bar-outer">
                                                <p class="values">
                                                    <span class="value one">Terkumpul: Rp {{$product->raised}}</span>
                                                    <br>
                                                    <span class="value two">Sisa: Rp {{$togo}}</span>
                                                </p>
                                                <div class="progress-bar-inner">
                                                    <div class="progress-bar">
                                                        <span data-percent="{{$percentage}}"><span class="pretng">{{$percentage}}%</span> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="donet_btn">
                                        <a href="{{ route('project-detail', ['id' => $product->id]) }}" class="btn btn-min btn-solid"><i class="fa fa-archive"></i><span>Investasi Sekarang</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
