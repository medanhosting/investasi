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
                            <h2>New Order</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Customer Name</th>
                                    <th>Payment Method</th>
                                    <th>Delivery</th>
                                    <th>Total Price</th>
                                    <th>Delivery Fee</th>
                                    <th>Payment Code</th>
                                    <th>Total Payment</th>
                                    <th>Order Date</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                @foreach($transactions as $trx)
                                    <tr>
                                        <td>{{ $idx }}</td>
                                        <td>{{ $trx->invoice }}</td>
                                        <td>{{ $trx->user->first_name }}&nbsp;{{ $trx->user->last_name }}</td>
                                        <td>{{ $trx->payment_method->type }} - {{ $trx->payment_method->description }}</td>
                                        <td>{{ strtoupper($trx->courier) }} {{ $trx->delivery_type }}</td>
                                        <td>Rp {{ $trx->total_price }}</td>
                                        <td>Rp {{ $trx->delivery_fee }}</td>
                                        <td>
                                            @if(!empty($trx->payment_code))
                                                {{ $trx->payment_code }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>Rp {{ $trx->total_payment }}</td>
                                        <td>
                                            <a onclick="modalPop('{{ $trx->id }}', 'accept', '/admin/neworder/accept/')" class="btn btn-success">Accept</a>
                                            <a onclick="rejectModalPop('{{ $trx->id }}')" class="btn btn-danger">Reject</a>
                                            <a href="/admin/transaction/detail/{{ $trx->id }}" class="btn btn-primary">Detail</a>
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

    <!-- reject modal -->
    <div id="modal-reject" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::open(array('action' => 'Admin\TransactionController@rejectOrder', 'method' => 'POST', 'role' => 'form', 'novalidate')) !!}
                {!! csrf_field() !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Reason for rejecting</h4>
                    </div>
                    <div class="modal-body">
                        <textarea id="reject-reason" name="reject-reason" style="width: 100%"></textarea>
                    </div>
                    {{ Form::hidden('reject-trx-id', '', array('id' => 'reject-trx-id')) }}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger" value="Confirm">
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /reject modal -->

    <!-- small modal -->
    @include('admin.partials._small_modal')
    <!--/small modal -->

@endsection