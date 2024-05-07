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
                    <a href="{{ route('home') }}" class="brand-image">
                        <img src="{{ asset('assets/web/image/logo/sakoon125tran.png') }}" alt="">
                    </a>
                </div>
            </div>
            <!-- Category With Search -->
            <div class="col-lg-5 col-md-7 order-3 order-md-2">
                <form class="category-widget" method="get" action="{{ route('product.index') }}">
                    <input type="text" name="search" placeholder="Search products">
                    <div class="search-form__group search-form__group--select">
                        <select name="category" id="searchCategory" class="search-form__select nice-select">
                            <option value="">All Categories</option>
                            @foreach(categoriesList() as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
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
                                +92-333-8662076
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
                            @auth
                                <a href="{{ route('user.profile') }}">
                                    <i class="fas fa-user"></i> {{ auth()->user()->name }}
                                </a>
                            @else
                                <a href="{{ route('web.showLoginForm') }}">
                                    <i class="fas fa-user"></i> Register or Sign in
                                </a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>