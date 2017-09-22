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
                            <h2>Product List</h2>
                            <div class="nav navbar-right">
                                <a href="{{ route('product-create') }}" class="btn btn-app">
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
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Weight</th>
                                    <th>Normal Price</th>
                                    <th>Discount</th>
                                    <th>Flat Discount</th>
                                    <th>Final Price</th>
                                    <th>Stock</th>
                                    <th>Created Date</th>
                                    <th>Featured Photo</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($idx = 1)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $idx}}</td>
                                        <td>{{ $product->name}}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->weight }} gr</td>
                                        <td>Rp {{ $product->price}}</td>
                                        <td>
                                            @if(!empty($product->discount))
                                                {{ $product->discount}}%
                                            @else
                                                -
                                            @endif

                                        </td>
                                        <td>
                                            @if(!empty( $product->discount_flat))
                                                Rp {{ $product->discount_flat}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($product->price_discounted))
                                                Rp {{$product->price_discounted}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{ $product->quantity }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($product->created_on)->format('j F y')}}
                                        </td>
                                        <td width="15%">
                                            <img width="100%" src="{{ asset('storage\product\\'. $product->product_image()->where('featured', 1)->first()->path) }}">
                                        </td>
                                        <td>
                                            @if($product->status_id == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/product/edit/{{ $product->id }}" class="btn btn-primary">Edit</a>
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