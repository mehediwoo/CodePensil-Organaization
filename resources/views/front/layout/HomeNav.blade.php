@php
    $route = Route::current()->getName();
@endphp
<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ route('home') }}" class="logo__black">
                                   <img src="{{ asset('storage/'.$setting->logo) }}" alt="">
                                </a>
                                <a href="{{ route('home') }}" class="logo__white">
                                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="">
                                </a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="{{ $route == 'home' ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>

                                    <li class="{{ $route == 'about' ? 'active' : '' }}">
                                        <a href="{{ route('about') }}">About</a>
                                    </li>

                                    {{-- <li>
                                        <a href="services-details.html">Services</a>
                                    </li> --}}

                                    {{-- <li class="menu-item-has-children">
                                        <a href="#">Portfolio</a>
                                        <ul class="sub-menu">
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        </ul>
                                    </li> --}}

                                    {{-- <li class="menu-item-has-children"><a href="#">Our Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Our News</a></li>
                                            <li><a href="blog-details.html">News Details</a></li>
                                        </ul>
                                    </li> --}}
                                    <li class="{{ $route =='contact' ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}">contact me</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('contact') }}" class="btn">Contact me</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ route('home') }}" class="logo__black"><img src="assets/img/logo/logo_black.png" alt=""></a>
                                <a href="{{ route('home') }}" class="logo__white"><img src="assets/img/logo/logo_white.png" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="{{ $setting->facebook_url }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $setting->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $setting->linkedIn_url }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $setting->instagram_url }}"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
