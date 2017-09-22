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
                            <h2>Transaction History</h2>
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
                                    <th>Total Payment</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
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
                                        <td>{{ $trx->payment_method->description }}</td>
                                        <td>{{ strtoupper($trx->courier) }} {{ $trx->delivery_type }}</td>
                                        <td>Rp {{ $trx->total_price }}</td>
                                        <td>Rp {{ $trx->delivery_fee }}</td>
                                        <td>Rp {{ $trx->total_payment }}</td>
                                        <td>{{ \Carbon\Carbon::parse($trx->created_on)->format('j M Y G:i:s') }}</td>
                                        <td>
                                            @if($trx->status_id == 3)
                                                Pending Payment
                                            @elseif($trx->status_id == 4)
                                                Payment Verification
                                            @elseif($trx->status_id == 5)
                                                Payment Confirmed
                                            @elseif($trx->status_id == 6)
                                                In Process
                                            @elseif($trx->status_id == 7)
                                                Rejected
                                            @elseif($trx->status_id == 8)
                                                In Delivery
                                            @elseif($trx->status_id == 9)
                                                <span style="color: #42b549;">Success</span>
                                            @elseif($trx->status_id == 10)
                                                <span style="color: red;">Failed</span>
                                            @endif
                                        </td>
                                        <td>
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

    <!-- footer -->
    @include('admin.partials._footer')
    <!-- /footer -->

@endsection