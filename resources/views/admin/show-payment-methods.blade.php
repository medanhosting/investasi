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
                            @include('admin.partials._success')
                            <h2>Payment Methods</h2>
                            <div class="nav navbar-right">
                                <a href="{{ route('payment-method-create') }}" class="btn btn-app">
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
                                    <th>Fee</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    $idx = 1;
                                ?>

                                @foreach($paymentMethods as $payment)
                                    <tr>
                                        <td>{{ $idx }}</td>
                                        <td>{{ $payment->description }}</td>
                                        <td>
                                            @if(!empty($payment->fee))
                                                Rp {{ $payment->fee }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $payment->type }}</td>
                                        <td>
                                            @if($payment->status_id == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/paymentmethods/edit/{{ $payment->id }}" class="btn btn-default submit">Edit</a>
                                            {{--<a href="/admin/paymentmethods/delete/{{ $payment->id }}" class="btn btn-danger submit">Delete</a>--}}
                                        </td>
                                    </tr>
                                    <?php
                                        $idx++;
                                    ?>
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