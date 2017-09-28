<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Investasi.me</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ URL::asset('admin_images/user.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ \Illuminate\Support\Facades\Auth::guard('user_admins')->user()->first_name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin-dashboard') }}"><i class="fa fa-home"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor-request') }}">
                            <i class="fa fa-exclamation-triangle"></i> Vendor Request
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product-request') }}">
                            <i class="fa fa-exclamation-triangle"></i> Product Request
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('new-order-list') }}">
                            <i class="fa fa-exclamation-triangle"></i> New Order
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('payment-list') }}">
                            <i class="fa fa-money"></i> Payment Status
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer-list') }}">
                            <i class="fa fa-users"></i> Customer List
                        </a>
                    </li>
                    <li><a><i class="fa fa-tags"></i> Product <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('product-list') }}">Show</a></li>
                            <li><a href="{{ route('product-create') }}">Create</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Banner <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Slider Banner<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub-menu"><a href="{{ route('slider-banner-list') }}">Show</a></li>
                                    <li><a href="{{ route('slider-banner-create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('side-banner-list') }}">Side Banner</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-shopping-cart"></i> Transaction <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('delivery-list') }}">Delivery Request</a></li>
                            <li><a href="{{ route('transaction-list') }}">History</a></li>
                        </ul>
                    </li>
                    {{--<li><a><i class="fa fa-list"></i> Category <span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{ route('category-list') }}">Show</a></li>--}}
                            {{--<li><a href="{{ route('category-create') }}">Create</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li><a><i class="fa fa-bank"></i> Payment Methods <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('payment-method-show') }}">Show</a></li>
                            <li><a href="{{ route('payment-method-create') }}">Create</a></li>
                        </ul>
                    </li>
                    {{--<li><a><i class="fa fa-truck"></i> Courier <span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{ route('courier-list') }}">Show</a></li>--}}
                            {{--<li><a href="{{ route('courier-create') }}">Create</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a><i class="fa fa-truck"></i> Delivery Type <span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{ route('delivery-type-list') }}">Show</a></li>--}}
                            {{--<li><a href="{{ route('delivery-type-create') }}">Create</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li><a><i class="fa fa-bar-chart"></i> Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('report-form') }}">Show</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Status <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('status-list') }}">Show</a></li>
                            <li><a href="{{ route('status-create') }}">Create</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-user-secret"></i> Admin <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin-list') }}">Show</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-gear"></i> Store Setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('store-address') }}">Address</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('admin-logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>