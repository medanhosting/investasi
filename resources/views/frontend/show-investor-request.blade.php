@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Investor</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Request investor
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
                        <i class="fa fa-money fa-1x"></i> Rp 5.000.000
                    </h2>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Request sebagai Investor</h4>
                        </div>
                        {{--<form class="comment-form row altered" method="POST" action="{{ route('withdrawSubmit') }}">--}}
                        <form class="comment-form row altered" method="POST" >
                            {{ csrf_field() }}


                            <div class="field col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <h5>Nama PT / Proyek</h5>
                                <input type="number" name="name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12 {{ $errors->has('raising') ? ' has-error' : '' }}">
                                <h5>Total Pendanaan</h5>
                                <input type="number" name="raising">
                                @if ($errors->has('raising'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('raising') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('minimum') ? ' has-error' : '' }}">
                                <h5>Minimum Investasi</h5>
                                <input type="text" name="minimum">
                                @if ($errors->has('minimum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('minimum') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('days') ? ' has-error' : '' }}">
                                <h5>Total Hari</h5>
                                <input type="text" name="days">
                                @if ($errors->has('days'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('days') }}</strong>
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
            </div>
        </div>
    </div>
@endsection
