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
                        <i class="fa fa-angle-double-right"></i><a href="{{route('project-list')}}">Daftar Investasi</a>
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
                <div class="col-md-8 col-xs-12">
                    <div class="col-md-3" style="text-align: center;">
                        <a data-toggle="modal" data-target="#profileModal">
                            <img src="{{ URL::asset('frontend_images/default-profile.jpg') }}" style="height:50%;width:50%;">
                            <p class="font-14">
                                By Nama<br> 2 Project
                            </p>
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h2>{{$product->name}}</h2>

                        <p>{{$product->description}}</p>
                    </div>
                    <div class="col-md-12">
                        <div class="progress-bar-wrapper min">
                            <div class="progress-bar-outer">
                                <p class="values">
                                    <span class="value one">Terkumpul: Rp {{ $product->raised }}</span>
                                    /
                                    <span class="value two"> Dari: Rp {{ $product->raising }}</span></p>

                                @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                    @php( $percentage = number_format($percentage, 0) )
                                        <div class="progress-bar-inner">
                                            <div class="progress-bar">
                                                <span data-percent="{{$percentage}}"> <span class="pretng">{{$percentage}}%</span> </span>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-wrapper">
                        <img class="img-responsive" src="{{ URL::asset('storage/project/'.$product->image_path) }}" alt="" style="width: 1920px;">
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="col-md-7 col-xs-12">

                            @if(auth()->check())
                                <a href="{{route('download', ['filename' => 'test.pdf'])}}" class="btn btn-big btn-solid "><span>Prospektus</span></a>
                            @else
                                <button type="button" data-toggle="modal" data-target="#prospektusModal" class="btn btn-big btn-solid "><span>Prospektus</span></button>
                            @endif

                            <a href="#invest" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Investasi Sekarang</span></a>

                    </div>
                    <div class="col-md-5 col-xs-12">
                        <div class="short-stats clearfix">
                            <h5><i class="fa fa-clock-o"></i>{{$product->days_left}} Hari</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="donation-wrapper" id="invest">
            <div class="container" >
                <div class="row">

                    <div class="col-md-8 col-xs-12">
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
                                    <p class="col-xs-12">
                                        {!! $vendor->description !!}
                                    </p>
                                </div>
                                <div class="tab-pane row" id="tab-2">
                                    <p class="col-xs-12">

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="donation-form col-md-4 col-xs-12 row">
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
                            {{--<table class="bag_total">--}}
                            {{--<tr class="cart-subtotal clearfix">--}}
                            {{--<th>Sub total</th>--}}
                            {{--<td>Rp 5.000.000</td>--}}
                            {{--</tr>--}}
                            {{--<tr class="shipping clearfix">--}}
                            {{--<th>Admin</th>--}}
                            {{--<td>Rp 30.000</td>--}}
                            {{--</tr>--}}
                            {{--<tr class="total clearfix">--}}
                            {{--<th>Total</th>--}}
                            {{--<td>Rp 5.030.000</td>--}}
                            {{--</tr>--}}
                            {{--</table>--}}

                            @if(auth()->check())
                                <button type="button" class="btn btn-big btn-solid" onclick="modalCheckout()"><i class="fa fa-archive"></i><span>Bayar</span></button>
                            @else
                                <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Bayar</span></button>
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
                    <div class="col-md-12 read-more-description">
                        <h1>{{$vendor->name}}</h1>
                        {!! $vendor->description !!}
                        <p class="read-more" style="">
                            <button href="#" class="btn btn-solid">LIHAT SELENGKAPNYA</button>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Checkout -->
    <div class="modal fade" id="modal-checkout-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
        <div class="modal-dialog modal-sm" role="document">
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
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label class="pull-right">Jumlah Investasi:</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span id="checkout-invest-amount" class="pull-right">Rp 200.000</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label class="pull-right">Biaya Admin:</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span id="checkout-admin-fee" class="pull-right">Rp 200.000</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label class="pull-right">Total:</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span id="checkout-total-invest" class="pull-right">Rp 400.000</span>
                        </div>
                    </div>
                    {{ Form::hidden('checkout-invest-amount-input', '', array('id' => 'checkout-invest-amount-input')) }}
                    {{ Form::hidden('checkout-admin-fee-input', '', array('id' => 'checkout-admin-fee-input')) }}
                    {{ Form::hidden('checkout-payment-method-input', '', array('id' => 'checkout-payment-method-input')) }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-error" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-solid">Bayar Sekarang</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection