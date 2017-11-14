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
                        <h2>Edit Profile</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        {!! Form::open(array('action' => array('Admin\AdminController@store'), 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal form-label-left', 'novalidate')) !!}
                        {{ csrf_field() }}

                            @if(count($errors))
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li> {{ $error }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Email :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Nama Depan :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Nama Belakang :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Password :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Confirm Password :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password-confirmation" name="password-confirmation" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label>Tipe User :</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="type" name="type" class="form-control col-md-7 col-xs-7" required="required" >
                                        <option value="-1">Pilih Tipe</option>
                                        <option value="1">Moderator</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Buat Baru</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    @include('admin.partials._footer')
    <!-- /footer -->

@endsection