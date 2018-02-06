@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Penarikan Dana</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('my-wallet')}}">Dompet Saya</a>
                        <i class="fa fa-angle-double-right"></i>Penarikan Dana
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-xs-12 text-center">
                    <h2>
                        Dompet Anda<br> Rp {{$user->wallet_amount}}
                    </h2>
                </div>
                @if($user->google_authenticator == 0)
                    <div class="col-md-6 col-md-offset-3">
                        <div class="comment-form-wrapper contact-from clearfix">
                            <div class="widget-title ">
                                <h4>Mohon Aktifkan Google Authenticator Anda.</h4>
                                <h3>
                                    Klik <a href="{{route('my-profile', ['tab' => 'security'])}}">disini</a> untuk mengaktifkan.
                                    <br>
                                    Informasi lebih lanjut hubungi kami melalui email atau chat box di bawah
                                </h3>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-md-offset-3">
                        <div class="comment-form-wrapper contact-from clearfix">
                            <div class="widget-title ">
                                <h4>Penarikan Dana</h4>
                                <span style="color:red;font-size:14px;">Nomor rekening untuk penarikan harus sama dengan nama yang terdaftar pada profil akun</span>
                            </div>
                            <form class="comment-form row altered" method="POST" action="{{ route('withdrawSubmit') }}">
                                {{ csrf_field() }}


                                <div class="field col-sm-12 price-format {{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <h4>Jumlah Penarikan</h4>
                                    <input type="text" name="amount">
                                    @if ($errors->has('amount'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12 {{ $errors->has('acc_number') ? ' has-error' : '' }}">
                                    <h4>Nomor Rekening</h4>
                                    <input type="text" name="acc_number">
                                    @if ($errors->has('acc_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('acc_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('acc_name') ? ' has-error' : '' }}">
                                    <h4>Nama Rekening</h4>
                                    <input type="text" name="acc_name">
                                    @if ($errors->has('acc_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('acc_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12 {{ $errors->has('bank') ? ' has-error' : '' }}">
                                    <h4>Nama Bank</h4>
                                    {{--<select class="form-control" name="bank" id="bank">--}}
                                    {{--<option value="PT BCA (Bank Central Asia) TBK">PT BCA (Bank Central Asia) TBK</option>--}}
                                    {{--<option value="asdf">PT Bank Negara Indonesia (BNI)</option>--}}
                                    {{--<option value="asdf">PT Bank Rakyat Indonesia (BRI)</option>--}}
                                    {{--<option value="asdf">PT. Bank CIMB NIAGA TBK</option>--}}
                                    {{--<option value="asdf">CITIBANK NA</option>--}}
                                    {{--<option value="asdf">PT Bank Danamon Indonesia TBK</option>--}}
                                    {{--<option value="asdf">PT Bank Mandiri </option>--}}
                                    {{--</select>--}}
                                    <input type="text" name="bank">
                                    @if ($errors->has('bank'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('google') ? ' has-error' : '' }}">
                                    <h4>PIN Google Auth</h4>
                                    <input type="number" name="google">
                                    @if ($errors->has('google'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('google') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12">
                                    <br/>
                                    <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Tarik Dana</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
