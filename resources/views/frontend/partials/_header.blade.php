
<!-- header -->
<header>
    <nav class="navigation" style="background:black !important;">
        <div class="container" >
            <div class="row">
                @if(auth()->check())
                    <a style="color:white;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    {{--<a style="color:white;" href="{{ route('login') }}" >Login</a>--}}
                    <a style="color:white;cursor:pointer;" data-toggle="modal" data-target="#loginModalPopup">Login</a>
                    &nbsp;&nbsp;
                    <a style="color:white;" href="{{ route('register') }}" >Register</a>
                @endif
            </div>
        </div>
    </nav>
    <nav  class="navigation">
        <div class="container">
            <div class="row">
                <div class="logo-wrap col-md-3 col-xs-6">
                    <a href="{{route('index')}}"><img src="{{ URL::asset('frontend_images/logo-white.png') }}" class="top_logo"></a>
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
                                <li><a href="{{route('project-list', ['tab' => 'debt'])}}">Daftar Investasi</a></li>
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
                        {{--<li>--}}
                            {{--@if(auth()->check())--}}
                            {{--<span>--}}
                                {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                            {{--</span>--}}
                                {{--<ul class="submenu">--}}
                                {{--<li><a href="{{route('my-profile', ['tab' => 'profile'])}}">Profil Saya</a></li>--}}
                                {{--<li><a href="{{route('portfolio', ['tab' => 'pending'])}}">Portfolio</a></li>--}}
                                {{--<li><a href="{{route('my-wallet')}}">Dompet</a></li>--}}
                                {{--<li>--}}
                                    {{--<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                                        {{--Logout--}}
                                    {{--</a>--}}
                                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                        {{--{{ csrf_field() }}--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--@else--}}
                            {{--<span><i class="fa fa-user" aria-hidden="true"></i></span>--}}
                                {{--<ul class="submenu">--}}
                                {{--<li><a href="{{ route('login') }}" >Login</a></li>--}}
                                {{--<li><a href="{{ route('register') }}" >Register</a></li>--}}
                            {{--</ul>--}}
                            {{--@endif--}}
                        {{--</li>--}}
                    </ul>
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
                                        <li><a href="{{route('index')}}">Beranda </a></li>
                                        <li><a>Investasi </a>
                                            <ul>
                                                <li><a href="{{route('project-list', ['tab' => 'debt'])}}">Daftar Investasi</a></li>
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
                                        {{--<li><a>Profil</a>--}}
                                            {{--<ul class="single">--}}

                                                {{--@if(auth()->check())--}}
                                                    {{--<li><a href="{{route('my-profile', ['tab' => 'profile'])}}">Profil Saya</a></li>--}}
                                                    {{--<li><a href="{{route('portfolio', ['tab' => 'pending'])}}">Portfolio</a></li>--}}
                                                    {{--<li><a href="{{route('my-wallet')}}">Dompet</a></li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                                                            {{--Logout--}}
                                                        {{--</a>--}}
                                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                                            {{--{{ csrf_field() }}--}}
                                                        {{--</form>--}}
                                                    {{--</li>--}}
                                                {{--@else--}}
                                                    {{--<li><a href="{{ route('login') }}" >Login</a></li>--}}
                                                    {{--<li><a href="{{ route('register') }}" >Register</a></li>--}}
                                                {{--@endif--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
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
@include('frontend.partials._modal-login')