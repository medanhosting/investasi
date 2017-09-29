@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <p>We have sent verification email to {{ $email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection