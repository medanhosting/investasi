@extends('layouts.frontend')

@section('body-content')

    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>About Us</h2>
                <div class="short-text">
                    <h5>Home<i class="fa fa-angle-double-right"></i>About Us</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- about wrapper -->
    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row ">
                <div class="col-md-6 ">
                    <div class="image-wrapper">
                        <img class="img-responsive" src="assets/img/featured-image-11.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="about-right-text">
                        <div class="widget-title">
                            <h4>Hi We Provide Worldwide Charity Service Since 1978</h4>
                        </div>
                        <p class="first">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus sapiente deleniti commodi provident veniam vitae blanditiis rerum temporibus totam est, omnis sint excepturi maiores iure similique. Sequi magni, suscipit laudantium velit. Excepturi sint placeat vel, porro, saepe ratione sunt natus, quod rem error ipsum ipsa.</p>
                        <p class="second">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptates dolor reprehenderit, deserunt, quibusdam repellat architecto blanditiis a, nulla inventore minima necessitatibus illum molestias, quas molestiae maiores tempora temporibus incidunt ea! Voluptate temporibus repellat nulla omnis nesciunt illum odit dicta fuga id!</p>
                        <a href="#" class="btn btn-min btn-secondary"><span>Learn More</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- team -->
        <div class="team-wrapper">
            <div class="container">
                <div class="section-name one">
                    <h2>our volunteers</h2>
                    <div class="short-text">
                        <h5>We are all times support them for their smile</h5>
                    </div>
                </div>

                <div class="team-members row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-member">
                            <div class="best-volunteer">
                                <div class="voluntee-image">
                                    <a href="#" title=""><img src="assets/img/best-volunte-1.jpg" alt=""></a>
                                </div>
                                <ul class="socials">
                                    <li><a href="#" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>

                                </ul>
                                <span><a href="#" title="">Cheif Director</a></span>
                                <h2><a href="#" title="">Jonathan Greg</a></h2>
                                <p>Lorem Jonathan Greg ipsum dolor sit amet, consectetur adipiscing elit, sed Jonathan Greg do...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-member">
                            <div class="best-volunteer">
                                <div class="voluntee-image">
                                    <a href="#" title=""><img src="assets/img/best-volunte-2.jpg" alt=""></a>
                                </div>
                                <ul class="socials">
                                    <li><a href="#" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>

                                </ul>
                                <span><a href="#" title="">Cheif Volunteer</a></span>
                                <h2><a href="#" title="">Jennifier kalvin</a></h2>
                                <p>Lorem Jonathan Greg ipsum dolor sit amet, consectetur adipiscing elit, sed Jonathan Greg do...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
                        <div class="single-member">
                            <div class="best-volunteer">
                                <div class="voluntee-image">
                                    <a href="#" title=""><img src="assets/img/best-volunte-3.jpg" alt=""></a>
                                </div>
                                <ul class="socials">
                                    <li><a href="#" title=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>

                                </ul>
                                <span><a href="#" title="">Cheif Director</a></span>
                                <h2><a href="#" title="">Mikel Willson</a></h2>
                                <p>Lorem Jonathan Greg ipsum dolor sit amet, consectetur adipiscing elit, sed Jonathan Greg do...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="partners">
            <div class="container">
                <div class="row">
                    <div id="partners-slider" class="owl-carousel owl-theme owl-transition clearfix">
                        <div class="item">
                            <a href="#"><img class="img-responsive" src="assets/img/others/logo-1.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img class="img-responsive" src="assets/img/others/logo-3.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img class="img-responsive" src="assets/img/others/logo-2.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img class="img-responsive" src="assets/img/others/logo-4.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img class="img-responsive" src="assets/img/others/logo-5.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection