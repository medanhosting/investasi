@extends('layouts.frontend')

@section('body-content')
    <!-- about wrapper -->
    <div style="padding-top:3%;"></div>
    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row ">

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
                        <li class="active"><a href="#">
                                <h4 class="list-group-item-heading">Step 3</h4>
                                <p class="list-group-item-text">Photo Upload</p>
                            </a></li>
                    </ul>
                </div>

                <div class="col-md-6 ">
                    <div class="image-wrapper">
                        <img class="img-responsive" src="{{asset('frontend_images/featured-image-11.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="about-right-text">
                        <div class="widget-title">
                            <h4>Unggah foto signature Anda seperti contoh </h4>
                        </div>
                        <p class="first">Mengapa harus upload foto? karena ....... </p>
                        <p class="second">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptates dolor reprehenderit, deserunt, quibusdam repellat architecto blanditiis a, nulla inventore minima necessitatibus illum molestias, quas molestiae maiores tempora temporibus incidunt ea! Voluptate temporibus repellat nulla omnis nesciunt illum odit dicta fuga id!</p>
                        <br/>
                        {!! Form::open(array('action' => 'Frontend\VerificationController@UploadSignaturePhoto', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data', 'novalidate')) !!}
                        {{ csrf_field() }}
                        {!! Form::file('signature-photo', array('id' => 'signature-photo', 'class' => 'file')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <br/><br/>
    </div>
@endsection