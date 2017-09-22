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
                        <h2>Delivery Request List</h2>
                        {{--<ul class="nav navbar-right panel_toolbox">--}}
                            {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                                {{--</li>--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                {{--<ul class="dropdown-menu" role="menu">--}}
                                    {{--<li><a href="#">Settings 1</a>--}}
                                        {{--</li>--}}
                                    {{--<li><a href="#">Settings 2</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Customer Name</th>
                                <th>Delivery</th>
                                <th>Total Price</th>
                                <th>Delivery Fee</th>
                                <th>Total Payment</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $idx = 1 )
                            @foreach($transactions as $trx)
                            <tr>
                                @php( $courier_name = strtoupper($trx->courier). ' '. $trx->delivery_type )
                                <td>{{ $idx }}</td>
                                <td>{{ $trx->invoice }}</td>
                                <td>{{ $trx->user->first_name }}&nbsp;{{ $trx->user->last_name }}</td>
                                <td>{{ $courier_name }}</td>
                                <td>Rp {{ $trx->total_price }}</td>
                                <td>Rp {{ $trx->delivery_fee }}</td>
                                <td>Rp {{ $trx->total_payment }}</td>
                                <td>
                                    @if($trx->status_id == 6)
                                        Waiting
                                    @elseif($trx->status_id == 8)
                                        Delivery in progress
                                    @endif
                                </td>
                                <td>
                                    @if($trx->status_id == 6)
                                        <a onclick="confirmDeliveryModalPop('{{ $trx->id }}', '{{ $courier_name }}')" class="btn btn-success">Confirm</a>
                                        <a href="/admin/transaction/detail/{{ $trx->id }}" class="btn btn-primary">Detail</a>
                                    @elseif($trx->status_id == 8)
                                        <a onclick="" class="btn btn-success">Track</a>
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

<!-- tracking code modal -->
<div id="modal-tracking-code" class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(array('action' => 'Admin\TransactionController@confirmDelivery', 'method' => 'POST', 'role' => 'form', 'novalidate')) !!}
            {!! csrf_field() !!}
            <div class="modal-body">
                <p>Courier used: <b><span id="courier-name"></span></b></p>
                <p>Please input tracking code</p>
                <input type="text" id="tracking-code" name="tracking-code" style="width: 100%" required>
            </div>
            {{ Form::hidden('delivery-trx-id', '', array('id' => 'delivery-trx-id')) }}
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" value="Confirm">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- /tracking code modal -->

@endsection