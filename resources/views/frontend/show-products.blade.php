@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Daftar Investasi</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Daftar Investasi
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <div class="grid-cause-area list-cause-area">
        <div class="container">

            <div id="tabs" class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li {{$isActiveTabDebt}}><a href="{{route('project-list', ['tab' => 'debt'])}}" >Saham</a></li>
                        <li {{$isActiveTabEquity}}><a href="{{route('project-list', ['tab' => 'equity'])}}" >Hutang</a></li>
                        <li {{$isActiveTabSharing}}><a href="{{route('project-list', ['tab' => 'sharing'])}}" >Bagi Hasil / Produk</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade {{$isActiveDebt}}" id="debt">
                            <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-debt" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Total</th>
                                                <th>Sisa Hari</th>
                                                <th>Minimum</th>
                                                <th class="hidden-xs hidden-sm">Progress</th>
                                                <th>Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($product_debts as $product)

                                                    @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                                        @php( $percentage = number_format($percentage, 0) )
                                                                    <tr>
                                                                        <td>{{ $idx }}</td>
                                                                        <td>{{ $product->name }}</td>
                                                                        <td>Rp {{ $product->raising }}</td>
                                                                        <td>{{ $product->days_left }} </td>
                                                                        {{--<td>Rp {{ $product->raised }}</td>--}}
                                                                        <td>Rp {{ $product->minimum_per_investor }}</td>
                                                                        <td class="hidden-xs hidden-sm">
                                                                            <div class="progress-bar-inner">
                                                                                <div class="progress-bar">
                                                                                    <span data-percent="{{$percentage}}"><span class="pretng">{{$percentage}}%</span> </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ route('project-detail', ['id' => $product->id]) }}">
                                                                                <button class="btn btn-primary">Detail</button>
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
                        <div class="tab-pane fade {{$isActiveEquity}}" id="equity">
                            <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-equity" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Total</th>
                                                <th>Sisa Hari</th>
                                                <th>Bunga/Kupon</th>
                                                <th>Minimum</th>
                                                <th class="hidden-xs hidden-sm">Progress</th>
                                                <th>Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($product_equities as $product)

                                                    @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                                    @php( $percentage = number_format($percentage, 0) )
                                                        <tr>
                                                            <td>{{ $idx }}</td>
                                                            <td>{{ $product->name }}</td>
                                                            <td>Rp {{ $product->raising }}</td>
                                                            <td>{{ $product->days_left }} </td>
                                                            {{--<td>Rp {{ $product->raised }}</td>--}}
                                                            <td>Rp -</td>
                                                            <td>Rp {{ $product->minimum_per_investor }}</td>
                                                            <td class="hidden-xs hidden-sm">
                                                                <div class="progress-bar-inner">
                                                                    <div class="progress-bar">
                                                                        <span data-percent="{{$percentage}}"><span class="pretng">{{$percentage}}%</span> </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('project-detail', ['id' => $product->id]) }}" >
                                                                    <button class="btn btn-primary">Detail</button>
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
                        <div class="tab-pane fade {{$isActiveSharing}}" id="sharing">
                            <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content table-responsive">
                                        <table id="datatable-responsive-sharing" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Total</th>
                                                <th>Sisa Hari</th>
                                                <th>Minimum</th>
                                                <th class="hidden-xs hidden-sm">Progress</th>
                                                <th>Tanggal</th>
                                                <th>Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php( $idx = 1 )
                                                @foreach($product_sharings as $product)

                                                    @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                                        @php( $percentage = number_format($percentage, 0) )
                                                            <tr>
                                                                <td>{{ $idx }}</td>
                                                                <td>{{ $product->name }}</td>
                                                                <td>Rp {{ $product->raising }}</td>
                                                                <td>{{ $product->days_left }} </td>
                                                                {{--<td>Rp {{ $product->raised }}</td>--}}
                                                                <td>Rp {{ $product->minimum_per_investor }}</td>
                                                                <td class="hidden-xs hidden-sm">
                                                                    <div class="progress-bar-inner">
                                                                        <div class="progress-bar">
                                                                            <span data-percent="{{$percentage}}"><span class="pretng">{{$percentage}}%</span> </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $product->created_on }} </td>
                                                                <td>
                                                                    <a href="{{ route('project-detail', ['id' => $product->id]) }}" >
                                                                        <button class="btn btn-primary">Detail</button>
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
            </div>
        </div>
    </div>
@endsection