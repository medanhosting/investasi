@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Registrasi</h4>
                        </div>
                        <form class="comment-form row altered" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <h4>E-mail</h4>
                                <input type="email" name="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <h4>Nama Depan</h4>
                                <input type="text" name="first_name">
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <h4>Nama Belakang</h4>
                                <input type="text" name="last_name">
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <h4>Nomor Handphone</h4>
                                <input type="number" name="phone">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12" {{ $errors->has('password') ? ' has-error' : '' }}>
                                <h4>Password</h4>
                                <input type="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12" {{ $errors->has('password_confirmation') ? ' has-error' : '' }}>
                                <h4>Konfirmasi Password</h4>
                                <input type="password" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12">
                                <br/>
                                <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Register</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
