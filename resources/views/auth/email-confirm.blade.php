@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-pills nav-justified thumbnail custom-color">
                        <li class="active"><a href="#">
                                <p class="list-group-item-text">Email Verification</p>
                            </a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Your Email is successfully verified!</h4>
                            <h5>Please Verify your Phone Number!</h5>
                            <a href="{{ route('login') }}">login</a></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection