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
                            <h2>Coupons</h2>
                            <div class="clearfix"></div>
                        </div>
                        @include('admin.partials._success')
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{ $idx }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td>Rp{{ $coupon->amount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($coupon->created_at)->format('j M Y G:i:s') }}</td>
                                        <td>{{ $coupon->user_admin->first_name . $coupon->user_admin->last_name }}</td>
                                        <td>{{ $coupon->status->description }}</td>
                                        <td>
                                            <a href="{{ route('coupon-edit', $coupon->id) }}" class="btn btn-sm btn-success">Edit</a>
                                            @if($coupon->status_id == 1)
                                                <a onclick="modalPop('{{ $coupon->id }}', 'deactivate', '/admin/coupon/deactivate/')" class="btn btn-sm btn-warning">Deactivate</a>
                                            @else
                                                <a onclick="modalPop('{{ $coupon->id }}', 'activate', '/admin/coupon/activate/')" class="btn btn-sm btn-primary">Activate</a>
                                            @endif
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

    <!-- small modal -->
    @include('admin.partials._small_modal')
    <!-- /small modal -->

@endsection