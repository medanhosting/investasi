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
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Side Banner List</h2>
                        <div class="nav navbar-right">
                            <a href="{{ route('slider-banner-create') }}" class="btn btn-app">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Position</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>First Side Banner</td>
                                <td width="15%">
                                    <img width="100%" src="{{ asset('storage\banner\\'. $banner1st->image_path) }}">
                                </td>
                                <td>
                                    @if(!empty($banner1st->product_id))
                                        {{ $banner1st->product->name}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($banner1st->product_id))
                                        Same as product url
                                    @else
                                        @if(!empty($banner1st->url))
                                            {{ $banner1st->url }}
                                        @else
                                            -
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($banner1st->status_id == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($banner1st->created_at)->format('j F y')}}
                                </td>
                                <td>
                                    <a href="/admin/banner/side/edit/{{ $banner1st->id }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Second Side Banner</td>
                                <td width="15%">
                                    <img width="100%" src="{{ asset('storage\banner\\'. $banner2nd->image_path) }}">
                                </td>
                                <td>
                                    @if(!empty($banner2nd->product_id))
                                        {{ $banner2nd->product->name}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($banner2nd->product_id))
                                        Same as product url
                                    @else
                                        @if(!empty($banner2nd->url))
                                            {{ $banner2nd->url }}
                                        @else
                                            -
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($banner2nd->status_id == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($banner2nd->created_at)->format('j F y')}}
                                </td>
                                <td>
                                    <a href="/admin/banner/side/edit/{{ $banner2nd->id }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Third Side Banner</td>
                                <td width="15%">
                                    <img width="100%" src="{{ asset('storage\banner\\'. $banner3rd->image_path) }}">
                                </td>
                                <td>
                                    @if(!empty($banner3rd->product_id))
                                        {{ $banner3rd->product->name}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($banner3rd->product_id))
                                        Same as product url
                                    @else
                                        @if(!empty($banner3rd->url))
                                            {{ $banner3rd->url }}
                                        @else
                                            -
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($banner3rd->status_id == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($banner3rd->created_at)->format('j F y')}}
                                </td>
                                <td>
                                    <a href="/admin/banner/side/edit/{{ $banner3rd->id }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
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