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
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Sisa Hari</th>
                                    <th>Terkumpul</th>
                                    <th>Minimum</th>
                                    <th>Progress</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                    @foreach($products as $product)

                                        @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                            @php( $percentage = number_format($percentage, 0) )
                                                <tr>
                                                    <td>{{ $idx }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>Rp {{ $product->raising }}</td>
                                                    <td>{{ $product->days_left }} </td>
                                                    <td>Rp {{ $product->raised }}</td>
                                                    <td>Rp {{ $product->minimum_per_investor }}</td>
                                                    <td>
                                                        <div class="progress-bar-inner">
                                                            <div class="progress-bar">
                                                                <span data-percent="{{$percentage}}"><span class="pretng">{{$percentage}}%</span> </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('project-detail', ['id' => $product->id]) }}" target="_blank">
                                                            <button class="btn btn-primary">Detail</button>
                                                        </a>
                                                        <a href="{{ route('product-news-request', ['productId' => $product->id])}}" target="_blank">
                                                            <button class="btn btn-info">Tambah Berita</button>
                                                        </a>
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