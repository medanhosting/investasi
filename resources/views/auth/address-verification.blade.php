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

                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <input type="text" id="searchmap">
                        <div id="map-canvas"></div>

                        <label>lat</label>
                        <input type="text" id="lat" name="lat">
                        <label>lng</label>
                        <input type="text" id="lng" name="lng">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var map= new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
              lat:27.799999999999,
                lng:85.999999999
            },
            zoom:15
        });

        var marker = new google.maps.Marker({
           position:{
               lat:27.799999999999,
               lng:85.999999999
           },
            map: map,
            draggable: true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
    </script>
@endsection