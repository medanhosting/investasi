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
                        <h2>Slider Banner List</h2>
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
                                <th>No</th>
                                <th>Image</th>
                                <th>Caption</th>
                                <th>Sub Caption</th>
                                <th>Product Name</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ( $idx = 1 )
                            @foreach($banners as $banner)
                            <tr>
                                <td>{{ $idx }}</td>
                                <td width="15%">
                                    <img width="100%" src="{{ asset('storage\banner\\'. $banner->image_path) }}">
                                </td>
                                <td>
                                    @if(!empty($banner->caption))
                                        {{ $banner->caption}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($banner->sub_caption))
                                        {{ $banner->sub_caption}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($banner->product_id))
                                        {{ $banner->product->name}}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($banner->product_id))
                                        Same as product url
                                    @else
                                        @if(!empty($banner->url))
                                        {{ $banner->url }}
                                        @else
                                        -
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($banner->status_id == 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($banner->created_at)->format('j F y')}}
                                </td>
                                <td>
                                    <a href="/admin/banner/slider/edit/{{ $banner->id }}" class="btn btn-primary">Edit</a>
                                    <a href="/admin/banner/slider/delete/{{ $banner->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php ($idx++)
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