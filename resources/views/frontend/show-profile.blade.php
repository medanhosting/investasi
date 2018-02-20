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
                                        <p class="list-group-item-text green">Email Verification</p>
                                    </a></li>
                                @if($user->status_id == 11)
                                    <li class="active"><a href="{{route('verify-phone-show')}}">
                                            <p class="list-group-item-text green">Phone Verification</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <p class="list-group-item-text">Photo Upload</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <p class="list-group-item-text">Risk Profile</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <p class="list-group-item-text">Set Your Address</p>
                                        </a></li>
                                @elseif($user->status_id == 12 || $user->status_id == 13)
                                    <li><a href="#">
                                            <p class="list-group-item-text green">Phone Verification</p>
                                        </a></li>
                                    <li class="active"><a href="{{route('verify-photo')}}">
                                            <p class="list-group-item-text">Photo Upload</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <p class="list-group-item-text">Risk Profile</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <p class="list-group-item-text">Set Your Address</p>
                                        </a></li>
                                @elseif($user->status_id == 14)
                                    <li><a href="#">
                                            <p class="list-group-item-text green">Phone Verification</p>
                                        </a></li>
                                    <li><a href="#">
                                            <p class="list-group-item-text green">Photo Upload</p>
                                        </a></li>
                                    <li class="active"><a href="#">
                                            <p class="list-group-item-text">Risk Profile</p>
                                        </a></li>
                                    <li class="disabled"><a href="#">
                                            <p class="list-group-item-text">Set Your Address</p>
                                        </a></li>
                                @elseif($user->status_id == 15)
                                    <li><a href="#">
                                            <p class="list-group-item-text green">Phone Verification</p>
                                        </a></li>
                                    <li><a href="#">
                                            <p class="list-group-item-text green">Photo Upload</p>
                                        </a></li>
                                    <li><a href="#">
                                            <p class="list-group-item-text green">Risk Profile</p>
                                        </a></li>
                                    <li class="active"><a href="{{route('map')}}">
                                            <p class="list-group-item-text">Set Your Address</p>
                                        </a></li>
                                @endif

                            </ul>
                        </div>
                    @endif
                    Lanjutkan verifikasi Anda untuk dapat menggunakan semua fitur investasi.me
                </div>

                {{--@php($isActiveProfile = ""; $isActiveSecurity = "";$isActivePassword = "";$isActivePhone = "";)--}}
                {{--@php($isActiveTabProfile = "";$isActiveTabSecurity = "";$isActiveTabPassword = "";$isActiveTabPhone = "";)--}}
                    {{--@if($selectedTab == "profile")--}}
                         {{--@php($isActiveProfile = "in active"; $isActiveTabProfile = "class='active'";)--}}

                    {{--@elseif($selectedTab == "security")--}}
                         {{--@php($isActiveSecurity = "in active"; $isActiveTabSecurity = "class='active'";)--}}

                    {{--@elseif($selectedTab == "password")--}}
                         {{--@php($isActivePassword = "in active"; $isActiveTabPassword = "class='active'";)--}}

                    {{--@elseif($selectedTab == "phone")--}}
                        {{--@php($isActivePhone = "in active"; $isActiveTabPhone = "class='active'";)--}}
                    {{--@endif--}}
                <div class="col-xs-12">
                    <h2>Profil Anda</h2>
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" >
                                <li {{$isActiveTabProfile}}><a href="#editProfile" data-toggle="tab">Ubah Profil</a></li>
                                <li {{$isActiveTabSecurity}}><a href="#security" data-toggle="tab">Keamanan</a></li>
                                <li {{$isActiveTabPassword}}><a href="#password" data-toggle="tab">Ubah Password</a></li>
                                <li {{$isActiveTabPhone}}><a href="#phoneNumber" data-toggle="tab">Ubah Nomor Telepon</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade {{$isActiveSecurity}}" id="security">
                                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                                        <div class="comment-form-wrapper contact-from clearfix">
                                            @if($user->google_authenticator == 0)
                                                <div class="widget-title ">
                                                    <h4>Keamanan</h4>
                                                    <h5>Google QR Code</h5>
                                                    <img src="{{ $google2fa_url }}" alt="">
                                                    <form class="comment-form row altered">
                                                    <div class="field col-sm-12">
                                                        <input type="text" disabled="disabled" value="{{ $user->google2fa_secret }}"/>
                                                    </div>
                                                    </form>
                                                    <p>Scan Gambar atau copy text di atas untuk mengaktifkan Google Authenticator!</p>
                                                </div>
                                                <form class="comment-form row altered" method="POST" action="{{route('verify-google-authenticator')}}">
                                                    @if($errors->has('msg'))
                                                        <div class="field col-sm-12 text-center">
                                                            <span class="help-block" style="color: red;">{{$errors->first()}}</span>
                                                        </div>
                                                    @endif
                                                    {{ csrf_field() }}

                                                    <div class="field col-sm-12">
                                                        <h5>Code</h5>
                                                        <input type="number" name="secret">
                                                    </div>

                                                    <div class="field col-sm-12">
                                                        <br/>
                                                        <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                    </div>
                                                </form>
                                            @else
                                                <div class="widget-title ">
                                                    <h4>Keamanan</h4>
                                                    <p>Anda Sudah mengaktifkan Google authenticator Anda.</p>
                                                    <p>Jika ingin menonaktifkan Google Authenticator Anda silahkan Memasukan Kode Google lalu Tekan Tombol Deactivate!</p>
                                                </div>
                                                <form class="comment-form row altered" method="POST" action="{{route('deactivate-google-authenticator')}}">
                                                    @if($errors->has('msg'))
                                                        <div class="field col-sm-12 text-center">
                                                            <span class="help-block" style="color: red;">{{$errors->first()}}</span>
                                                        </div>
                                                    @endif
                                                    {{ csrf_field() }}

                                                    <div class="field col-sm-12">
                                                        <input type="number" name="secret">
                                                    </div>

                                                    <div class="field col-sm-12">
                                                        <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Deactivate</span></button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade {{$isActiveProfile}}" id="editProfile">
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

                                <div class="tab-pane fade {{$isActivePassword}}" id="password">
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

                                <div class="tab-pane fade {{$isActivePhone}}" id="phoneNumber">
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