@extends('layouts.frontend')

@section('body-content')
    {{--<!-- basic-slider start -->--}}
    {{--<div class="slider-section">--}}
        {{--<div class="slider-active owl-carousel">--}}
            {{--<div class="single-slider slider-screen nrbop bg-black-alfa-40" style="background-image: url({{ URL::asset('frontend_images/slides/s1.jpg') }});">--}}
                {{--<div class="container">--}}
                    {{--<div class="slider-content text-white">--}}
                        {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >KINDNESS &amp; HUMANITY </h2>--}}
                        {{--<p class="b_faddown2">Lorem ipsum dolor sit amet consecte tur adipiscing titor sit amet consecte tur adipiscing titor--}}
                            {{--<br />a accumsan justo laoreetsit amet consecte tur adipiscing titor </p>--}}
                        {{--<div class="slider_button b_faddown3"><a href="#">Donate Now</a></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-slider slider-screen nrbop bg-black-alfa-40 " style="background-image: url({{ URL::asset('frontend_images/slides/s2.jpg') }});">--}}
                {{--<div class="container">--}}
                    {{--<div class="slider-content text-white">--}}
                        {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >KINDNESS &amp; HUMANITY </h2>--}}
                        {{--<p class="b_faddown2">Lorem ipsum dolor sit amet consecte tur adipiscing titor sit amet consecte tur adipiscing titor--}}
                            {{--<br />a accumsan justo laoreetsit amet consecte tur adipiscing titor </p>--}}
                        {{--<div class="slider_button b_faddown3"><a href="#">Donate Now</a></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="single-slider slider-screen nrbop bg-black-alfa-40" style="background-image: url({{ URL::asset('frontend_images/slides/s3.jpg') }});">--}}
                {{--<div class="container">--}}
                    {{--<div class="slider-content text-white">--}}
                        {{--<h2 class="b_faddown1 cd-headline clip is-full-width" >KINDNESS &amp; HUMANITY </h2>--}}
                        {{--<p class="b_faddown2">Lorem ipsum dolor sit amet consecte tur adipiscing titor sit amet consecte tur adipiscing titor--}}
                            {{--<br />a accumsan justo laoreetsit amet consecte tur adipiscing titor </p>--}}
                        {{--<div class="slider_button b_faddown3"><a href="#">Donate Now</a></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- basic-slider end -->--}}

    <!-- Features -->
    <div class="features-wrapper one">
        <div class="container">
            <div class="section-name one">
                <h2>Hello</h2>
                <div class="short-text">
                    <h5>Welcome back, xxxx</h5>
                </div>
            </div>
            <div class="row features">
                <div class="col-md-4 col-sm-6 ">
                    <div class="feature clearfix">
                        <div class="icon_we"><i class="fa fa-money"></i></div>
                        <h4>My wallet</h4>
                        <p>Rp. 5.000.000</p>
                        <a href="#" class="btn btn-min btn-secondary
						"><span>See More</span></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature  higlight clearfix">
                        <div class="icon_we"><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                        <h4> Total Investment </h4>
                        <p>3 ongoing <br> 2 done</p>
                        <a href="#" class="btn btn-min btn-secondary
						"><span>See More</span></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 hidden-sm ">
                    <div class="feature clearfix">
                        <div class="icon_we"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <h4>Dividen / Yield Income</h4>
                        <p>Rp. 5.000.000</p>
                        <a href="#" class="btn btn-min btn-secondary
						"><span>See More</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Special Cuase Paralax -->
    <div class="special-cause">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 donet__area_img">
                    <img src="{{ URL::asset('frontend_images/featured-image-1.jpg') }}" alt="" />
                </div>
                <div class="col-md-6 col-xs-12 donet__area">
                    <div class="section-name parallax one">
                        <h1>Almost Done Project Right Now</h1>
                        <h2>Giving clean drinking water </h2>
                        <h4>Lorem Ipsum is simply dummy text of the printing type industry. Our Ipsum has been the industry's standard dummy text ever the 1500 when unknown printer took galley homero untouched.</h4>
                    </div>
                    <div class="foundings">
                        <div class="progress-bar-wrapper big">
                            <div class="progress-bar-outer">
                                <div class="clearfix">
                                    <span class="value one">Rised: $9620</span>
                                    <span class="value two">- To go: $10299</span>
                                </div>
                                <div class="progress-bar-inner">
                                    <div class="progress-bar">
                                        <span data-percent="75"> <span class="pretng">75%</span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btns-wrapper">
                        <a href="#" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Make Donation</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Causes -->
    <div class="causes-wrapper">
        <div class="container">
            <div class="section-name one">
                <h2>Recent Project</h2>
                <div class="short-text">
                    <h5>Your little support can bring smile of there</h5>
                </div>
            </div>
            <div class="causes">
                <div class="causes-list row">
                    <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 legal health">
                        <div class="cause content-box">
                            <div class="img-wrapper">
                                <div class="overlay">
                                </div>
                                <img class="img-responsive" src="{{ URL::asset('frontend_images/causes/img-1.jpg') }}" alt="">
                            </div>
                            <div class="info-block">
                                <h4><a href="#">Stop Chilldern Abuse</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consectetur deleniti fuga ear</p>
                                <div class="foundings">
                                    <div class="progress-bar-wrapper min">
                                        <div class="progress-bar-outer">
                                            <p class="values"><span class="value one">Raised: $12500</span>-<span class="value two">To go: $45222</span></p>
                                            <div class="progress-bar-inner">
                                                <div class="progress-bar">
                                                    <span data-percent="55"><span class="pretng">55%</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="donet_btn">
                                    <a href="causes-single.html" class="btn btn-min btn-solid"><i class="fa fa-archive"></i><span>Donate Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 education poor health legal">
                        <div class="cause content-box">
                            <div class="img-wrapper">
                                <div class="overlay">
                                </div>
                                <img class="img-responsive" src="{{ URL::asset('frontend_images/causes/img-2.jpg') }}" alt="">
                            </div>
                            <div class="info-block">
                                <h4><a href="#">Don't Hurt Me, Please!</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consectetur deleniti fuga ear</p>
                                <div class="foundings">
                                    <div class="progress-bar-wrapper min">
                                        <div class="progress-bar-outer">
                                            <p class="values"><span class="value one">Raised: $12500</span>-<span class="value two">To go: $45222</span></p>
                                            <div class="progress-bar-inner">
                                                <div class="progress-bar">
                                                    <span data-percent="35"> <span class="pretng">35%</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="donet_btn">
                                    <a href="causes-single.html" class="btn btn-min btn-solid"><i class="fa fa-archive"></i><span>Donate Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cause-wrapper col-md-4 col-xs-12 col-sm-6 ugent poor animals-wildlife hidden-sm  ">
                        <div class="cause content-box">
                            <div class="img-wrapper">
                                <div class="overlay">
                                </div>
                                <img class="img-responsive" src="{{ URL::asset('frontend_images/causes/img-3.jpg') }}" alt="">
                            </div>
                            <div class="info-block">
                                <h4><a href="#">A Better Life for Disabled</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consectetur deleniti fuga ear</p>
                                <div class="foundings">
                                    <div class="progress-bar-wrapper min">
                                        <div class="progress-bar-outer">
                                            <p class="values"><span class="value one">Raised: $12500</span>-<span class="value two">To go: $45222</span></p>
                                            <div class="progress-bar-inner">
                                                <div class="progress-bar">
                                                    <span data-percent="75"><span class="pretng">75%</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="donet_btn">
                                    <a href="causes-single.html" class="btn btn-min btn-solid"><i class="fa fa-archive"></i><span>Donate Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Blog -->
    <section  class="blog-area blog-post-wrapper">
        <div class="container">
            <div class="section-name one">
                <h2>Recent News</h2>
                <div class="short-text">
                    <h5>boridiatat non proident sunt in culpa qui officia</h5>
                </div>
            </div>
            <div class="row">
                <!-- Blog Single -->
                <div class="col-md-4 col-sm-6">
                    <div class="blog-box">
                        <div class="blog-top-desc">
                            <div class="blog-date">
                                27 july 2017
                            </div>
                            <h4>Helping kids Grow up Stronger</h4>
                            <i class="fa fa-user-o"></i> <strong>Admin</strong>
                            <i class="fa fa-commenting-o"></i> <strong>12 Comments</strong>
                        </div>
                        <img src="{{ URL::asset('frontend_images/blog/img-1.jpg') }}" alt="">
                        <div class="blog-btm-desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque nam, necessitatibus odio dignissimos nostrum unde iure veniam.</p>
                            <a href="#" class="btn btn-min btn-solid"> Read More  <i class="fa fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                <!-- Blog Single -->
                <!-- Blog Single -->
                <div class="col-md-4 col-sm-6">
                    <div class="blog-box">
                        <div class="blog-top-desc">
                            <div class="blog-date">
                                20 july 2017
                            </div>
                            <h4>Helping kids Grow up Stronger</h4>
                            <i class="fa fa-user-o"></i> <strong>Admin</strong>
                            <i class="fa fa-commenting-o"></i> <strong>10 Comments</strong>
                        </div>
                        <img src="{{ URL::asset('frontend_images/blog/img-3.jpg') }}" alt="">
                        <div class="blog-btm-desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque nam, necessitatibus odio dignissimos nostrum unde iure veniam.</p>
                            <a href="#" class="btn btn-min btn-solid"> Read More  <i class="fa fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                <!-- Blog Single -->
                <!-- Blog Single -->
                <div class="col-md-4 col-sm-4 hidden-sm">
                    <div class="blog-box">
                        <div class="blog-top-desc">
                            <div class="blog-date">
                                17 july 2017
                            </div>
                            <h4>Helping kids Grow up Stronger</h4>
                            <i class="fa fa-user-o"></i> <strong>Admin</strong>
                            <i class="fa fa-commenting-o"></i> <strong>8 Comments</strong>
                        </div>
                        <img src="{{ URL::asset('frontend_images/blog/img-2.jpg') }}" alt="">
                        <div class="blog-btm-desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque nam, necessitatibus odio dignissimos nostrum unde iure veniam.</p>
                            <a href="#" class="btn btn-min btn-solid"> Read More  <i class="fa fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                <!-- Blog Single -->

            </div>
        </div>
    </section>
@endsection
