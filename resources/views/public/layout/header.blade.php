<div class="header-wrapper">
    <!-- Site Wrapper Starts -->
    <div class="header-top bg-ash">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 text-center text-sm-start">
                    <p class="font-weight-300">Welcome to Sakoon Pharmacy</p>
                </div>
                <div class="col-sm-6">
                    <div class="header-top-nav right-nav">
                        <div class="nav-item slide-down-wrapper">
                            <span>Language:</span>
                            <a class="slide-down--btn" href="#" role="button">
                                English<i class="ion-ios-arrow-down"></i>
                            </a>
                            <ul class="dropdown-list slide-down--item">
                                <li><a href="#">En</a></li>
                                <li><a href="#">En</a></li>
                            </ul>
                        </div>
                        <div class="nav-item slide-down-wrapper">
                            <span>Currency:</span>
                            <a class="slide-down--btn" href="#" role="button">
                                USD<i class="ion-ios-arrow-down"></i>
                            </a>
                            <ul class="dropdown-list slide-down--item">
                                <li><a href="#">EUR</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Template Logo -->
                <div class="col-lg-3 col-md-12 col-sm-4">
                    <div class="site-brand  text-center text-lg-start">
                        <a href="index.html" class="brand-image">
                            <img src="{{ asset('assets/web/image/main-logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- Category With Search -->
                <div class="col-lg-5 col-md-7 order-3 order-md-2">
                    <form class="category-widget">
                        <input type="text" name="search" placeholder="Search products ">
                        <div class="search-form__group search-form__group--select">
                            <select name="category" id="searchCategory" class="search-form__select nice-select">
                                <option value="all">All Categories</option>
                                @foreach($categories as $category)
                                <option value="3">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="search-submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <!-- Call Login & Track of Order -->
                <div class="col-lg-4 col-md-5 col-sm-8 order-2 order-md-3">
                    <div class="header-widget-2 text-center text-sm-end ">
                        <div class="call-widget">
                            <p>
                                CALL US NOW: 
                                <i class="icon ion-ios-telephone"></i>
                                <span class="font-weight-mid">
                                    +91-012 345 678
                                </span>
                            </p>
                        </div>
                        <ul class="header-links">
                            <li>
                                <a href="cart.html">
                                    <i class="fas fa-car-alt"></i> Track Your Order
                                </a>
                            </li>
                            <li>
                                <a href="login-register.html">
                                    <i class="fas fa-user"></i> Register or Sign in
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-nav-wrapper">
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
                                @foreach($categories as $category)
                                @php($sub = $category->sub)
                                <li class="category-nav__menu__item {{count($sub) > 0 ? 'has-children' : ''}}">
                                    <a href="#">{{ $category->name }}</a>
                                    @if(count($sub) > 0)
                                    <div class="category-nav__submenu">
                                        <div class="category-nav__submenu--inner">
                                            <ul>
                                                @foreach($sub as $subCategory)
                                                <li><a href="#">{{ $subCategory->name }}</a></li>
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
                                <a href="#" class="mainmenu__link">Home</a>
                            </li>
                            <li class="mainmenu__item">
                                <a href="#" class="mainmenu__link">About Us</a>
                            </li>
                            <li class="mainmenu__item">
                                <a href="#" class="mainmenu__link">Contact</a>
                            </li>
                            <li class="mainmenu__item">
                                <a href="#" class="mainmenu__link">My Account</a>
                            </li>
                        </ul>
                        <!-- Mainmenu End -->
                    </nav>
                </div>
                <!-- Cart block-->
                <div class="col-lg-2 col-6 offset-6 offset-md-0 col-md-3 order-3">
                    <div class="cart-widget-wrapper slide-down-wrapper">
                        <div class="cart-widget slide-down--btn">
                            <div class="cart-icon">
                                <i class="ion-bag"></i>
                                <span class="cart-count-badge">
                                    1
                                </span>
                            </div>
                            <div class="cart-text">
                                <span class="d-block">Your cart</span>
                                <strong>
                                    <span class="amount"><span class="currencySymbol">$</span>40.00</span>
                                </strong>
                            </div>
                        </div>
                        <div class="slide-down--item ">
                            <div class="cart-widget-box">
                                <ul class="cart-items">
                                    <li class="single-cart">
                                        <a href="#" class="cart-product">
                                            <div class="cart-product-img">
                                                <img src="{{ asset('assets/web/image/product/cart-product.jpg') }}" alt="Selected Products">
                                            </div>
                                            <div class="product-details">
                                                <h4 class="product-details--title"> Ras Neque Metus</h4>
                                                <span class="product-details--price">1 x $120.00</span>
                                            </div>
                                            <span class="cart-cross">x</span>
                                        </a>
                                    </li>
                                    <li class="single-cart">
                                        <div class="cart-product__subtotal">
                                            <span class="subtotal--title">Subtotal</span>
                                            <span class="subtotal--price">$200</span>
                                        </div>
                                    </li>
                                    <li class="single-cart">
                                        <div class="cart-buttons">
                                            <a href="cart.html" class="btn btn-outlined">View Cart</a>
                                            <a href="checkout.html" class="btn btn-outlined">Check Out</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                    <a class="sticky-logo" href="index.html">
                        <img src="{{ asset('assets/web/image/main-logo.png') }}" alt="logo">
                    </a>
                    <!-- Sticky Logo End -->
                </div>
                <div class="col-lg-9">
                    <!-- Sticky Mainmenu Start -->
                    <nav class="sticky-navigation">
                        <ul class="mainmenu sticky-menu">
                            <li class="mainmenu__item">
                                <a href="#" class="mainmenu__link">Home</a>
                            </li>
                            <li class="mainmenu__item">
                                <a href="#" class="mainmenu__link">About Us</a>
                            </li>
                            <li class="mainmenu__item">
                                <a href="#" class="mainmenu__link">Contact</a>
                            </li>
                            <li class="mainmenu__item">
                                <a href="#" class="mainmenu__link">My Account</a>
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
</div>