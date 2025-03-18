 <div class="vs-menu-wrapper ">
    <div class="vs-menu-area text-center">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ url('/') }}"><img src="{{ asset('template/assets/img/emco.png') }}" alt="EmcoToys"></a>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li>
                    <a class="{{ $type_menu == 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li>
                    <a class="{{ $type_menu == 'about-us' ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <li>
                    <a class="{{ $type_menu == 'shop' ? 'active' : '' }}" href="{{ route(name: 'shop') }}">Product</a>
                </li>
                <li>
                    <a class="{{ $type_menu == 'account' ? 'active' : '' }}" href="{{ route(name: 'profile') }}">Profile</a>
                </li>
                <li>
                    <a class="{{ $type_menu == 'contact' ? 'active' : '' }}" href="{{ route(name: 'contact') }}">Contact Us</a>
                </li>
                @if (auth()->check())
                    <li>
                        <a class="" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                        <form id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            style="display: none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li>
                        <a class="" href="{{ route('profile') }}">Login/ Register</a>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</div>
<header class="vs-header header-layout1 color-custom-pink">
    <div class="sticky-wrap">
        <div class="sticky-active">
            <div class="container">
                <div class="row gx-3 align-items-center justify-content-between">
                    <div class="col col-sm-auto">
                        <div class="header-logo">
                            <a href="/">
                                <img src="{{ asset('template/assets/img/emco.png') }}" style="height: 50px" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto text-end text-lg-center">
                        <nav class="main-menu menu-style1 d-none d-lg-block">
                            <ul>
                                <li><a href="{{ route('index') }}" class="py-0 {{ $type_menu == 'home' ? 'active' : '' }}">HOME</a></li>
                                <li><a href="{{ route('about') }}" class="py-0 {{ $type_menu == 'about-us' ? 'active' : '' }}">ABOUT US</a></li>
                                <li><a href="{{ route('shop') }}" class="py-0 {{ $type_menu == 'shop' ? 'active' : '' }}">PRODUCT</a></li>
                                <li><a href="{{ route('article') }}" class="py-0 {{ $type_menu == 'article' ? 'active' : '' }}">ARTICLE</a></li>
                                <li><a href="{{ route('contact') }}" class="py-0 {{ $type_menu == 'contact' ? 'active' : '' }}">CONTACT US</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col">
                        <div class="row align-items-center justify-content-end gx-3">
                            <div class="col-auto">
                                <button class="circle-icon d-inline-block" onclick="window.location.href='/cart'"><i class="far fa-shopping-cart"></i></button>
                            </div>
                            <div class="col-auto d-block d-lg-none">
                                <button class="vs-menu-toggle d-inline-block"><i class="fal fa-bars"></i></button>
                            </div>
                            @if (auth()->check())
                                <div class="col-auto d-none d-lg-block d-md-none">
                                    <a href="{{ route('profile') }}" class="vs-btn ">Profile</a>
                                </div>
                            @else
                                <div class="col-auto d-none d-lg-block d-md-none">
                                    <a href="{{ route('profile') }}" class="vs-btn ">Login/ Register</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
