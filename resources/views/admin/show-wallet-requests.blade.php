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
                            <h2>Request Penarikan Dompet</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th class="text-right">Jumlah</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                    @foreach($statements as $statement)
                                        <tr>
                                            <td>{{ $idx }}</td>
                                            <td>{{ $statement->date }}</td>
                                            <td>{{ $statement->description }}</td>
                                            <td class="text-right">Rp {{ $statement->amount }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Terima</a>
                                                <a href="#" class="btn btn-danger">Tolak</a>
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