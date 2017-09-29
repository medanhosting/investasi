@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Your Email is successfully verified!</h4>
                            <h5>Please Verify your Phone Number!</h5>
                            <form class="comment-form row altered" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="field col-sm-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <h4>Phone</h4>
                                    <input type="number" name="phone">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12">
                                    <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection