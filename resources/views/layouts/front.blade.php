<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('webasset/assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('webasset/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('webasset/assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('webasset/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('webasset/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('webasset/assets/css/main.css') }}" />

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        h1,h2,h3,h4,h5,h6,li,p,a,span{
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                <li>
                                    <div class="select-position">
                                        {{-- <form action="{{ currency.store() }}" method="post"></form> --}}
                                        <select id="select4" name="currency_name" onchange="this.form.submit()">
                                            <option value="0" selected>$ USD</option>
                                            <option value="1">€ EURO</option>
                                        </select>
                                    </div>
                                </li>
                                <li>

                                    <ul>
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a style="color: #fff" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                <li><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
                                <li><a href="{{ route('product.index') }}">{{ __('Shop') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <a href="{{ route('login') }}">
                                    <i class="lni lni-user"></i>
                                    <span style="color: #fff;">{{ __('Hello') }}</span> @auth
                                    <span style="color: #0167F3;">{{ Auth::user()->name }}</span>
                                    @endauth
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('webasset/logoo.png') }}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <form action="{{ route('product.index') }}" method="get">
                                <div class="navbar-search search-style-5">
                                    <div class="search-input">
                                        <input type="text" placeholder="Search product..." autocomplete="off"
                                        id="search-options" value="{{ request('name') }}" name="name">
                                    </div>
                                    <div class="search-btn">
                                        <button type="submit"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                            </form>

                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <span>(+100) 123 456 7890</span>
                            </div>
                            <div class="navbar-cart">
                                <x-cart-menu/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>{{ __('All Categories') }}</span>
                            <ul class="sub-category">
                                @php
                                    $categories = App\Models\Category::orderBy('created_at','DESC')->get();
                                @endphp
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" aria-label="Toggle navigation"  class="nav-item {{ request()->routeIs('home') ? 'active':'' }}">{{__('Home') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('category.index') }}" aria-label="Toggle navigation"  class="nav-item {{ request()->routeIs('category.index') ? 'active':'' }}">{{__('Categories') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('product.index') }}" aria-label="Toggle navigation"  class="nav-item {{ request()->routeIs('product.index') ? 'active':'' }}">{{__('Shop') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('about') }}" aria-label="Toggle navigation" class="nav-item {{ request()->routeIs('about') ? 'active':'' }}">{{__('About Us') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('cart.index') }}" aria-label="Toggle navigation" class="nav-item {{ request()->routeIs('cart.index') ? 'active':'' }}">{{__('Cart') }}</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">{{ __('Follow Us') }}:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->

    <!-- Start Breadcrumbs -->
    {{ $breadcrumb ?? '' }}
    <!-- End Breadcrumbs -->


    {{ $slot }}

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->

        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Phone: +1 (900) 33 169 7720</p>
                                <ul>
                                    <li><span>Monday-Friday: </span> All Time</li>
                                    <li><span>Saturday: </span> All Time</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:support@shopgrids.com">support@shopgrids.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        {{-- <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div> --}}
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('product.index') }}">Shop</a></li>
                                    <li><a href="{{ route('category.index') }}">Categories</a></li>
                                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    @php
                                    $categoryy = App\Models\Category::orderBy('created_at','DESC')->take(5)->get();
                                    @endphp
                                    @foreach ($categoryy as $category)
                                        <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="{{ asset('webasset/assets/images/footer/credit-cards-footer.png') }}" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by<a href="https://linktr.ee/basel_khraish" rel="nofollow"
                                        target="_blank">Basel Khraish</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('webasset/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('webasset/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('webasset/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('webasset/assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
