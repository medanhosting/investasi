@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Detail Proyek</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Home</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('project-list')}}">Daftar Proyek</a>
                        <i class="fa fa-angle-double-right"></i>Detail
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <!-- Causes Wrapper -->
    <div class="causes-page-wrapper single-cause">
        <div class="container">
            <div class="row cause">
                <div class="col-md-10 col-md-offset-1">
                    <div class="image-wrapper">
                        <img class="img-responsive" src="assets/img/causes/single-cause.jpg" alt="">
                    </div>
                    <div class="meta">
                        <h2>{{$product->name}}</h2>
                        <div class="short-stats clearfix">
                            <h5><i class="fa fa-clock-o"></i>{{$product->days_left}} Hari</h5>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="foundings">
                            <div class="progress-bar-wrapper min">
                                <div class="progress-bar-outer">
                                    @php( $togo = $product->getOriginal('raising') - $product->getOriginal('raised') )
                                    @php( $togo = number_format($togo,0, ",", ".") )

                                    <p class="values">
                                        <span class="value one">Terkumpul: Rp {{ $product->raised }}</span>
                                        /
                                        <span class="value two"> Sisa: Rp {{ $togo }}</span></p>

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
                        <a href="#invest" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Investasi Sekarang</span></a>
                    </div>
                    <div class="info-block">
                        <p>{{$product->description}}</p>
                        <a href="{{route('download', ['filename' => 'test.pdf'])}}" class="btn btn-big btn-solid "><span>Prospektus</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="donation-wrapper" id="invest">
            <div class="container" >
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="donation clearfix">
                            <ul class="tabs-switcher nav nav-tabs clearfix">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-1"><i class="fa fa-paypal"></i>Checkout</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane row active" id="tab-1">
                                    <p class="col-xs-12">Pembayaran di sini, ada jumlah yang ingin di bayar, pilihan
                                        pembayaran (transfer bank atau kartu kredit, serta ada detail total pembayaran beserta
                                        biaya admin
                                    </p>
                                    <form class="donation-form col-xs-12 row">
                                        <div class="field col-sm-6">
                                            <h4>Jumlah Investasi</h4>
                                            <div class="radio-inputs">
                                                <input type="radio" id="amount-1" name="amount" value="50">
                                                <label for="amount-1"><span></span>Rp 50</label>
                                                <input type="radio" id="amount-2" name="amount" value="100">
                                                <label for="amount-2"><span></span>Rp 100</label>
                                                <input type="radio" id="amount-3" name="amount" value="150">
                                                <label for="amount-3"><span></span>Rp 150</label>
                                            </div>
                                        </div>
                                        <div class="field col-sm-6">
                                            <h4>Pilihan Pembayaran</h4>
                                            <div class="radio-inputs">
                                                <input type="radio" id="payment-1" name="payment" value="bank">
                                                <label for="payment-1"><span></span>Dompet</label>
                                                <input type="radio" id="payment-2" name="payment" value="cc">
                                                <label for="payment-2"><span></span>Kartu Kredit</label>
                                            </div>
                                        </div>
                                        <div class="field col-sm-6 col-sm-offset-6 text-right" >
                                            <table class="bag_total">
                                                <tr class="cart-subtotal clearfix">
                                                    <th>Sub total</th>
                                                    <td>Rp 5.000.000</td>
                                                </tr>
                                                <tr class="shipping clearfix">
                                                    <th>Admin</th>
                                                    <td>Rp 30.000</td>
                                                </tr>
                                                <tr class="total clearfix">
                                                    <th>Total</th>
                                                    <td>Rp 5.030.000</td>
                                                </tr>
                                            </table>
                                            <a href="#" class="btn btn-big btn-solid"><i class="fa fa-archive"></i><span>Bayar</span></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection