@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Detail Investasi</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('project-list', ['tab' => 'debt'])}}">Daftar Investasi</a>
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
                    <div class="col-md-3" style="float: left;">
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
                    <div class="col-md-9">
                        <h2>{{$product->name}}</h2>

                        <p>{{$product->description}}</p>
                    </div>

                </div>
                <div class="col-md-12 col-xs-12" style="margin-top: 2%;">
                    <div class="col-md-8 col-xs-12">
                        @if(!empty($product->youtube_link))
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/{{$product->youtube_link}}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @else
                            <img class="img-responsive" src="{{ URL::asset('storage/project/'.$product->image_path) }}" alt="" style="width: 1920px;">
                        @endif
                    </div>

                    <div class="col-md-4 col-xs-12">
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
                            <a href="#invest" class="btn btn-big btn-solid" style="width:100%;"><i class="fa fa-archive"></i><span>Danai Sekarang</span></a>

                        </div>
                        <div class="col-md-12 col-xs-12" style="margin-top: 5%;">
                            <div class="col-md-7" style="font-size:16px !important;">
                                @if(auth()->check())
                                    <a href="{{route('download', ['filename' => 'test.pdf'])}}"><span>Prospektus</span></a>
                                @else
                                    <a data-toggle="modal" data-target="#prospektusModal">Download Prospektus</a>
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

                    <div class="col-md-9 col-xs-12">
                        <div class="donation clearfix">
                            <ul class="tabs-switcher nav nav-tabs clearfix">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-1">Detil</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2">Update</a>
                                </li>
                            </ul>
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
                    <div class="col-md-3 col-xs-12"  id="invest">
                        <form class="donation-form">
                            <h3>Bantu Proyek Ini</h3>
                            <div class="field col-sm-12" style="background-color: #D3D3D3; padding-bottom:30px;margin-bottom:10px;">
                                <h5>Jumlah Investasi</h5>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-1" name="amount" value="50000" checked>
                                    <label for="amount-1"><span></span>Rp 50.000</label>
                                    <input type="radio" id="amount-2" name="amount" value="100000">
                                    <label for="amount-2"><span></span>Rp 100.000</label>
                                    <input type="radio" id="amount-3" name="amount" value="150000">
                                    <label for="amount-3"><span></span>Rp 150.000</label>
                                </div>
                            </div>
                            <div class="field col-sm-12" style="background-color: #D3D3D3; padding-bottom:30px;">
                                <h5>Pilihan Pembayaran</h5>
                                <div class="radio-inputs">
                                    <input type="radio" id="payment-1" name="payment" value="wallet" checked>
                                    <label for="payment-1"><span></span>Dompet</label>
                                    <input type="radio" id="payment-2" name="payment" value="credit_card">
                                    <label for="payment-2"><span></span>Kartu Kredit</label>
                                    <input type="radio" id="payment-3" name="payment" value="bank_transfer">
                                    <label for="payment-3"><span></span>Bank Transfer</label>
                                </div>
                            </div>
                            <div class="field col-sm-12 text-right" >

                                @if(auth()->check())
                                    {{--<button type="button" class="btn btn-big btn-solid" onclick="modalCheckout()"><i class="fa fa-archive"></i><span>Bayar</span></button>--}}
                                    <button type="button" data-toggle="modal" data-target="#readProspectusModal" data-backdrop="static" data-keyboard="false" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Bayar</span></button>
                                @else
                                    <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-big btn-solid"><i class="fa fa-archive"></i><span>Bayar</span></button>
                                @endif

                            </div>
                        </form>
                    </div>
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

    <!-- Modal prospectus read -->
    <div class="modal fade" id="readProspectusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Perhatian</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="font-16" style="color:red;">
                                Catatan<br>Harap membaca Prospektus dari tiap produk, terutama yang berhubungan dengan aturan dan resiko berinvestasi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-error" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-solid" data-dismiss="modal" onclick="modalCheckout()"><i class="fa fa-archive"></i><span> Lanjutkan</span></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Checkout -->
    <div class="modal fade" id="modal-checkout-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(array('action' => array('Frontend\PaymentController@pay', $product->id), 'method' => 'POST', 'role' => 'form')) !!}
                {{ csrf_field() }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Checkout</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <p>Metode pembayaran via <span id="checkout-payment-method">Kartu Kredit</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-offset-3 col-md-offset-3 col-lg-4 col-md-4 col-sm-12">
                            <label>Jumlah Investasi:</label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <span id="checkout-invest-amount" ></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-offset-3 col-md-offset-3 col-lg-4 col-md-4 col-sm-12">
                            <label>Biaya Admin:</label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <span id="checkout-admin-fee"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-offset-3 col-md-offset-3 col-lg-4 col-md-4 col-sm-12">
                            <label>Total:</label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <span id="checkout-total-invest"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>
                                <input type="checkbox" name="check1" id="check1" onclick="check()"> Saya telah membaca dan memahami isi dari prospectus produk investasi ini, dan saya telah menyetujui syarat dan ketentuan dari investasi.me
                            </label>
                        </div>
                    </div>
                    {{ Form::hidden('checkout-invest-amount-input', '', array('id' => 'checkout-invest-amount-input')) }}
                    {{ Form::hidden('checkout-admin-fee-input', '', array('id' => 'checkout-admin-fee-input')) }}
                    {{ Form::hidden('checkout-payment-method-input', '', array('id' => 'checkout-payment-method-input')) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-error" data-dismiss="modal">Tutup</button>
                    <button id="submit" type="submit" class="btn btn-solid" disabled>Bayar Sekarang</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    {{--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59f6e999249e3f1c"></script>--}}

    <script type="text/javascript">
        function check(){

            if(document.getElementById("check1").checked){
                document.getElementById("submit").disabled = false;
            }
            else if(document.getElementById("check1").checked == false){
                document.getElementById("submit").disabled = true;
            }
        }
    </script>
@endsection