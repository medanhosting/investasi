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
                        <h2>Create Payment Method</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="/admin/paymentmethods/{{ $payment->id }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12" value="{{ $payment->description }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fee
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="fee" name="fee" required="required" class="form-control col-md-7 col-xs-12" value="{{ $payment->fee }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="type" class="form-control col-md-7 col-xs-12">
                                        @if($payment->type === "Manual Transfer")
                                            <option value="Manual Transfer" selected>Manual Transfer</option>
                                        @else
                                            <option value="Manual Transfer">Manual Transfer</option>
                                        @endif

                                        @if($payment->type === "Bank Transfer")
                                            <option value="Bank Transfer" selected>Bank Transfer</option>
                                        @else
                                            <option value="Bank Transfer">Bank Transfer</option>
                                        @endif

                                        @if($payment->type === "Card Payment")
                                            <option value="Card Payment" selected>Card Payment</option>
                                        @else
                                            <option value="Card Payment">Card Payment</option>
                                        @endif

                                        @if($payment->type === "Direct Debit")
                                            <option value="Direct Debit" selected>Direct Debit</option>
                                        @else
                                            <option value="Direct Debit">Direct Debit</option>
                                        @endif

                                        @if($payment->type === "e-Wallet")
                                            <option value="e-Wallet" selected>e-Wallet</option>
                                        @else
                                            <option value="e-Wallet">e-Wallet</option>
                                        @endif

                                        @if($payment->type === "Over the Counter")
                                            <option value="Over the Counter" selected>Over the Counter</option>
                                        @else
                                            <option value="Over the Counter">Over the Counter</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="status" name="status" class="form-control col-md-7 col-xs-12">
                                        @if($payment->status_id == 1)
                                            <option value="1" selected>Active</option>
                                        @else
                                            <option value="1">Active</option>
                                        @endif

                                        @if($payment->status_id == 2)
                                            <option value="2" selected>Inactive</option>
                                        @else
                                            <option value="2">Inactive</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

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

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection