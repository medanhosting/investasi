@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Detail Proyek</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('project-list', ['tab' => 'debt'])}}">Daftar Proyek</a>
                        <i class="fa fa-angle-double-right"></i>Detil
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <!-- Causes Wrapper -->
    <div class="causes-page-wrapper single-cause">
        <div class="container">
            <div class="row cause">
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-2" style="float: left;">
                        <div class="col-md-12">
                            <img src="{{ URL::asset('frontend_images/default-profile.jpg') }}" style="height:30%;width:30%;border-radius: 50%;">
                            <p class="font-14">
                                <b>{{ $product->Vendor->name }}</b> <br>
                                {{$projectCount}} Project
                            </p>
                        </div>
                        {{--<div class="col-md-12">--}}
                            {{--<button data-toggle="modal" data-target="#profileModal" class="btn btn-solid "><span>Selengkapnya</span></button>--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-md-10">
                        <h2>{{$product->name}}</h2>

                        <p>{{$product->description}}</p>
                    </div>

                </div>
                <div class="col-md-12 col-xs-12" style="margin-top: 2%;">
                    <div class="col-md-7 col-xs-12" style="padding-left: 5%;">
                        @if(!empty($product->youtube_link))
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/{{$product->youtube_link}}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @else
                            <img class="img-responsive" src="{{ URL::asset('storage/project/'.$product->image_path) }}" alt="" style="width: 80%;">
                        @endif
                    </div>

                    <div class="col-md-5 col-xs-12">
                        <div class="col-md-12">
                            <div class="progress-bar-wrapper min">
                                <div class="progress-bar-outer">
                                    @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                    @php( $percentage = number_format($percentage, 0) )
                                    <div class="progress-bar-inner">
                                        <div class="progress-bar">
                                            <span data-percent="{{$percentage}}"> <span class="pretng">{{$percentage}}%</span> </span>
                                        </div>
                                    </div>

                                    <p class="values">
                                        <span class="value one">Terkumpul: Rp {{ $product->raised }}</span>
                                        <br>
                                        <span class="value two">Dari: Rp {{ $product->raising }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <h3>{{$product->days_left}} <br>hari lagi</h3>
                            @if(auth()->check())
                                <a href="{{route('checkout',['id' => $product->id])}}" class="btn btn-big btn-solid" style="width:100%;"><i class="fa fa-archive"></i><span>Danai Sekarang</span></a>
                            @else
                                <button type="button" data-toggle="modal" data-target="#loginModalPopup" class="btn btn-big btn-solid" style="width:100%;"><i class="fa fa-archive"></i><span>Danai Sekarang</span></button>
                            @endif

                        </div>
                        <div class="col-md-12 col-xs-12" style="margin-top: 5%;">
                            <div class="col-md-7" style="font-size:16px !important;">
                                @if(auth()->check())
                                    <a href="{{route('download', ['filename' => 'test.pdf'])}}"><span>Product Disclosure Statement</span></a>
                                @else
                                    <a data-toggle="modal" data-target="#prospektusModal">Download Product Disclosure Statement</a>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <div class="short-stats clearfix">
                                {{--<a href="https://web.whatsapp.com/send?text=www.google.com" data-action="share/whatsapp/share">Share via Whatsapp web</a>--}}
                                {{--<div class="addthis_inline_share_toolbox"></div>--}}

                                <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_24 a2a_default_style">
                                        {{--<a class="a2a_dd" href="https://www.addtoany.com/share"></a>--}}
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_twitter"></a>
                                        {{--<a class="a2a_button_whatsapp"></a>--}}
                                        {{--<a class="a2a_button_line"></a>--}}
                                        {{--<a class="a2a_button_telegram"></a>--}}
                                        <a class="a2a_button_copy_link"></a>
                                    </div>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="donation-wrapper">
            <div class="container" >
                <div class="row">
                    <div class="col-md-12 submenu">
                        <div class="col-md-6">
                            <ul class="tabs-switcher nav nav-tabs clearfix ">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-1">Detil</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2">Update</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="col-md-8">

                                @if(auth()->check())
                                    <a href="{{route('checkout',['id' => $product->id])}}" class="col-md-6 btn btn-big btn-solid" style="margin-bottom:18px;"><span>Danai Sekarang</span></a>
                                @else
                                    <button type="button" data-toggle="modal" data-target="#loginModalPopup" class="btn btn-big btn-solid"><i class="fa fa-archive"></i><span>Bayar</span></button>
                                @endif
                            </div>
                            <div class="col-md-4 text-center" style="margin-top:18px;color:#4a4a4a;">
                                <a href="{{route('wishlist', ['id'=>$product->id])}}" style="color:#4a4a4a;"><i class="fa fa-heart"></i>&nbsp;&nbsp;
                                    @if($isWishlist == 0)
                                        <span> Tambah Favorit</span>
                                    @else
                                        <span> Hilangkan Favorit</span>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <div class="donation clearfix">
                            <div class="tab-content">
                                <div class="tab-pane row active" id="tab-1">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="image-wrapper">
                                            <img class="img-responsive" src="{{ URL::asset('storage/project/'.$product->image_path) }}" alt="" style="width: 320px;">
                                        </div>
                                        <p>
                                            {!! $vendor->description !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane row" id="tab-2">
                                    @if(auth()->check())
                                        @if ($userId == $product->user_id)
                                            <div class="col-md-12">
                                                <a href="{{route('update-request')}}" class="btn btn-big btn-solid "><i class="fa fa-plus"></i><span>Tambah Update Proyek</span></a>
                                            </div>
                                        @endif
                                    @endif

                                    <div class="col-md-12">
                                        <div class="page-header">
                                            <h1 id="timeline">Update Proyek</h1>
                                        </div>
                                        <ul class="timeline">
                                            @php($count = 0)
                                            @if(count($projectNews) > 0)
                                                @foreach($projectNews as $news)

                                                        @if($count == count($projectNews) - 1)
                                                            @php($className = "success" )
                                                                @else
                                                                    @php($className = "warning" )
                                                                        @endif
                                                @if($count%2 == 0)
                                                    <li class="timeline-inverted">
                                                        <div class="timeline-badge {{$className}}"><i class="glyphicon glyphicon-check"></i></div>
                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <a href="{{ route('blog', ['id' => $news->id]) }}">
                                                                    <h4 class="timeline-title">{{$news->title}}</h4>
                                                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>{{ \Carbon\Carbon::parse($news->created_at)->format('j M Y ') }}</small></p>
                                                                </a>
                                                            </div>
                                                            <div class="timeline-body read-more-description" style="height: 50px;">
                                                                {!! $news->description !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="timeline-badge {{$className}}"><i class="glyphicon glyphicon-check"></i></div>
                                                        <div class="timeline-panel">
                                                            <div class="timeline-heading">
                                                                <a href="{{ route('blog', ['id' => $news->id]) }}">
                                                                    <h4 class="timeline-title">{{$news->title}}</h4>
                                                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{ \Carbon\Carbon::parse($news->created_at)->format('j M Y ') }}</small></p>
                                                                </a>
                                                            </div>
                                                            <div class="timeline-body read-more-description" style="height: 50px;">
                                                                {!! $news->description !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                                @php($count++)

                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('checkout',['id' => $product->id])}}">
                        <div class="col-md-3 col-xs-12 product-info">
                            <h3>Informasi Pinjaman</h3>
                            <br><br>
                            <span>Lama Pinjaman : </span>
                            <br><br>
                            <span>Suku Bunga : </span>
                            <br><br>
                            <span>Jatuh Tempo Pinjaman : {{$product->days_left}} </span>
                            <br><br>
                            <span>Industri : </span>
                            <br><br>
                            <span>Anggunan : </span>
                            {{--<br><br>--}}
                            {{--<h3>Keterangan Tambahan</h3>--}}
                            {{--<br><br>--}}
                            {{--<span>Pinjaman ini memiliki </span>--}}
                        </div>
                    </a>
            </div>
        </div>
    </div>
    @include('frontend.partials._modal-prospektus')
    @include('frontend.partials._modal-login-notify')

    <!-- Modal Profile -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tentang {{$vendor->name}}</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12" style="max-height:170px;">
                        <h1>{{$vendor->name}}</h1>
                        {{$vendorDesc}}
                        <p>
                            <a href="{{ route('vendor-profile-show', ['vendorObj' => $vendor->id]) }}" ><button class="btn btn-solid">LIHAT SELENGKAPNYA</button></a>
                        </p>

                    </div>
                </div>
                <div class="modal-footer">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>

@endsection