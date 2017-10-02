
<!-- header -->
<header>
    <div id="search-bar">
        <div class="container">
            <div class="row">
                <form action="#" name="search" class="col-xs-12">
                    <input type="text" name="search" placeholder="Type and Hit Enter"><i id="search-close" class="fa fa-close"></i>
                </form>
            </div>
        </div>
    </div>
    <nav  class="navigation">
        <div class="container">
            <div class="row">
                <div class="logo-wrap col-md-3 col-xs-6">
                    <a href="{{route('index')}}"><img src="{{ URL::asset('frontend_images/logo.png') }}" style="width:50%"></a>
                    {{--<a href="index.html">Investasi.me</a>--}}
                </div>
                <div class="menu-wrap col-md-8 ">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{route('index')}}" >Home</a>
                        </li>
                        <li>
                            <a href="{{route('product-list')}}">Invest.me</a>
                        </li>
                        <li>
                            <span>About</span>
                            <ul class="submenu">
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('term-condition')}}">Term & Condition</a></li>
                                <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <ul class="submenu">

                                @if(auth()->check())
                                    <li><a href="{{route('my-profile')}}">My Profile</a></li>
                                    <li><a href="{{route('portfolio')}}">Portfolio</a></li>
                                    <li><a href="{{route('my-wallet')}}">My Wallet</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}" >Login</a></li>
                                    <li><a href="{{ route('register') }}" >Register</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1 col-xs-6">
                    <div id="search-toggle">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>
        </div>

        <!--[ MOBILE-MENU-AREA START ]-->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="mobile-area">
                            <div class="mobile-menu">
                                <nav id="mobile-nav">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home </a></li>
                                        <li><a href="{{route('product-list')}}"> Invest.me </a></li>
                                        <li><a>About</a>
                                            <ul>
                                                <li><a href="{{route('about')}}">About Us</a></li>
                                                <li><a href="{{route('term-condition')}}">Term & Condition</a></li>
                                                <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                                            </ul>
                                        </li>
                                        <li><a>Profile</a>
                                            <ul class="single">

                                                @if(auth()->check())
                                                    <li><a href="{{route('my-profile')}}">My Profile</a></li>
                                                    <li><a href="{{route('portfolio')}}">Portfolio</a></li>
                                                    <li><a href="{{route('my-wallet')}}">My Wallet</a></li>
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                @else
                                                    <li><a href="{{ route('login') }}" >Login</a></li>
                                                    <li><a href="{{ route('register') }}" >Register</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--[ MOBILE-MENU-AREA END  ]-->
    </nav>

</header>