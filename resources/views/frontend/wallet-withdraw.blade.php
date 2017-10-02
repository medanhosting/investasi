@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>My Wallet</h2>
                <div class="short-text">
                    <h5>Home<i class="fa fa-angle-double-right"></i>My Wallet<i class="fa fa-angle-double-right"></i>Withdraw</h5>
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
                            <h4>Withdraw</h4>
                        </div>
                        <form class="comment-form row altered" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}


                            <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <h5>Amount</h5>
                                <input type="number" name="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <h5>Account Number</h5>
                                <input type="text" name="first_name">
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <h5>Account Name</h5>
                                <input type="text" name="last_name">
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field col-sm-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <h5>Bank Name</h5>
                                <input type="number" name="phone">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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
@endsection
