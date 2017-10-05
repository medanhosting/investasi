@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>We already sent verification number to this number {{ $phone }}</h4>
                            <h5>Please Verify your Phone Number!</h5>
                            @include('admin.partials._success')
                            <form class="comment-form row altered" method="POST" action="{{ route('verify-phone') }}">
                                {{ csrf_field() }}
                                <div class="field col-sm-12 {{ $errors->has('phone_token') ? ' has-error' : '' }}">
                                    <h4>Verification number</h4>
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="number" name="phone_token" style="text-align: center;">
                                    @if ($errors->has('phone_token'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_token') }}</strong>
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