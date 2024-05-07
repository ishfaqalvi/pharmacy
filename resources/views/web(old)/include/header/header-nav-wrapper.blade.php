<div class="container">
    <div class="header-bottom-inner">
        <div class="row g-0">
            <!-- Category Nav -->
            <div class="col-lg-3 col-md-8">
                <!-- Category Nav Start -->
                <div class="category-nav-wrapper bg-blue">
                    <div class="category-nav">
                        <h2 class="category-nav__title primary-bg" id="js-cat-nav-title">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </h2>
                        <ul class="category-nav__menu" id="js-cat-nav">
                            @foreach(categoriesList() as $category)
                            @php($sub = $category->sub)
                            <li class="category-nav__menu__item {{count($sub) > 0 ? 'has-children' : ''}}">
                                <a href="{{ route('product.index', ['category' => $category->name ])}}">{{ $category->name }}</a>
                                @if(count($sub) > 0)
                                <div class="category-nav__submenu">
                                    <div class="category-nav__submenu--inner">
                                        <ul>
                                        @foreach($sub as $subCategory)
                                            <li><a href="{{ route('product.index', ['sub_category' => $subCategory->name ])}}">{{ $subCategory->name }}</a></li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </li>
                            @endforeach
                            <li class="category-nav__menu__item">
                                <a href="shop.html" class="js-expand-hidden-menu"> More Categories</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Category Nav End -->
                <div class="category-mobile-menu"></div>
            </div>
            <!-- Main Menu -->
            <div class="col-lg-7 d-none d-lg-block">
                <nav class="main-navigation">
                    <!-- Mainmenu Start -->
                    <ul class="mainmenu">
                        <li class="mainmenu__item">
                            <a href="{{ route('home') }}" class="mainmenu__link">
                                Home
                            </a>
                        </li>
                        <li class="mainmenu__item">
                            <a href="{{ route('product.index') }}" class="mainmenu__link">
                                Products
                            </a>
                        </li>
                        <li class="mainmenu__item">
                            <a href="#" class="mainmenu__link">About Us</a>
                        </li>
                        <!-- <li class="mainmenu__item">
                            <a href="#" class="mainmenu__link">Contact</a>
                        </li> -->
                        <li class="mainmenu__item">
                            <a href="{{ route('wishlist.index')}}" class="mainmenu__link">
                                Wishlist
                            </a>
                        </li>
                        <li class="mainmenu__item">
                            <a href="{{ route('user.profile') }}" class="mainmenu__link">
                                My Account
                            </a>
                        </li>
                    </ul>
                    <!-- Mainmenu End -->
                </nav>
            </div>
            <!-- Cart block-->
            <div class="col-lg-2 col-6 offset-6 offset-md-0 col-md-3 order-3">
                <div class="cart-widget-wrapper slide-down-wrapper">
                    @include('web.include.product.cart')
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12 d-flex d-lg-none order-2 mobile-absolute-menu">
                <!-- Main Mobile Menu Start -->
                <div class="mobile-menu"></div>
                <!-- Main Mobile Menu End -->
            </div>
        </div>
    </div>
    <div class="row">
    </div>
</div>
<div class="fixed-header sticky-init">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <!-- Sticky Logo Start -->
                <a class="sticky-logo" href="{{ route('home') }}">
                    <img src="{{ asset('assets/web/image/logo/sakoon125tran.png') }}" alt="logo">
                </a>
                <!-- Sticky Logo End -->
            </div>
            <div class="col-lg-9">
                <!-- Sticky Mainmenu Start -->
                <nav class="sticky-navigation">
                    <ul class="mainmenu sticky-menu">
                        <li class="mainmenu__item">
                            <a href="{{ route('home') }}" class="mainmenu__link">
                                Home
                            </a>
                        </li>
                        <li class="mainmenu__item">
                            <a href="{{ route('product.index') }}" class="mainmenu__link">
                                Products
                            </a>
                        </li>
                        <li class="mainmenu__item">
                            <a href="#" class="mainmenu__link">About Us</a>
                        </li>
                        <!-- <li class="mainmenu__item">
                            <a href="#" class="mainmenu__link">Contact</a>
                        </li> -->
                        <li class="mainmenu__item">
                            <a href="{{ route('wishlist.index')}}" class="mainmenu__link">
                                Wishlist
                            </a>
                        </li>
                        <li class="mainmenu__item">
                            <a href="{{ route('user.profile') }}" class="mainmenu__link">
                                My Account
                            </a>
                        </li>
                    </ul>
                    <div class="sticky-mobile-menu  d-lg-none">
                        <span class="sticky-menu-btn"></span>
                    </div>
                </nav>
                <!-- Sticky Mainmenu End -->
            </div>
        </div>
    </div>
</div>