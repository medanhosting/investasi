@extends('layouts.frontend')

@section('body-content')
<!-- Banner -->
<div class="page-banner">
    <div class="container">
        <div class="parallax-mask"></div>
        <div class="section-name">
            <h2>Top Up Dana</h2>
            <div class="short-text">
                <h5><a href="{{route('index')}}">Beranda</a>
                    <i class="fa fa-angle-double-right"></i><a href="{{route('my-wallet')}}">Total Dana Saya</a>
                    <i class="fa fa-angle-double-right"></i>Top Up Dana
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
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            {!! Form::open(array('action' => 'Frontend\WalletController@DepositConfirm', 'method' => 'POST', 'role' => 'form', 'class' => 'donation-form col-xs-12 row')) !!}
                            {{ csrf_field() }}

                            @if(count($errors))
                                <div class="form-group">
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li> {{ $error }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            {{--<div class="form-group"> <!-- Top Up Amounts -->--}}
                                {{--<label for="amount" class="control-label">Jumlah Top Up</label>--}}
                                {{--<select class="form-control" name="amount" id="amount" onchange="onSelectTopUp(this)">--}}
                                    {{--<option value="-1">Pilih Jumlah Top Up!</option>--}}
                                    {{--<option value="100000">Rp 100.000</option>--}}
                                    {{--<option value="1000000">Rp 1.000.000</option>--}}
                                    {{--<option value="0">Jumlah lain</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            <div class="form-group price-format" id="amount_section"> <!-- Custom Top Up Amount-->
                                <label for="amount" class="control-label">Jumlah Top Up</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Jumlah top up">
                            </div>

                            <div class="form-group"> <!-- Payment Methods -->
                                <label for="method" class="control-label">Metode Top Up</label>
                                <select class="form-control" name="method" id="method">
                                    <option value="-1">Pilih Metode!</option>
                                    <option value="bank_transfer">Transfer Bank (Biaya Admin Rp 4.000)</option>
                                </select>
                            </div>

                            <div class="form-group text-center"> <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Top Up</button>
                            </div>
                            {{--<div class="field col-sm-4">--}}
                            {{--<h4>Jumlah Top up</h4>--}}
                            {{--<div class="radio-inputs">--}}
                            {{--<input type="radio" id="amount-1" name="amount" value="50000" checked>--}}
                            {{--<label for="amount-1"><span></span>Rp 50.000</label>--}}
                            {{--</div>--}}
                            {{--<div class="radio-inputs">--}}
                            {{--<input type="radio" id="amount-2" name="amount" value="1000000">--}}
                            {{--<label for="amount-2"><span></span>Rp 1.000.000</label>--}}
                            {{--</div>--}}
                            {{--<div class="radio-inputs">--}}
                            {{--<input type="radio" id="amount-3" name="amount" value="0">--}}
                            {{--<label for="amount-3"><span></span>Jumlah Lain</label>--}}
                            {{--</div>--}}
                            {{--<div class="radio-inputs" id="custom-amount-field">--}}
                            {{--<input id="custom-amount" name="custom-amount" placeholder="Jumlah top up lain">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="field col-sm-4">--}}
                            {{--<h4>Pilihan Pembayaran</h4>--}}
                            {{--<div class="radio-inputs">--}}
                            {{--<input type="radio" id="method-1" name="method" value="bank_transfer" checked>--}}
                            {{--<label for="method-1"><span></span>Bank Transfer</label>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="field col-sm-4 wallet-deposit">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<span>Jumlah Top Up</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<span class="pull-right" id="wallet-deposit-amount">Rp 50.000</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<span>Biaya Admin</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<span class="pull-right">Rp 4.000</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<span>Total Biaya</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<span class="pull-right" id="wallet-deposit-cost">Rp 54.000</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<input type="submit" class="btn btn-big btn-solid" value="Top Up" style="background-color: #ff7a00 !important;"/>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {!! Form::close() !!}
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div id="modal_wallet_deposit" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}

            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>--}}
                {{--</button>--}}
                {{--<h4 class="modal-title">Konfirmasi Top Up</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<div class="col-md-12 col-sm-12">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--Jumlah Top Up--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                            {{--<span class="pull-right">Rp 200.000</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>--}}
                {{--<a class="btn btn-success">Top Up Sekarang</a>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@endsection