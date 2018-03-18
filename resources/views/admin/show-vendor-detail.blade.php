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
                <div class="title_left">
                    <h3>Vendor & Project Detail</h3>
                </div>

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
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{$product->name}}</h2>
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

                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <ul class="stats-overview">
                                    <li>
                                        <span class="name"> Raising </span>
                                        <span class="value text-success"> Rp{{$product->raising}} </span>
                                    </li>
                                    <li>
                                        <span class="name"> Start Date </span>
                                        <span class="value text-success"> {{$product->created_on}} </span>
                                    </li>
                                    <li class="hidden-phone">
                                        <span class="name"> Days Left </span>
                                        <span class="value text-success"> {{$product->days_left}} </span>
                                    </li>
                                </ul>
                                <br />

                                <ul class="stats-overview">
                                    <li>
                                        <span class="name"> Kelas (Suku Bunga) </span>
                                        <span class="value text-success"> {{$product->business_class}} ( {{$product->interest_rate}}% ) </span>
                                    </li>
                                    <li>
                                        <span class="name"> Cicilan/Bulan </span>
                                        <span class="value text-success"> Rp {{$product->installment_per_month}} </span>
                                    </li>
                                    <li class="hidden-phone">
                                        <span class="name"> Bunga/Bulan </span>
                                        <span class="value text-success"> Rp {{$product->interest_per_month}} </span>
                                    </li>
                                </ul>
                                <br />

                                <div style="height:350px;">
                                    <img src="{{asset('storage\project\\'.$product->image_path)}}" height="350px" />
                                </div>

                                @if(!empty($product->youtube_link))
                                    <iframe src="https://www.youtube.com/embed/{{$product->youtube_link}}" frameborder="0" allowfullscreen></iframe>
                                @endif

                                <div>

                                    <br/>
                                    <!-- end of user messages -->
                                    <ul class="messages">
                                        <li>
                                            <img src="{{ asset('storage\owner_picture\\'.$vendor->profile_picture) }}" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <h3 class="date text-info">{{ \Carbon\Carbon::parse($vendor->created_at)->format('j') }}</h3>
                                                <p class="month">{{ \Carbon\Carbon::parse($vendor->created_at)->format('M Y') }}</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h2 class="heading">{{$vendor->name}}</h2>
                                                <blockquote class="message">{!! $vendor->description !!}</blockquote>
                                                <br />
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end of user messages -->


                                </div>


                            </div>

                            <!-- start project-detail sidebar -->
                            <div class="col-md-3 col-sm-3 col-xs-12">

                                <section class="panel">

                                    <div class="x_title">
                                        <h2>Project Description</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <p>{!! $product->description !!}</p>
                                        <br />

                                        <div class="project_detail">

                                            <p class="title">Status</p>
                                            <p>{{$product->status->description}}</p>
                                            <p class="title">Project Owner</p>
                                            <p>{{ $user->first_name. ' ' . $user->last_name }}</p>
                                        </div>

                                       {{-- <br />
                                        <h5>Project files</h5>
                                        <ul class="list-unstyled project_files">
                                            <li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a>
                                            </li>
                                            <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                                            </li>
                                            <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a>
                                            </li>
                                            <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                                            </li>
                                            <li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a>
                                            </li>
                                        </ul>--}}
                                        <br />

                                        @if($product->status_id == 3)
                                            <div class="text-center mtop20">
                                                <a onclick="modalPop('{{ $product->id }}', 'accept', '/admin/owner/accept/')" class="btn btn-sm btn-success">Accept</a>
                                                <a onclick="modalPop('{{ $product->id }}', 'cancel', '/admin/owner/reject/')" class="btn btn-sm btn-danger">Reject</a>
                                            </div>
                                        @endif
                                    </div>

                                </section>

                            </div>
                            <!-- end project-detail sidebar -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- small modal -->
    @include('admin.partials._small_modal')
    <!-- /small modal -->

    <!-- footer -->
    @include('admin.partials._footer')
    <!-- /footer -->

@endsection