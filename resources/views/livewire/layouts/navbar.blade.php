<div>
    <!-- HEADER AREA START (header-3) -->
    <header class="ltn__header-area ltn__header-3">
        <!-- ltn__header-top-area start -->
        {{-- <div class="ltn__header-top-area border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-bar-right text-right text-end">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li>
                                        <!-- ltn__language-menu -->
                                        <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                            <ul>
                                                <li><a href="#" class="dropdown-toggle"><span
                                                            class="active-currency">English</span></a>
                                                    <ul>
                                                        <li><a href="#">Arabic</a></li>
                                                        <li><a href="#">English</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- ltn__header-top-area end -->
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo">
                            <a wire:navigate href="{{ route('home') }}"><img src="{{ asset('client/img/logo.png') }}"
                                    alt="Logo" class="img-fluid w-25"></a>
                            <span style="padding-left: 10px; font-size: 25px; color: #4184c5;">Epharmacy</span>
                        </div>
                    </div>
                    <div class="col header-contact-serarch-column d-none d-lg-block">
                        <div class="header-contact-search">
                            <!-- header-feature-item -->
                            <div class="header-feature-item">
                                <div class="header-feature-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="header-feature-info">
                                    <h6>Phone</h6>
                                    <p><a href="tel:0123456789">774743134</a></p>
                                </div>
                            </div>
                            <!-- header-search-2 -->
                            <div class="header-search-2">
                                <form id="#123" method="get" action="#">
                                    <input type="text" name="search" value="" placeholder="Search here..." />
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- header-options -->
                        <div class="ltn__header-options">
                            <ul>
                                <li class="d-lg-none">
                                    <!-- header-search-1 -->
                                    <div class="header-search-wrap">
                                        <div class="header-search-1">
                                            <div class="search-icon">
                                                <i class="icon-search  for-search-show"></i>
                                                <i class="icon-cancel  for-search-close"></i>
                                            </div>
                                        </div>
                                        <div class="header-search-1-form">
                                            <form id="#" method="get" action="#">
                                                <input type="text" name="search" value=""
                                                    placeholder="Search here..." />
                                                <button type="submit">
                                                    <span><i class="icon-search"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-none---">
                                    <!-- user-menu -->
                                    <div class="ltn__drop-menu user-menu">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="icon-user"></i></a>
                                                <ul>
                                                    @if (Auth::check())
                                                        <li>
                                                            <a wire:navigate href="{{ route('profile') }}">My
                                                                Account</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}">Logout</a>
                                                        </li>
                                                    @else
                                                        <li><a href="{{ url('/login') }}">Sign in</a></li>
                                                        <li><a href="{{ url('/register') }}">Register</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @if (Auth::check())
                                    {{-- <li>
                                        <!-- mini-cart 2 -->
                                        <div class="mini-cart-icon mini-cart-icon-2">
                                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                                <span class="mini-cart-icon">
                                                    <i class="icon-shopping-cart"></i>
                                                    <sup>{{$totalCount}}</sup>
                                                </span>
                                                <h6><span>Your Cart</span> <span
                                                        class="ltn__secondary-color">${{$grandTotal}}</span>
                                                </h6>
                                            </a>
                                        </div>
                                    </li> --}}
                                    <li>
                                        <!-- mini-cart 2 -->
                                        <div class="mini-cart-icon mini-cart-icon-2">
                                            <a wire:navigate href="{{ route('cart') }}" class="ltn__utilize-toggle">
                                                <span class="mini-cart-icon">
                                                    <i class="icon-shopping-cart"></i>
                                                    <sup>{{ $totalCount }}</sup>
                                                </span>
                                                <h6><span>Your Cart</span> <span
                                                        class="ltn__secondary-color">${{ $grandTotal }}</span>
                                                </h6>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
        <!-- header-bottom-area start -->
        <div
            class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white--- ltn__sticky-bg-secondary ltn__secondary-bg section-bg-1 menu-color-white d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col header-menu-column justify-content-center">
                        <div class="sticky-logo">
                            <div class="site-logo">
                                <a wire:navigate href="{{ route('home') }}"><img
                                        src="{{ asset('client/img/logo.png') }}" alt="Logo"
                                        class="img-fluid w-25"></a>
                            </div>
                        </div>
                        <div class="header-menu header-menu-2">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li>
                                            <a wire:navigate href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li>
                                            <a wire:navigate href="{{ route('categories') }}">Categories</a>
                                        </li>
                                        <li>
                                            <a wire:navigate href="{{ route('shop') }}">Shop</a>
                                        </li>
                                        <li>
                                            <a wire:navigate href="{{ route('articleGrid') }}">Articles</a>
                                        </li>
                                        <li>
                                            <a wire:navigate href="{{ route('about') }}">About</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-bottom-area end -->
    </header>
    <!-- HEADER AREA END -->

    <!-- MOBILE MENU START -->
    <div class="mobile-header-menu-fullwidth mb-30 d-block d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-lg-none">
                        <span>MENU</span>
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MOBILE MENU END -->

    <!-- Utilize Cart Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar">
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a wire:navigate href="#"><img src="{{ asset('client/img/product/1.png') }}"
                                alt="Image" /></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a wire:navigate href="#">Antiseptic Spray</a></h6>
                        <span class="mini-cart-quantity">1 x $65.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a wire:navigate href="#"><img src="{{ asset('client/img/product/2.png') }}"
                                alt="Image" /></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a wire:navigate href="#">Digital Stethoscope</a></h6>
                        <span class="mini-cart-quantity">1 x $85.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a wire:navigate href="#"><img src="{{ asset('client/img/product/3.png') }}"
                                alt="Image" /></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a wire:navigate href="#">Cosmetic Containers</a></h6>
                        <span class="mini-cart-quantity">1 x $92.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a wire:navigate href="#"><img src="{{ asset('client/img/product/4.png') }}"
                                alt="Image" /></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a wire:navigate href="#">Thermometer Gun</a></h6>
                        <span class="mini-cart-quantity">1 x $68.00</span>
                    </div>
                </div>
            </div>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span>$310.00</span></h5>
                </div>
                <div class="btn-wrapper">
                    <a wire:navigate href="{{ route('cart') }}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a wire:navigate href="{{ route('checkout') }}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over $100!</p>
            </div>
        </div>
    </div>
    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a wire:navigate href="{{ route('home') }}"><img src="{{ asset('client/img/logo.png') }}"
                            alt="Logo" class="img-fluid w-25" /></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search..." />
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li>
                        <a wire:navigate href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('categories') }}">Categories</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('articleGrid') }}">Articles</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('about') }}">About</a>
                    </li>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    @if (Auth::check())
                        <li>
                            <a wire:navigate href="{{ route('profile') }}" title="My Account">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-user"></i>
                                </span>
                                My Account
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('cart') }}" title="Shoping Cart">
                                <span class="utilize-btn-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    <sup>{{ $totalCount }}</sup>
                                </span>
                                Shoping Cart
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li>
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>
</div>
