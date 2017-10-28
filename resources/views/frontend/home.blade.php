@extends('layouts.frontend')

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
                    <div class="col-md-3 col-sm-6">
                        <div class="feature clearfix">
                            <div class="icon_we"><i class="fa fa-handshake-o" aria-hidden="true"></i></div>
                            <h4>Investasi sekarang</h4>
                            <div class="feature-div">
                                <p>3 berjalan, 3 terbaru</p>
                                <p>3 hampir selesai, 3 selesai</p>
                            </div>
                            <a href="{{route('project-list')}}" class="btn btn-min btn-secondary
						"><span>Lihat Semua</span></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 ">
                        <div class="feature clearfix">
                            <div class="icon_we"><i class="fa fa-money"></i></div>
                            <h4>Dompet Saya</h4>
                            <div class="feature-div">
                                <p>Rp. 5.000.000</p>
                                <p>&nbsp;</p>
                            </div>
                            <a href="{{route('my-wallet')}}" class="btn btn-min btn-secondary
						"><span>Lihat Semua</span></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="feature  clearfix">
                            <div class="icon_we"><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                            <h4> Portfolio Saya </h4>
                            <div class="feature-div">
                                <p>3 berjalan</p>
                                <p>2 selesai</p>
                            </div>
                            <a href="{{route('portfolio')}}" class="btn btn-min btn-secondary
						"><span>Lihat Semua</span></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="feature  clearfix">
                            <div class="icon_we"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <h4>Pendapatan</h4>
                            <div class="feature-div">
                                <p>Rp. 5.000.000</p>
                                <p>&nbsp;</p>
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


        {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
            {{--<!-- Indicators -->--}}
            {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
            {{--</ol>--}}

            {{--<!-- Wrapper for slides -->--}}
            {{--<div class="carousel-inner">--}}
                {{--<div class="item active">--}}
                    {{--<img src="{{ URL::asset('frontend_images/slides/Banner1.jpg') }}" alt="Los Angeles">--}}
                {{--</div>--}}

                {{--<div class="item">--}}
                    {{--<img src="{{ URL::asset('frontend_images/slides/Banner2.jpg') }}" alt="Chicago">--}}
                {{--</div>--}}

                {{--<div class="item">--}}
                    {{--<img src="{{ URL::asset('frontend_images/slides/Banner3.jpg') }}" alt="New York">--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<!-- Left and right controls -->--}}
            {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">--}}
                {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
                {{--<span class="sr-only">Previous</span>--}}
            {{--</a>--}}
            {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">--}}
                {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
                {{--<span class="sr-only">Next</span>--}}
            {{--</a>--}}
        {{--</div>--}}
        <!-- basic-slider end -->
    @endif

    <!-- Special Cuase Paralax -->
    {{--<div class="special-cause">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6 col-xs-12 donet__area_img">--}}
                    {{--<img src="{{ URL::asset('frontend_images/featured-image-1.jpg') }}" alt="" />--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-xs-12 donet__area">--}}
                    {{--<div class="section-name parallax one">--}}
                        {{--<h1>Almost Done Project Right Now</h1>--}}
                        {{--<h2>PT QWERTY ZXCVB </h2>--}}
                        {{--<h4>Lorem Ipsum is simply dummy text of the printing type industry. Our Ipsum has been the industry's standard dummy text ever the 1500 when unknown printer took galley homero untouched.</h4>--}}
                    {{--</div>--}}
                    {{--<div class="foundings">--}}
                        {{--<div class="progress-bar-wrapper min">--}}
                            {{--<div class="progress-bar-outer">--}}
                                {{--<div class="clearfix">--}}
                                    {{--<span class="value one">Rised: $9620</span>--}}
                                    {{--<span class="value two">- To go: $10299</span>--}}
                                {{--</div>--}}
                                {{--<div class="progress-bar-inner">--}}
                                    {{--<div class="progress-bar">--}}
                                        {{--<span data-percent="95"> <span class="pretng">95%</span> </span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="btns-wrapper">--}}
                        {{--<a href="#" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Make Donation</span></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- Blog -->
    <section  class="blog-area blog-post-wrapper">
        <div class="container">
            <div class="section-name one">
                <h2>Berita Terbaru</h2>
                <div class="short-text">
                    <h5>Berita terbaru seputar investasi</h5>
                </div>
            </div>
            <div class="row">
                <!-- Blog Single -->

                @for($i=0;$i<3;$i++)
                    <div class="col-md-4 col-sm-6">
                        <div class="blog-box">
                            <div class="blog-top-desc">
                                <div class="blog-date">
                                    27 july 2017
                                </div>
                                <h4>This is News Title {{$i}}</h4>
                                <i class="fa fa-user"></i> <strong>Admin</strong>
                            </div>
                            <img src="{{ URL::asset('frontend_images/blog/img-1.jpg') }}" alt="">
                            <div class="blog-btm-desc">
                                <p>This is News highlight This is News highlight This is News highlight This is News highlight This is News highlight </p>
                                <a href="{{route('blog')}}" class="btn btn-min btn-solid"> Baca  <i class="fa fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
            @endfor
            <!-- Blog Single -->

            </div>
        </div>
    </section>

    <!-- Causes -->
    <div class="causes-wrapper">
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
                                    <a href="{{ route('project-detail', ['id' => $product->id]) }}"><img class="img-responsive" src="{{ URL::asset('storage/project'.$product->image_path) }}" alt=""></a>
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

<script>
    $( document ).ready(function() {
        setTimeout(adsModalFunction, 60000);
    });
</script>
@endsection
