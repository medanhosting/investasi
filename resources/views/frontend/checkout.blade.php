@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Pembayaran</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{ route('project-list', ['tab' => 'debt']) }}">Daftar Investasi</a>
                        <i class="fa fa-angle-double-right"></i>Pembayaran
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Causes Wrapper -->
    <div class="causes-page-wrapper single-cause">
        <div class="container" style="margin-bottom: 20px;">
            <div class="row cause">
                <div class="col-md-10 col-md-offset-1">
                    <div class="image-wrapper">
                        <img class="img-responsive" src="assets/img/causes/single-cause.jpg" alt="">
                    </div>
                    <div class="meta">
                        <h2>Danai Sekarang</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <form class="donation-form">
                            <h3>Masukkan Jumlah Pendanaan</h3>
                            <div class="field col-sm-12 text-center error-div" style="display: none;">
                                <span class="help-block" style="color: red;">Nominal harus kelipatan dari Rp 250.000 dan minimal Rp 500.000</span>
                            </div>
                            <div class="field col-sm-12 price-format">
                                <h5>Nominal</h5>
                                <input id="amount" type="text" name="amount">
                                <h5>Minimum Pendanaan : Rp 500.000</h5>
                                <h5>Kelipatan : Rp 250.000</h5>
                                <div class="radio-inputs">
                                    {{--<input type="radio" id="amount-1" name="amount" value="50000" checked>--}}
                                    {{--<label for="amount-1"><span></span>Rp 50.000</label>--}}
                                    {{--<input type="radio" id="amount-2" name="amount" value="100000">--}}
                                    {{--<label for="amount-2"><span></span>Rp 100.000</label>--}}
                                    {{--<input type="radio" id="amount-3" name="amount" value="150000">--}}
                                    {{--<label for="amount-3"><span></span>Rp 150.000</label>--}}
                                </div>
                            </div>
                            <div class="field col-sm-12">
                                <h5>Pilihan Sumber Dana</h5>
                                <div class="radio-inputs">
                                    <input type="radio" id="payment-1" name="payment" value="wallet" checked>
                                    <label for="payment-1"><span></span>Dompet</label>
                                    <input type="radio" id="payment-2" name="payment" value="credit_card">
                                    <label for="payment-2"><span></span>Kartu Kredit</label>
                                    <input type="radio" id="payment-3" name="payment" value="bank_transfer">
                                    <label for="payment-3"><span></span>Bank Transfer</label>
                                </div>
                            </div>

                            <input id="notCompletedData" name="notCompletedData" value="{{$notCompletedData}}" type="hidden">
                            <div class="field col-sm-12">
                                <div class="col-sm-12">
                                    <h5 style="color:red;">
                                        Catatan<br>Harap membaca Prospektus dari tiap produk, terutama yang berhubungan dengan aturan dan resiko berinvestasi.
                                    </h5>
                                    <h4>
                                        <br>
                                        <a href="{{route('download', ['filename' => 'test.pdf'])}}">Download Prospektus</a>
                                    </h4>
                                </div>
                            </div>

                            @if($notCompletedData == 1)
                            <div class="field col-sm-12 text-right" >
                                @if(auth()->check())
                                    {{--<button type="button" class="btn btn-big btn-solid" onclick="modalCheckout()"><i class="fa fa-archive"></i><span>Bayar</span></button>--}}
                                    {{--<button type="button" data-toggle="modal" data-target="#readProspectusModal" data-backdrop="static" data-keyboard="false" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Bayar</span></button>--}}
                                    <button type="button" onclick="modalCheckout()" class="btn btn-big btn-solid "><span>Proses Sekarang</span></button>
                                @else
                                    <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-big btn-solid"><span>Proses Sekarang</span></button>
                                @endif
                            </div>
                            @endif
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span>
                            Investasi.me bukan lembaga investasi
                            <br><br>
                            Kami adalah sebuah portal yang mempertemukan pikah yang membutuhkan
                            bantuan pendanaan dengan pihak yang mau memberikan bantuan akan pendanaan.
                            <br>
                            Investasi.me dengan standarisasi yang baku telah melakukan studi kelayaran
                            pada semua pihak yang mendaftarkan kebutuhan pendanaannya di portal kami.
                            Namun bukan berarti risiko akan proyek maupun pekerjaan yang dilakukan oleh
                            pihak yang menerima modal menjadi bebas risiko kepada pihak yang memberikan bantuan.
                            <br><br>
                            <a>Pelajari disini bagaimana kami mengelola risiko </a>
                            <br><br>
                            Hal-hal yang sering ditanyakan
                        </span>
                        <ul>
                            <li>Bagaimana saya mendanai proyek di investasi.me</li>
                            <li>Biaya transaksi apa yang muncul ketika saya mendanai</li>
                            <li>Kapan saya mendapatkan keuntungan</li>
                            <li>Apakah orang lain mengetahui saya mendanai</li>
                            <li>Bila dana tidak terkumpul apa yang terjadi</li>
                        </ul>
                    </div>

                    @if($notCompletedData == 0)
                    <div class="comment-form-wrapper contact-from clearfix col-md-12 col-sm-12">
                        <h2>Mohon melengkapi data berikut ini sesuai dengan KTP Anda.</h2>
                        <form class="comment-form row altered">
                            <div class="field col-sm-12">
                                <h5>Nomor KTP</h5>
                                <input id="KTP" type="text" name="KTP">
                            </div>
                            {{--<div class="field col-sm-4">--}}
                                {{--<h5>Tanggal Lahir</h5>--}}
                                {{--<input id="date" type="text" name="date" >--}}
                            {{--</div>--}}
                            {{--<div class="field col-sm-4">--}}
                                {{--<h5>Bulan Lahir</h5>--}}
                                {{--<input id="date" type="text" name="date" >--}}
                            {{--</div>--}}
                            {{--<div class="field col-sm-4">--}}
                                {{--<h5>Tahun Lahir</h5>--}}
                                {{--<input id="date" type="text" name="date" >--}}
                            {{--</div>--}}
                            <div class="field col-sm-12">
                                <h5>Kewarganegaraan</h5>
                                <select class="form-control" name="citizen" id="citizen">
                                    <option value="-1">Pilih Kewarganegaraan!</option>
                                    <option value="Indonesia">Warga Negara Indonesia</option>
                                    <option value="Asing">Warga Negara Asing</option>
                                </select>
                            </div>
                            <div class="field col-sm-12">
                                <h5>Alamat</h5>
                                <input id="address-home" type="text" name="address">
                            </div>
                            <div class="field col-sm-12">
                                <h5>Kota</h5>
                                <input id="city" type="text" name="city">
                            </div>
                            <div class="field col-sm-12">
                                <h5>Provinsi</h5>
                                <input id="province" type="text" name="province">
                            </div>
                            <div class="field col-sm-12">
                                <h5>Kode Pos</h5>
                                <input id="zip" type="text" name="zip">
                            </div>

                            <input id="checkout-notCompletedData" name="checkout-notCompletedData" value="{{$notCompletedData}}" type="hidden">
                            <div class="field col-sm-12 text-right" >
                                @if(auth()->check())
                                    {{--<button type="button" class="btn btn-big btn-solid" onclick="modalCheckout()"><i class="fa fa-archive"></i><span>Bayar</span></button>--}}
                                    {{--<button type="button" data-toggle="modal" data-target="#readProspectusModal" data-backdrop="static" data-keyboard="false" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Bayar</span></button>--}}
                                    <button type="button" onclick="modalCheckout()" class="btn btn-big btn-solid "><span>Proses Sekarang</span></button>
                                @else
                                    <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-big btn-solid"><span>Proses Sekarang</span></button>
                                @endif
                            </div>
                        </form>
                    </div>
                        @endif
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
                                <input type="checkbox" name="check1" id="check1" onclick="check()">
                                Saya telah membaca dan memahami isi dari prospektus produk investasi ini
                                (<a href="{{route('download', ['filename' => 'test.pdf'])}}"><span>Download Prospektus</span></a>),
                                dan saya telah menyetujui <a target="_blank" href="{{route('term-condition')}}">syarat dan ketentuan</a> dari investasi.me

                            </label>
                        </div>
                    </div>
                    {{ Form::hidden('checkout-invest-amount-input', '', array('id' => 'checkout-invest-amount-input')) }}
                    {{ Form::hidden('checkout-admin-fee-input', '', array('id' => 'checkout-admin-fee-input')) }}
                    {{ Form::hidden('checkout-payment-method-input', '', array('id' => 'checkout-payment-method-input')) }}

                    {{ Form::hidden('checkout-notCompletedData', '', array('id' => 'checkout-notCompletedData')) }}
                    {{ Form::hidden('checkout-KTP', '', array('id' => 'checkout-KTP')) }}
                    {{ Form::hidden('checkout-citizen', '', array('id' => 'checkout-citizen')) }}
                    {{ Form::hidden('checkout-address', '', array('id' => 'checkout-address')) }}
                    {{ Form::hidden('checkout-city', '', array('id' => 'checkout-city')) }}
                    {{ Form::hidden('checkout-province', '', array('id' => 'checkout-province')) }}
                    {{ Form::hidden('checkout-zip', '', array('id' => 'checkout-zip')) }}
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