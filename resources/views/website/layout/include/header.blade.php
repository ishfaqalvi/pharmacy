<div class="btn-primary pt-2 pb-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="shop.html" class="mb-0 text-white">
                    40% CASHBACK FOR NEW USERS | CODE:
                    <strong>
                        <span class="text-light">GURDEEPOSAHAN40 <span class="mdi mdi-tag-faces"></span></span>
                    </strong>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="bg-light">
    <div class="header-top border-bottom bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item border-right border-left py-1 pr-2 mr-2 pl-2">
                            <a href=""><i class="icofont icofont-iphone"></i> +92-333-8662076</a>
                        </li>
                        <li class="list-inline-item border-right py-1 pr-2 mr-2">
                            <a href="contact-us.html"><i class="icofont icofont-headphone-alt"></i> Contact Us</a>
                        </li>
                        <li class="list-inline-item">
                            <span>Download App</span> &nbsp;
                            <a href="#"><i class="icofont icofont-brand-windows"></i></a>
                            <a href="#"><i class="icofont icofont-brand-apple"></i></a>
                            <a href="#"><i class="icofont icofont-brand-android-robot"></i></a>
                        </li>
                    </ul>
                    <p class="mb-0 py-1">FREE CASH ON DELIVERY &amp; SHIPPING AVAILABLE OVER <span class="text-danger font-weight-bold">$499</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-white pt-0 pb-0">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset(settings('website_logo')) }}" alt="Sakoon Pharmacy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto main-nav-left">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><i class="icofont-ui-home"></i></a>
                        </li>
                        <li class="nav-item dropdown mega-drop-main">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CATEGORIES
                            </a>
                            <div class="dropdown-menu mega-drop  shadow-sm border-0" aria-labelledby="navbarDropdown">
                                <div class="row ml-0 mr-0">
                                    @foreach(categoriesList() as $category)
                                    <div class="col-lg-2 col-md-2">
                                        <div class="mega-list">
                                            <a class="mega-title" href="{{ route('product.index',['category' => $category->id]) }}">{{ $category->name }}</a>
                                            @foreach ($category->sub as $row)
                                                <a href="{{ route('product.index',['sub_category' => $row->id]) }}">{{ $row->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                BRANDS
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                @foreach (brandsList() as $brand)
                                    <a class="dropdown-item" href="{{ route('product.index',['brand' => $brand->id]) }}">{{ $brand->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">PRODUCTS</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 top-search" action="{{ route('product.index') }}">
                        <button class="btn-link" type="submit"><i class="icofont-search"></i></button>
                        <input class="form-control mr-sm-2" type="search" placeholder="Search for products, brands and more" aria-label="Search" name="search">
                    </form>
                    <ul class="navbar-nav ml-auto profile-nav-right">
                        <li class="nav-item">
                            <a href="#" data-target="#login" data-toggle="modal" class="nav-link ml-0">
                                <i class="icofont-ui-user"></i> Login/Sign Up
                            </a>
                        </li>
                        <li class="nav-item cart-nav">
                            <a data-toggle="offcanvas" class="nav-link" href="#">
                                <i class="icofont-basket"></i> Cart
                                <span class="badge badge-danger">5</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('banner')
</div>
