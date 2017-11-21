
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
                            <a href="{{route('index')}}" >Beranda </a>
                        </li>

                        <li>
                            <span>Investasi </span>
                            <ul class="submenu">
                                <li><a href="{{route('project-list')}}">Daftar Investasi</a></li>
                                {{--<li><a href="{{route('secondary-market')}}">Secondary Market</a></li>--}}
                            </ul>
                        </li>
                        <li>
                            <span>Tentang</span>
                            <ul class="submenu">
                                <li><a href="{{route('about')}}">Tentang Kami</a></li>
                                <li><a href="{{route('term-condition')}}">Syarat & Ketentuan</a></li>
                                <li><a href="{{route('privacy-policy')}}">Kebijakan Privasi</a></li>
                                <li><a href="{{route('contact')}}">Hubungi Kami</a></li>
                                <li><a href="{{route('pengajuan')}}">Jadilah Partner Kami</a></li>
                            </ul>
                        </li>
                        <li>
                            @if(auth()->check())
                            <span>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                                <ul class="submenu">
                                <li><a href="{{route('my-profile', ['tab' => 'profile'])}}">Profil Saya</a></li>
                                <li><a href="{{route('portfolio')}}">Portfolio</a></li>
                                <li><a href="{{route('my-wallet')}}">Dompet</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                            @else
                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                <ul class="submenu">
                                <li><a href="{{ route('login') }}" >Login</a></li>
                                <li><a href="{{ route('register') }}" >Register</a></li>
                            </ul>
                            @endif
                        </li>
                    </ul>
                </div>
                {{--<div class="col-md-1 col-xs-6">--}}
                    {{--<div id="search-toggle">--}}
                        {{--<i class="fa fa-search"></i>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>

        <!--[ MOBILE-MENU-AREA START ]-->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    @if(!(auth()->check()))
                        <a href="{{ route('login') }}">
                            <button class="btn btn-solid" style="margin-top:10%;z-index:99999999999!important;">
                                Login
                            </button>
                        </a>
                    @endif
                    <div class="col-md-12 col-sm-12">
                        <div class="mobile-area">
                            <div class="mobile-menu">
                                <nav id="mobile-nav">
                                    <ul>
                                        <li><a href="{{route('index')}}">Beranda </a></li>
                                        <li><a>Investasi </a>
                                            <ul>
                                                <li><a href="{{route('project-list')}}">Daftar Investasi</a></li>
                                                {{--<li><a href="{{route('secondary-market')}}">Secondary Market</a></li>--}}
                                            </ul>
                                        </li>
                                        <li><a>Tentang</a>
                                            <ul>
                                                <li><a href="{{route('about')}}">Tentang Kami</a></li>
                                                <li><a href="{{route('term-condition')}}">Syarat & Ketentuan</a></li>
                                                <li><a href="{{route('privacy-policy')}}">Kebijakan Privasi</a></li>
                                                <li><a href="{{route('contact')}}">Hubungi Kami</a></li>
                                                <li><a href="{{route('pengajuan')}}">Jadilah Partner Kami</a></li>
                                            </ul>
                                        </li>
                                        <li><a>Profil</a>
                                            <ul class="single">

                                                @if(auth()->check())
                                                    <li><a href="{{route('my-profile', ['tab' => 'profile'])}}">Profil Saya</a></li>
                                                    <li><a href="{{route('portfolio')}}">Portfolio</a></li>
                                                    <li><a href="{{route('my-wallet')}}">Dompet</a></li>
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