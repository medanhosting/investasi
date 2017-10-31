@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Profil Vendor</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Profil Vendor
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Causes Wrapper -->
    <div class="causes-page-wrapper single-cause vendor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 text-center">
                    <img src="{{ URL::asset('frontend_images/default-profile.jpg') }}" style="height: 100px; width: auto;">
                    <h3>{{ $vendor->name }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-xs-12">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="pill" href="#bio">BIOGRAFI</a></li>
                        <li><a data-toggle="pill" href="#project">PROYEK</a></li>
                    </ul>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div id="bio" class="tab-pane fade in active">
                            {!! $vendor->description !!}
                        </div>
                        <div id="project" class="tab-pane fade" style="padding-bottom: 40px;">
                            <table id="datatable-responsive-debt" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Sisa Hari</th>
                                    <th>Minimum</th>
                                    <th>Progress</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                @foreach($vendor->products as $product)

                                    @php( $percentage = ($product->getOriginal('raised') * 100) / $product->getOriginal('raising') )
                                    @php( $percentage = number_format($percentage, 0) )
                                    <tr>
                                        <td>{{ $idx }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp {{ $product->raising }}</td>
                                        <td>{{ $product->days_left }} </td>
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
    </div>


@endsection