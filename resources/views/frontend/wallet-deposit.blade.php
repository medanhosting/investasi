@extends('layouts.frontend')

@section('body-content')
<!-- Banner -->
<div class="page-banner">
    <div class="container">
        <div class="parallax-mask"></div>
        <div class="section-name">
            <h2>Top Up Dompet</h2>
            <div class="short-text">
                <h5><a href="{{route('index')}}">Beranda</a>
                    <i class="fa fa-angle-double-right"></i><a href="{{route('my-wallet')}}">Dompet Saya</a>
                    <i class="fa fa-angle-double-right"></i>Top Up Dompet
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- contact wrapper -->
<div class="contact-page-wrapper">
    <div class="container">
        <div class="row">
            <div class="donation-wrapper">
                <div class="container" >
                    <div class="row">
                        {!! Form::open(array('action' => 'Frontend\WalletController@DepositSubmit', 'method' => 'POST', 'role' => 'form', 'class' => 'donation-form col-xs-12 row')) !!}
                        {{ csrf_field() }}

                            <div class="field col-sm-4">
                                <h4>Jumlah Top up</h4>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-1" name="amount" value="50000" checked>
                                    <label for="amount-1"><span></span>Rp 50.000</label>
                                </div>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-2" name="amount" value="100000">
                                    <label for="amount-2"><span></span>Rp 100.000</label>
                                </div>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-3" name="amount" value="500000">
                                    <label for="amount-3"><span></span>Rp 500.000</label>
                                </div>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-4" name="amount" value="1000000">
                                    <label for="amount-4"><span></span>Rp 1.000.000</label>
                                </div>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-5" name="amount" value="2000000">
                                    <label for="amount-5"><span></span>Rp 2.000.000</label>
                                </div>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-6" name="amount" value="5000000">
                                    <label for="amount-6"><span></span>Rp 5.000.000</label>
                                </div>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-7" name="amount" value="10000000">
                                    <label for="amount-7"><span></span>Rp 10.000.000</label>
                                </div>
                            </div>
                            <div class="field col-sm-4">
                                <h4>Pilihan Pembayaran</h4>
                                <div class="radio-inputs">
                                    <input type="radio" id="method-1" name="method" value="bank_transfer" checked>
                                    <label for="method-1"><span></span>Bank Transfer</label>
                                </div>
                            </div>
                            <div class="field col-sm-4 wallet-deposit">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span>Jumlah Top Up</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="pull-right" id="wallet-deposit-amount">Rp 50.000</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span>Biaya Admin</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="pull-right">Rp 4.000</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <span>Total Biaya</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="pull-right" id="wallet-deposit-cost">Rp 54.000</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-big btn-solid" value="Top Up" style="background-color: #ff7a00 !important;"/>
                                    </div>
                                </div>

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
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection