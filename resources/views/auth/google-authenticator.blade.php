@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Google Authenticator</h4>
                            @include('admin.partials._success')
                        </div>
                        <form class="comment-form row altered" method="POST" action="{{ route('login-google-authenticator') }}">
                            @if($errors->has('msg'))
                                <div class="field col-sm-12 text-center">
                                    <span class="help-block" style="color: red;">{{$errors->first()}}</span>
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <div class="field col-sm-12">
                                <h4>PIN Google Auth</h4>
                                <input type="number" name="secret">
                            </div>
                            <div class="field col-sm-4">
                                <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Login</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
