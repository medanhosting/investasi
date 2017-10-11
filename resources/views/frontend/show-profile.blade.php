@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Profil Saya</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Home</a>
                        <i class="fa fa-angle-double-right"></i>Profil Saya</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#editProfile" data-toggle="tab">Ubah Profil</a></li>
                            <li><a href="#password" data-toggle="tab">Ubah Password</a></li>
                            <li><a href="#phoneNumber" data-toggle="tab">Ubah Nomor Telepon</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
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
                                                <input type="text" name="fname" placeholder="{{$user->first_name}}">
                                                @if ($errors->has('fname'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="field col-sm-6 {{ $errors->has('lname') ? ' has-error' : '' }}">
                                                <h5>Nama Belakang</h5>
                                                <input type="text" name="lname" placeholder="{{$user->last_name}}">
                                                @if ($errors->has('lname'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('lname') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <h5>Email</h5>
                                                <input type="text" name="email" placeholder="{{$user->email}}">
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

@endsection