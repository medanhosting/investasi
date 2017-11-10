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
                            <i class="fa fa-exclamation-triangle"></i> Request Investor
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product-request') }}">
                            <i class="fa fa-exclamation-triangle"></i> Request Produk Investasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dompet-request') }}">
                            <i class="fa fa-exclamation-triangle"></i> Request Penarikan Dana
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('owner-list') }}">
                            <i class="fa fa-money"></i> Owner List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer-list') }}">
                            <i class="fa fa-users"></i> Investor List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dompet-list') }}">
                            <i class="fa fa-money"></i> Semua Penarikan Dana
                        </a>
                    </li>
                    <li><a><i class="fa fa-tags"></i> Produk Investasi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('product-list') }}">Show</a></li>
                            {{--<li><a href="{{ route('product-create') }}">Tambah</a></li>--}}
                        </ul>
                    </li>
                    <li><a><i class="fa fa-tags"></i> Blog <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin-blog-list') }}">Show</a></li>
                            <li><a href="{{ route ('blog-create') }}">Tambah</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-credit-card"></i> Coupon <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('coupon-index') }}">Show</a></li>
                            <li><a href="{{ route ('coupon-create') }}">Tambah</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Banner <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a>Slider Banner<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub-menu"><a href="{{ route('slider-banner-list') }}">Show</a></li>
                                    <li><a href="{{ route('slider-banner-create') }}">Tambah</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('transaction-list') }}">Histori</a></li>
                        </ul>
                    </li>
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