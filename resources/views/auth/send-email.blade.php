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
                                <h4 class="list-group-item-heading">Step 1</h4>
                                <p class="list-group-item-text">Email Verification</p>
                            </a></li>
                        <li class="disabled"><a href="#">
                                <h4 class="list-group-item-heading">Step 2</h4>
                                <p class="list-group-item-text">Phone Verification</p>
                            </a></li>
                        <li class="disabled"><a href="#">
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
                    </ul>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <p>Kami telah mengirimkan email verifikasi ke {{\Illuminate\Support\Facades\Session::flash('email')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection