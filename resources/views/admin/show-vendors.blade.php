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
        <div class="">
            <div class="page-title">
                {{--<div class="title_left">--}}
                {{--<h3>Users <small>Some examples to get you started</small></h3>--}}
                {{--</div>--}}

                {{--<div class="title_right">--}}
                {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">Go!</button>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Vendor List</h2>
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                            {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="#">Settings 1</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Settings 2</a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>Company Name</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                    @foreach($vendors as $vendor)
                                        <tr>
                                            <td>{{ $idx }}</td>
                                            <td>{{ $vendor->user->first_name }} {{ $vendor->user->last_name }}</td>
                                            <td>{{ $vendor->name }}</td>
                                            <td>{{ $vendor->description }}</td>
                                            <td>{{ \Carbon\Carbon::parse($vendor->created_at)->format('j M Y G:i:s') }}</td>
                                            <td>
                                                <a href="/admin/vendor/detail/{{ $vendor->id }}" class="btn btn-primary">Detail</a>
                                                {{--@if(\Illuminate\Support\Facades\Auth::guard('user_admins')->user()->id == $user->id)--}}
                                                    {{--<a href="/admin/vendor/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>--}}
                                                {{--@else--}}
                                                    {{-----}}
                                                {{--@endif--}}
                                            </td>
                                        </tr>
                                        @php( $idx++ )
                                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection