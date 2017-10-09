@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Project Detail</h2>
                <div class="short-text">
                    <h5> Home
                        <i class="fa fa-angle-double-right"></i>Invest.me
                        <i class="fa fa-angle-double-right"></i>Project List
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
                        <h2>Make a Better World for Disabled Kids</h2>
                        <div class="short-stats clearfix">
                            <h5><i class="fa fa-heart-o"></i>263 donors</h5>
                            <h5><i class="fa fa-clock-o"></i>18 days</h5>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="foundings">
                            <div class="progress-bar-wrapper min">
                                <div class="progress-bar-outer">

                                    <p class="values"><span class="value one">Rised: $12500</span>/<span class="value two"> To go: $45222</span></p>
                                    <div class="progress-bar-inner">
                                        <div class="progress-bar">
                                            <span data-percent="75"> <span class="pretng">75%</span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#donate" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Make Donation</span></a>
                    </div>
                    <div class="info-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid error, repellat, voluptatem at iste soluta veritatis aperiam, pariatur sunt odit, ad praesentium! Modi asperiores adipisci optio voluptatibus iste corporis, animi ducimus placeat tenetur reprehenderit impedit quam molestiae suscipit, eaque dignissimos eos quae omnis, quidem.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem odio quasi nobis et aliquam deleniti, facilis corrupti quas, debitis modi? Autem repellat dolorum ipsa delectus adipisci culpa, quaerat quisquam dignissimos nihil tempora iste rem. Cupiditate, odit dolor numquam est non eveniet, perspiciatis dolorem commodi delectus maxime excepturi velit quos inventore?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius doloribus consequatur ratione, assumenda ipsum, quos itaque inventore ducimus voluptate, quas aliquid commodi sint. Nihil aut dolorem sed temporibus! At, ea dignissimos. Magni id fuga quidem tempora doloremque eaque dicta quia assumenda, odit ullam voluptate modi soluta, corrupti eum possimus. Possimus nesciunt cumque, consequuntur, sint aspernatur illum molestias atque consectetur voluptates quibusdam perspiciatis voluptate ipsa nostrum.</p>
                        <a href="{{route('download', ['filename' => 'test.pdf'])}}" class="btn btn-big btn-solid "><span>Prospektus</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="donation-wrapper" id="donate">
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
                                            <h4>Donation Amount</h4>
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
                                            <h4>Payment Option</h4>
                                            <div class="radio-inputs">
                                                <input type="radio" id="payment-1" name="payment" value="bank">
                                                <label for="payment-1"><span></span>Bank Transfer</label>
                                                <input type="radio" id="payment-2" name="payment" value="cc">
                                                <label for="payment-2"><span></span>Credit Card</label>
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
                                            <a href="#" class="btn btn-big btn-solid"><i class="fa fa-archive"></i><span>Donate Now</span></a>
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