@extends('layouts.admin')

@section('dashboard')

    <!-- sidebar -->
    @include('admin.partials._sidebar')
    <!-- sidebar -->

    <!-- top navigation -->
    @include('admin.partials._navigation')
    <!-- /top navigation -->

    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Registered Customers</span>
                <div class="count">{{ $customerTotal }}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-money"></i> Total Success Transactions</span>
                <div class="count">{{ $trxTotal }}</div>
            </div>
            {{--<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">--}}
                {{--<span class="count_top"><i class="fa fa-dollar"></i> Total Incomes</span>--}}
                {{--<div class="count green">25 Millions</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">--}}
                {{--<span class="count_top"><i class="fa fa-user"></i> Total Females</span>--}}
                {{--<div class="count">4,567</div>--}}
                {{--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">--}}
                {{--<span class="count_top"><i class="fa fa-user"></i> Total Collections</span>--}}
                {{--<div class="count">2,315</div>--}}
                {{--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">--}}
                {{--<span class="count_top"><i class="fa fa-user"></i> Total Connections</span>--}}
                {{--<div class="count">7,325</div>--}}
                {{--<span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>--}}
            {{--</div>--}}
        </div>
        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Welcome</h3>
                        </div>
                        {{--<div class="col-md-6">--}}
                            {{--<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">--}}
                                {{--<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>--}}
                                {{--<span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        @if($newOrderTotal == 0 && $onGoingPaymentTotal == 0)
                            <div class="alert alert-info alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Hi!</strong> There is nothing needs your attentions
                            </div>
                        @endif

                        @if($newOrderTotal > 0)
                            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                @if($newOrderTotal > 1)
                                There are {{ $newOrderTotal }} new orders
                                @else
                                    There is {{ $newOrderTotal }} new order
                                @endif
                                , please take a look <a style="color: dodgerblue;" href="{{ route('new-order-list') }}"><strong>here</strong></a>
                            </div>
                        @endif

                        @if($onGoingPaymentTotal > 0)
                            <div class="alert alert-info alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                @if($onGoingPaymentTotal > 1)
                                    There are {{ $onGoingPaymentTotal }} new payments
                                @else
                                    There is {{ $onGoingPaymentTotal }} new payment
                                @endif
                                    , you can check {{ $onGoingPaymentTotal > 1 ? 'their':'its' }} status <a style="color: orange;" href="{{ route('payment-list') }}"><strong>here</strong></a>
                            </div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <br />
    </div>

@endsection