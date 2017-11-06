@extends('layouts.frontend')

@section('body-content')

    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Tentang Kami</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Tentang Kami</h5>
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
                            <h4>Apa itu Investasi.me ?</h4>
                        </div>
                        <p class="first">
                            Investasi.me adalah sebuah platform fintech lending di Indonesia pertama yang memiliki akses solusi permodalan dan investasi yang paling lengkap. Kami menyadari bahwa setiap usaha adalah unik, sehingga akses permodalan yang dilakukan tidak selalu cocok satu model dengan yang lainnya. Dan demikian juga sebagai investor, memiliki keinginan dan profil yang berbeda-beda. Pelajari Lebih Lanjut
                        </p>
                        <a href="#" class="btn btn-min btn-secondary"><span>Pelajari Lebih Lanjut</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- team -->
        <div class="team-wrapper">
            <div class="container">
                <div class="section-name one">
                    <h2>Siapa tim kami?</h2>
                    <div class="short-text">
                        <h5>Kami menyadari bahwa 'masakan berkwalitas' datang dari 'koki' yang tepat dan berpengalaman. Mari kami perkenalkan tim Investasi.me</h5>
                    </div>
                </div>

                <div class="team-members row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-member">
                            <div class="best-volunteer">
                                <div class="voluntee-image">
                                    <img class="img-responsive" src="{{ URL::asset('frontend_images/Picture1.png') }}" alt="">
                                </div>
                                <span><a href="#" title="">Cheif Director</a></span>
                                <h2><a href="#" title="">Steffen Fang</a></h2>
                                <p>Berpengalaman lebih dari 17 tahun di bidang investasi & keuangan, baik sebagai advisor, banker,
                                    maupun pelaku usaha.
                                </p>
                                <p>Mengawali karir sebagai seorang investment banker, Steffen memiliki kemampuan dan kualifikasi
                                    yang kuat dalam analisa kelayakan usaha, due diligence dan pendanaan, yang krusial dibutuhkan
                                    dalam bisnis crowdfunding.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-member">
                            <div class="best-volunteer">
                                <div class="voluntee-image">
                                    <img class="img-responsive" src="{{ URL::asset('frontend_images/Picture2.png') }}" alt="">
                                </div>
                                <span><a href="#" title="">Cheif Director</a></span>
                                <h2><a href="#" title="">Hevy Yafanny</a></h2>
                                <p>Memulai karir sebagai auditor di Deloitte, Hevy Yafanny memiliki kemampuan & pengalaman yang tinggi
                                    dalam bidang keuangan, akuntansi & fraud detection.
                                </p>
                                <p>Hevy juga berpengalaman selama hampir 20 tahun dalam berbagai industri, baik pertambangan, property,
                                    keuangan dan investasi. Kemampuan dan pengalaman beliau dalam melihat potensi dan kelayakan usaha
                                    akan sangat berharga dalam menjalankan bisnis investment & crowdfunding.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
                        <div class="single-member">
                            <div class="best-volunteer">
                                <div class="voluntee-image">
                                    <img class="img-responsive" src="{{ URL::asset('frontend_images/Picture3.png') }}" alt="">
                                </div>
                                <span><a href="#" title="">Cheif Director</a></span>
                                <h2><a href="#" title="">Ryan Filbert</a></h2>
                                <p> Ryan dikenal sebagai Praktisi dan Inspirator Investasi no 1 di Indonesia, Penulis Puluhan Buku Investasi
                                    Best Seller Nasional, dan Peraih Penghargaan Tokoh Inspiratif Pasar Modal tahun 2017 dari Bapak Presiden
                                    Joko Widodo.
                                </p>
                                <p> Sepak terjangnya selama lebih dari 10 tahun di dunia pasar modal, pelaku usaha dan praktisi
                                    independen serta otodidak merupakan nilai tambah dalam konsep-konsep 'out of the box' dalam semua hal
                                    yang dikerjakan oleh Ryan Filbert. Semua perjalanan karir lengkap dalam hal penggunaan otak kanan dan otak kiri,
                                    analisa teknikal, fundamental dan lainnya membuat Ryan menjadi sosok yang tepat untuk berada dalam bisnis
                                    investasi berbasis crowdfunding.
                                </p>
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