@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Berita</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('blog-list')}}">Daftar Berita</a>
                        <i class="fa fa-angle-double-right"></i>Berita</h5>
                </div>
            </div>
        </div>
    </div>


    <!-- Blog-Wrapper -->
    <div class="blog-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="blog-posts col-md-8">
                    <div class="blog-post single-post">
                        <a href="blog-single.html"><h2>Help Them, Let’s Buy Them a Place To Live</h2></a>
                        <div class="meta">
                            <h5><i class="fa fa-user"></i><a href="#">admin</a></h5>
                            <h5><i class="fa fa-clock-o"></i><a href="#">21  jan, 2017</a></h5>
                        </div>
                        <div class="img-wrapper">
                            <img class="img-responsive" src="assets/img/blog/img-4.jpg" alt="">
                        </div>
                        <p class="first">Etiam at consectetur nisl. Donec rutrum volutpat turpis ac lobortis. Fusce sit amet orci ante. Duis faucibus interdumd. Mauris tempor sem at venenatis sagittis. Fusce vel maximus diam. Praesent ut vehicula eros. Nunc quis egestas turpis. Sed posuere unc at dui tempus maximus. In fringilla dui in eros blandit, ac pulvinar magna dapibus. Nunc in nisi id tellus placerat consectetur ac tincidunt turpis. Pellentesque ut metus lacus. Mauris non velit vulputate lorem scelerisque rutrum non tristique leo. Sed vitae arcu nec nibh egestas ultrices </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident aliquid porro a velit doloribus nobis cum sint beatae neque iusto molestias fuga, eaque vero natus maxime quam sunt optio praesentium. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci maxime beatae aut deleniti sapiente explicabo velit dolorem suscipit nesciunt non.</p>
                        <h4 class="subheader">Lorem Ipsum The Cite</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus dolorem, non omnis. Beatae quibusdam aperiam modi ut sed perspiciatis, quo doloremque in facilis eveniet porro inventore explicabo obcaecati. Aperiam ad nemo fugit in minima officiis accusantium aspernatur nobis, itaque incidunt ullam, laborum atque est ipsum ab voluptatibus quae inventore placeat voluptatum quo quia cum cumque cupiditate suscipit! Architecto voluptates blanditiis dignissimos fugit mollitia. Deserunt, perferendis.</p>
                        <blockquote>
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic deserunt unde ratione odio temporibus officiis, nemo. Aperiam commodi, sapiente cul totam!</p>
                        </blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia excepturi quae facere voluptate blanditiis, accusantium libero eaque nulla obcaecati quidem, aliquid quam magni perferendis sit hic deserunt incidunt quis accusamus possimus inventore. Animi accusamus perferendis, voluptatem quos ullam ducimus perspiciatis.</p>
                    </div>
                    <div class="single-post-footer">
                        <div class="author">
                            <img src="assets/img/mini/img-8.jpg" alt="">
                            <div class="info-block">
                                <h4>Admin</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi consequuntur ratione sunt tempora, labore fuga, asperiores exercitationem, accusantium id voluptates soluta</p>
                                <div class="social-media clearfix">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="sidebar-wrapper col-md-4">
                    <div class="sidebar">
                        <div class="search-bar">
                            <form action="#" >
                                <div class="field">
                                    <input type="text" name="search" placeholder="Type and Hit Enter">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Recent News</h4>
                                <div class="sep">
                                    <div class="sep-inside"></div>
                                </div>
                            </div>
                            <div class="recent-posts clearfix">
                                @for($i=0;$i<3;$i++)
                                    <div class="post clearfix">
                                        <div class="image-wrapper">
                                            <div class="mask"><a href="#"><i class="fa fa-link"></i></a></div>
                                            <img src="assets/img/mini/img-1.jpg" alt="">
                                        </div>
                                        <div class="info-block">
                                            <a href="#"><h4>Help Them, Let’s Buy Them a Place To Live</h4></a>
                                            <div class="meta">
                                                <p><i class="fa fa-user"></i>Admin</p>
                                                <span>&#x7C;</span>
                                                <p><i class="fa fa-clock-o"></i>21  jan, 2017</p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection