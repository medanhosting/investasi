@extends('layouts.admin')

@section('dashboard')

    <!-- sidebar -->
    @include('admin.partials._sidebar')
    <!-- sidebar -->

    <!-- top navigation -->
    @include('admin.partials._navigation')
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Your Profile</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#">
                            @if(\Illuminate\Support\Facades\Session::has('message'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('message') }}</div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Email :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control">{{ $admin->email }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>First Name :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control">{{ $admin->first_name }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Last Name :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="form-control">{{ $admin->last_name }}</label>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('admin-edit', [ 'id' => \Illuminate\Support\Facades\Auth::guard('user_admins')->user()->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-password-edit', [ 'id' => \Illuminate\Support\Facades\Auth::guard('user_admins')->user()->id]) }}" class="btn btn-primary">Change Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    @include('admin.partials._footer')
    <!-- /footer -->

@endsection