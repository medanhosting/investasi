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
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Request Produk Investasi</h2>
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
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    {{--<th>User Name</th>--}}
                                    {{--<th>Vendor Name</th>--}}
                                    <th>Raising </th>
                                    <th>Created Date</th>
                                    <th>Featured Photo</th>
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
{{--                                            <td>{{ $product->user->first_name }} {{ $product->user->last_name }}</td>--}}
{{--                                            <td>{{ $product->name}}</td>--}}
                                            <td>Rp {{ $product->raising}}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($product->created_on)->format('j F y')}}
                                            </td>
                                            {{--<td width="15%">--}}
                                                {{--<img width="100%" src="{{ asset('storage\product\\'. $product->product_image()->where('featured', 1)->first()->path) }}">--}}
                                            {{--</td>--}}
                                            <td><img src="{{ URL::asset('storage/project/'.$product->image_path) }}" width="100"></td>
                                            <td>

                                                <a href="/admin/vendor/request-accept/{{ $product->vendor_id }}"class="btn btn-success">Accept</a>
                                                <a href="/admin/vendor/request-reject/{{ $product->vendor_id }}"class="btn btn-danger">Reject</a>
                                                {{--<a href="#" class="btn btn-primary">Terima</a>--}}
                                                {{--<a href="#" class="btn btn-danger">Tolak</a>--}}
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