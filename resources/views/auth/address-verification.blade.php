@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div style="padding-top:3%;"></div>
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">


                <div class="col-xs-12">
                    <ul class="nav nav-pills nav-justified thumbnail custom-color">
                        <li><a href="#">
                                <h4 class="list-group-item-heading">Step 1</h4>
                                <p class="list-group-item-text">Email Verification</p>
                            </a></li>
                        <li><a href="#">
                                <h4 class="list-group-item-heading">Step 2</h4>
                                <p class="list-group-item-text">Phone Verification</p>
                            </a></li>
                        <li><a href="#">
                                <h4 class="list-group-item-heading">Step 3</h4>
                                <p class="list-group-item-text">Photo Upload</p>
                            </a></li>
                        <li><a href="#">
                                <h4 class="list-group-item-heading">Step 4</h4>
                                <p class="list-group-item-text">Risk Profile</p>
                            </a></li>
                        <li class="active"><a href="#">
                                <h4 class="list-group-item-heading">Step 5</h4>
                                <p class="list-group-item-text">Set Your Address</p>
                            </a></li>
                    </ul>
                </div>

                <div class="row ">
                    <div class="col-md-6 ">

                        <div class="about-right-text"style="background: none;padding-top:10%;">
                            <div id="map"></div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="about-right-text"style="background: none;padding-top:10%;">
                            <div class="widget-title">
                                <h4>Atau Cari Alamat Anda</h4>
                            </div>
                            <form class="comment-form row altered">
                                <div class="input">
                                    <div class="field col-sm-6">
                                        <input type="text" id="address" name="address">
                                    </div>
                                    <div class="field col-sm-6" style="margin-top:0;">
                                        {{--<input type="submit" class="btn btn-big btn-solid" value="Search" />--}}
                                        <input type="button" id="geocoding_form" class="btn btn-big btn-solid" value="Search"/>
                                    </div>
                                </div>
                            </form>
                            <br/>

                            <form class="comment-form row altered" method="POST" action="{{ route('map-submit') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="geo-latitude" name="geo-latitude">
                                <input type="hidden" id="geo-longitude" name="geo-longitude">
                                <button class="btn btn-big btn-solid">Simpan Data ALamat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection