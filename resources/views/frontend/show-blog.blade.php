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
                        <a href="{{ route('blog', ['id' => $singleBlog->id]) }}"><h2>{{$singleBlog->title}}</h2></a>
                        <div class="meta">
                            <h5><i class="fa fa-user"></i><a href="#">{{$singleBlog->user_admin->first_name}} {{$singleBlog->user_admin->last_name}}</a></h5>
                            <h5><i class="fa fa-clock-o"></i><a href="#">{{ \Carbon\Carbon::parse($singleBlog->created_at)->format('j M Y ') }}</a></h5>
                        </div>
                        <div class="img-wrapper">
{{--                            <img class="img-responsive" src="{{ URL::asset('storage/project/'.$singleBlog->image_path) }}" alt="">--}}
                            <img class="img-responsive" src="http://www.investasi.me/public/storage/project/Kerupuk_Top.jpg" alt="">
                        </div>
                        {!! $singleBlog->description !!}
                    </div>
                </div>

                <!-- sidebar -->
                <div class="sidebar-wrapper col-md-4">
                    <div class="sidebar">
                        {{--<div class="search-bar">--}}
                            {{--<form action="#" >--}}
                                {{--<div class="field">--}}
                                    {{--<input type="text" name="search" placeholder="Type and Hit Enter">--}}
                                    {{--<button><i class="fa fa-search"></i></button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Berita Terbaru</h4>
                                <div class="sep">
                                    <div class="sep-inside"></div>
                                </div>
                            </div>
                            <div class="recent-posts clearfix">
                                @foreach($recentBlogs as $recentBlog)
                                    <div class="post clearfix">
                                        <div class="info-block">
                                            <a href="{{ route('blog', ['id' => $recentBlog->id]) }}"><h4>{{$recentBlog->title}}</h4></a>
                                            <div class="meta">
                                                <p><i class="fa fa-user"></i>{{$recentBlog->user_admin->first_name}} {{$recentBlog->user_admin->last_name}}</p>
                                                <span>&#x7C;</span>
                                                <p><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($recentBlog->created_at)->format('j M Y ') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Berita Terkait</h4>
                                <div class="sep">
                                    <div class="sep-inside"></div>
                                </div>
                            </div>
                            <div class="recent-posts clearfix">
                                @foreach($relatedBlogs as $relatedBlog)
                                    <div class="post clearfix">
                                        <div class="info-block">
                                            <a href="{{ route('blog', ['id' => $relatedBlog->id]) }}"><h4>{{$relatedBlog->title}}</h4></a>
                                            <div class="meta">
                                                <p><i class="fa fa-user"></i>{{$relatedBlog->user_admin->first_name}} {{$relatedBlog->user_admin->last_name}}</p>
                                                <span>&#x7C;</span>
                                                <p><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($relatedBlog->created_at)->format('j M Y ') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection