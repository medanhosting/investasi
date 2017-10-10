@extends('layouts.frontend')

@section('body-content')

    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Verify </h2>
                <div class="short-text">
                    <h5>Home<i class="fa fa-angle-double-right"></i>Photo Verification</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- about wrapper -->
    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row ">
                <div class="col-md-6 ">
                    <div class="image-wrapper">
                        <img class="img-responsive" src="{{asset('frontend_images/featured-image-11.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="about-right-text">
                        <div class="widget-title">
                            <h4>Hi We Provide Worldwide Charity Service Since 1978</h4>
                        </div>
                        <p class="first">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus sapiente deleniti commodi provident veniam vitae blanditiis rerum temporibus totam est, omnis sint excepturi maiores iure similique. Sequi magni, suscipit laudantium velit. Excepturi sint placeat vel, porro, saepe ratione sunt natus, quod rem error ipsum ipsa.</p>
                        <p class="second">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptates dolor reprehenderit, deserunt, quibusdam repellat architecto blanditiis a, nulla inventore minima necessitatibus illum molestias, quas molestiae maiores tempora temporibus incidunt ea! Voluptate temporibus repellat nulla omnis nesciunt illum odit dicta fuga id!</p>
                        <br/>
                        {!! Form::open(array('action' => 'Frontend\VerificationController@UploadPhoto', 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data', 'novalidate')) !!}
                        {{ csrf_field() }}
                        {!! Form::file('verification-photo', array('id' => 'verification-photo', 'class' => 'file')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <br/><br/>
    </div>
@endsection