@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Secondary Market</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i> Secondary Market
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <div class="grid-cause-area list-cause-area">
        <div class="container">

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
                                <th>Terkumpul</th>
                                <th>Minimum</th>
                                <th>Progress</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $idx = 1 )
                                @foreach($products as $product)

                                    @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                        @php( $percentage = number_format($percentage, 0) )
                                            <tr>
                                                <td>{{ $idx }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>Rp {{ $product->raising }}</td>
                                                <td>{{ $product->days_left }} </td>
                                                <td>Rp {{ $product->raised }}</td>
                                                <td>Rp {{ $product->minimum_per_investor }}</td>
                                                <td>
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
    </div>
@endsection