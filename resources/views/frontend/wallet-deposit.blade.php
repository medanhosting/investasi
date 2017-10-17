@extends('layouts.frontend')

@section('body-content')
<!-- Banner -->
<div class="page-banner">
    <div class="container">
        <div class="parallax-mask"></div>
        <div class="section-name">
            <h2>Top Up Dompet</h2>
            <div class="short-text">
                <h5><a href="{{route('index')}}">Home</a>
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
                        <form class="donation-form col-xs-12 row">
                            <div class="field col-sm-4">
                                <h4>Jumlah Top up</h4>
                                <div class="radio-inputs">
                                    <input type="radio" id="amount-1" name="amount" value="50000">
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
                                    <input type="radio" id="payment-1" name="payment" value="bank" selected>
                                    <label for="payment-1"><span></span>Bank Transfer</label>
                                </div>
                            </div>
                            <div class="field col-sm-4" >
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
                                <a href="#" class="btn btn-big btn-solid"><i class="fa fa-archive"></i><span>Proses</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection