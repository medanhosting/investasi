@extends('layouts.invoice')

@section('invoice_content')
<style>
    body{
        background: none;
    }
</style>
    <!-- page content -->
    <div role="main">
        <div class="">
            <div class="page-title">
                <div class="x_title center" style="text-align: center;">
                    <h1>Transaction Report</h1>
                    <br>
                    <h3>{{$statusString}}</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_title">
                    <div class="col-lg-1 col-md-1 col-xs-1"> <h3>Start </h3></div>
                    <div class="col-lg-11 col-md-11 col-xs-11"> <h3>: {{\Carbon\Carbon::parse($start)->format('j F Y') }}</h3></div>
                    <div class="col-lg-1 col-md-1 col-xs-1"> <h3>End</h3></div>
                    <div class="col-lg-11 col-md-11 col-xs-11"> <h3>: {{\Carbon\Carbon::parse($end)->format('j F Y') }}</h3></div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
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
                                    <th>Order Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                    @foreach($transactions as $trx)
                                        <tr>
                                            <td>{{ $idx }}</td>
                                            <td>{{ $trx->invoice }}<br/></td>
                                            <td>{{ $trx->user->first_name }}&nbsp;{{ $trx->user->last_name }}</td>
                                            <td>{{ strtoupper($trx->courier) }} {{ $trx->delivery_type }}</td>
                                            <td>Rp {{ $trx->total_price }}</td>
                                            <td>Rp {{ $trx->delivery_fee }}</td>
                                            <td>Rp {{ $trx->total_payment }}</td>
                                            <td>{{ \Carbon\Carbon::parse($trx->created_on)->format('j M Y') }}</td>
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

        <div class="pull-right" style="padding: 0 2% 5% 0">
            <button onclick="InvoicePrint()"id="print-preview" class="btn btn-success">Print</button>
        </div>
    </div>
    <!-- /page content -->

@endsection

<script type="text/javascript">
    function InvoicePrint() {
        window.print();
    }
</script>