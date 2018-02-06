@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div style="padding-top:3%;"></div>
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
                            <p>Kami telah mengirimkan email verifikasi ke {{$email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection