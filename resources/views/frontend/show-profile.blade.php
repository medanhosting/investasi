@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Profil Saya</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Profil Saya</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row">
                <div class="col-xs-12">
                    @if($user->status_id != 1)
                        <h2>Status Verifikasi Anda</h2>
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified thumbnail custom-color">
                                <li><a href="#">
                                        <h4 class="list-group-item-heading green">Step 1</h4>
                                        <p class="list-group-item-text">Email Verification</p>
                                    </a></li>
                                <li><a href="#">
                                        <h4 class="list-group-item-heading green">Step 2</h4>
                                        <p class="list-group-item-text">Phone Verification</p>
                                    </a></li>
                                @if($user->status_id == 12 || $user->status_id == 13)
                                    <li class="active"><a href="{{route('verify-photo')}}">
                                            <h4 class="list-group-item-heading">Step 3</h4>
                                            <p class="list-group-item-text">Photo Upload</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <h4 class="list-group-item-heading">Step 4</h4>
                                            <p class="list-group-item-text">Risk Profile</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <h4 class="list-group-item-heading">Step 5</h4>
                                            <p class="list-group-item-text">Set Your Address</p>
                                        </a></li>
                                @elseif($user->status_id == 14)
                                    <li><a href="#">
                                            <h4 class="list-group-item-heading green">Step 3</h4>
                                            <p class="list-group-item-text">Photo Upload</p>
                                        </a></li>
                                    <li class="active"><a href="#">
                                            <h4 class="list-group-item-heading">Step 4</h4>
                                            <p class="list-group-item-text">Risk Profile</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <h4 class="list-group-item-heading">Step 5</h4>
                                            <p class="list-group-item-text">Set Your Address</p>
                                        </a></li>
                                @elseif($user->status_id == 15)
                                    <li><a href="#">
                                            <h4 class="list-group-item-heading green">Step 3</h4>
                                            <p class="list-group-item-text">Photo Upload</p>
                                        </a></li>
                                    <li><a href="#">
                                            <h4 class="list-group-item-heading green">Step 4</h4>
                                            <p class="list-group-item-text">Risk Profile</p>
                                        </a></li>
                                    <li class="active"><a href="{{route('map')}}">
                                            <h4 class="list-group-item-heading">Step 5</h4>
                                            <p class="list-group-item-text">Set Your Address</p>
                                        </a></li>
                                @endif

                            </ul>
                        </div>
                    @endif
                    Lanjutkan verifikasi Anda untuk dapat menggunakan semua fitur investasi.me
                </div>

                <div class="col-xs-12">
                    <h2>Profil Anda</h2>
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#editProfile" data-toggle="tab">Ubah Profil</a></li>
                                <li><a href="#security" data-toggle="tab">Keamanan</a></li>
                                <li><a href="#password" data-toggle="tab">Ubah Password</a></li>
                                <li><a href="#phoneNumber" data-toggle="tab">Ubah Nomor Telepon</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade" id="security">
                                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                                        <div class="comment-form-wrapper contact-from clearfix">
                                            <div class="widget-title ">
                                                <h4>Keamanan</h4>
                                            </div>
                                            <form class="comment-form row altered" method="POST" action="#">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12 {{ $errors->has('google') ? ' has-error' : '' }}">
                                                    <h5>Google Authenticator</h5>
                                                    <input type="text" name="google">
                                                    @if ($errors->has('google'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('google') }}</strong>
                                                </span>
                                                    @endif
                                                </div>

                                                <div class="field col-sm-12">
                                                    <br/>
                                                    <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade in active" id="editProfile">
                                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                                        <div class="comment-form-wrapper contact-from clearfix">
                                            <div class="widget-title ">
                                                <h4>Ubah Profil</h4>
                                            </div>
                                            <form class="comment-form row altered" method="POST" action="{{ route('withdrawSubmit') }}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-6 {{ $errors->has('fname') ? ' has-error' : '' }}">
                                                    <h5>Nama Depan</h5>
                                                    <input type="text" name="fname" value="{{$user->first_name}}">
                                                    @if ($errors->has('fname'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-6 {{ $errors->has('lname') ? ' has-error' : '' }}">
                                                    <h5>Nama Belakang</h5>
                                                    <input type="text" name="lname" value="{{$user->last_name}}">
                                                    @if ($errors->has('lname'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('lname') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <h5>Email</h5>
                                                    <input type="text" name="email" value="{{$user->email}}">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br/>
                                                    <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="password">
                                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                                        <div class="comment-form-wrapper contact-from clearfix">
                                            <div class="widget-title ">
                                                <h4>Ubah Password</h4>
                                            </div>
                                            <form class="comment-form row altered" method="POST" action="{{ route('withdrawSubmit') }}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12 {{ $errors->has('currentPass') ? ' has-error' : '' }}">
                                                    <h5>Password Sekarang</h5>
                                                    <input type="password" name="currentPass">
                                                    @if ($errors->has('currentPass'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('currentPass') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12 {{ $errors->has('newPass') ? ' has-error' : '' }}">
                                                    <h5>Password Baru</h5>
                                                    <input type="password" name="newPass">
                                                    @if ($errors->has('newPass'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('newPass') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12 {{ $errors->has('confirmPass') ? ' has-error' : '' }}">
                                                    <h5>Konfirmasi Password</h5>
                                                    <input type="password" name="confirmPass">
                                                    @if ($errors->has('confirmPass'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('confirmPass') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br/>
                                                    <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="phoneNumber">
                                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                                        <div class="comment-form-wrapper contact-from clearfix">
                                            <div class="widget-title ">
                                                <h4>Ubah Nomor Telepon</h4>
                                            </div>
                                            <form class="comment-form row altered" method="POST" action="{{ route('withdrawSubmit') }}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12 {{ $errors->has('newNum') ? ' has-error' : '' }}">
                                                    <h5>Nomor Telepon Baru</h5>
                                                    <input type="text" name="newNum">
                                                    @if ($errors->has('newNum'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('newNum') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12 {{ $errors->has('pass') ? ' has-error' : '' }}">
                                                    <h5>Password</h5>
                                                    <input type="password" name="pass">
                                                    @if ($errors->has('pass'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('pass') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12 {{ $errors->has('confirmPass') ? ' has-error' : '' }}">
                                                    <h5>Konfirmasi Password</h5>
                                                    <input type="password" name="confirmPass">
                                                    @if ($errors->has('confirmPass'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('confirmPass') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br/>
                                                    <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
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
        </div>
    </div>

@endsection