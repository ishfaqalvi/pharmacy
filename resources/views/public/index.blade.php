@extends('public.layout.app')

@section('content')
<section>
    <div class=" petmark-slick-slider  home-slider dot-position-1" data-slick-setting='{
        "autoplay": true,
        "autoplaySpeed": 8000,
        "slidesToShow": 1,
        "dots": true
    }'
    >
        @foreach($sliders as $slider)
        <div class="single-slider home-content bg-image" data-bg="{{ $slider->image }}">
            <!-- <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Delicious bites <br> with benifits</h2>
                        <h4 class="mt--30">100% made in U.S.A chicken breast jerky</h4>
                        <div class="slider-btn mt--30">
                            <a href="shop.html" class="btn btn-outlined--primary btn-rounded">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <span class="herobanner-progress"></span>
        </div>
        @endforeach
    </div>
</section>
<div class="container pt--50">
    <div class="policy-block border-four-column">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-truck"></span>
                    </div>
                    <div class="text">
                        <h3>Free Delivery</h3>
                        <p>On orders of $200+</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-credit-card"></span>
                    </div>
                    <div class="text">
                        <h3>Cod</h3>
                        <p>Cash on Delivery</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-gift"></span>
                    </div>
                    <div class="text">
                        <h3>Free Gift Box</h3>
                        <p>Buy a Gift</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block-single">
                    <div class="icon">
                        <span class="ti-headphone-alt"></span>
                    </div>
                    <div class="text">
                        <h3>Free Support 24/7</h3>
                        <p>Online 24hrs a Day</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category Section -->
<section class="category-section pt--50">
    <div class="container">
        <div class="block-title">
            <h2>TOP CATEGORIES</h2>
        </div>
        <div class="category-block">
            <div class="row g-0">
                @foreach($categories as $category)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-block-single">
                        <a href="#" class="icon">
                            <img src="{{ $category->logo }}" alt="">
                        </a>
                        <h3><a href="#">{{ $category->name }}</a></h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="pm-product-details">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close">

                </button>
                <div class="row">
                    <!-- Blog Details Image Block -->
                    <div class="col-md-6">
                        <div class="image-block">
                            <!-- Zoomable IMage -->
                            <img id="zoom_03" src="{{ asset('assets/web/image/product/product-details/product-details-1.jpg') }}"
                                 data-zoom-image="{{ asset('assets/web/image/product/product-details/product-details-1.jpg') }}" alt=""/>

                            <!-- Product Gallery with Slick Slider -->
                            <div id="product-view-gallery" class="elevate-gallery">
                                <!-- Slick Single -->
                                <a href="#" class="gallary-item"
                                   data-image="{{ asset('assets/web/image/product/product-details/product-details-1.jpg') }}"
                                   data-zoom-image="{{ asset('assets/web/image/product/product-details/product-details-1.jpg') }}">
                                    <img src="{{ asset('assets/web/image/product/product-details/product-details-1.jpg') }}" alt=""/>
                                </a>
                                <!-- Slick Single -->
                                <a href="#" class="gallary-item"
                                   data-image="{{ asset('assets/web/image/product/product-details/product-details-2.jpg') }}"
                                   data-zoom-image="{{ asset('assets/web/image/product/product-details/product-details-2.jpg') }}">
                                    <img src="{{ asset('assets/web/image/product/product-details/product-details-2.jpg') }}" alt=""/>
                                </a>
                                <!-- Slick Single -->
                                <a href="#" class="gallary-item"
                                   data-image="{{ asset('assets/web/image/product/product-details/product-details-3.jpg') }}"
                                   data-zoom-image="{{ asset('assets/web/image/product/product-details/product-details-3.jpg') }}">
                                    <img src="{{ asset('assets/web/image/product/product-details/product-details-3.jpg') }}" alt=""/>
                                </a>
                                <!-- Slick Single -->
                                <a href="#" class="gallary-item"
                                   data-image="{{ asset('assets/web/image/product/product-details/product-details-4.jpg') }}"
                                   data-zoom-image="{{ asset('assets/web/image/product/product-details/product-details-4.jpg') }}">
                                    <img src="{{ asset('assets/web/image/product/product-details/product-details-4.jpg') }}" alt=""/>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4 mt-lg-0">
                        <div class="description-block">
                            <div class="header-block">
                                <h3>Diam vel neque</h3>
                            </div>
                            <!-- Price -->
                            <p class="price"><span class="old-price">250$</span>300$</p>
                            <!-- Rating Block -->
                            <div class="rating-block d-flex  mt--10 mb--15">
                                <p class="rating-text"><a href="#comment-form">See all features</a></p>
                            </div>
                            <!-- Blog Short Description -->
                            <div class="product-short-para">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                    est
                                    tristique auctor. Donec non est at libero vulputate rutrum.
                                </p>
                            </div>
                            <div class="status">
                                <i class="fas fa-check-circle"></i>300 IN STOCK
                            </div>
                            <!-- Amount and Add to cart -->
                            <form action="https://htmldemo.net/petmark/petmark/" class="add-to-cart">
                                <div class="count-input-block">
                                    <input type="number" class="form-control text-center" value="1" min="1">
                                </div>
                                <div class="btn-block">
                                    <a href="#" class="btn btn-rounded btn-outlined--primary">Add to cart</a>
                                </div>
                            </form>
                            <!-- Sharing Block 2 -->
                            <div class="share-block-2 mt--30">
                                <h4>SHARE THIS PRODUCT</h4>
                                <ul class="social-btns social-btns-3">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Promotion Block 1 -->
<section class="pt--50 space-db--30">
    <h2 class="d-none">Promotion Block</h2>
    <div class="container">
        <a class="promo-image overflow-image">
            <img src="{{ asset('assets/web/image/product/promo-product-image-huge.jpg') }}" alt="">
        </a>
    </div>
</section>
<!-- SLider Block 3 / Tab -->
<!-- <div class="pt--50">
    <div class="container">
        <div class="slider-header-block tab-header d-flex">
            <div class="block-title">
                <h2>TOP CATEGORIES THIS WEEK</h2>
            </div>
            <ul class="pm-tab-nav nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                       aria-controls="home"
                       aria-selected="true">Dry Kibbles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile"
                       aria-selected="false">Wet Dog Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact"
                       aria-selected="false">Puppy Food</a>
                </li>
            </ul>
        </div>
        <div class="tab-content pm-slider-tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="petmark-slick-slider border grid-column-slider  arrow-type-two" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 3000,
                        "slidesToShow": 5,
                        "rows" :2,
                        "arrows": true
                    }'
                     data-slick-responsive='[
                        {"breakpoint":991, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                    ]'>

                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-7.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-6.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-5.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-4.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-3.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-2.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-1.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-9.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-11.jpg') }}"
                                                                    alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-10.jpg') }}"
                                                                    alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-7.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-1.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="petmark-slick-slider border grid-column-slider  arrow-type-two" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 3000,
                        "slidesToShow": 5,
                        "rows" :2,
                        "arrows": true
                    }'
                     data-slick-responsive='[
                        {"breakpoint":991, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                    ]'>

                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-2.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-3.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-4.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-5.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-6.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-7.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-8.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-9.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-10.jpg') }}"
                                                                    alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-11.jpg') }}"
                                                                    alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-5.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-4.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="petmark-slick-slider border grid-column-slider  arrow-type-two" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 3000,
                        "slidesToShow": 5,
                        "rows" :2,
                        "arrows": true
                    }'
                     data-slick-responsive='[
                        {"breakpoint":991, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
                    ]'>

                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-1.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-2.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-3.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-4.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-5.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-6.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-8.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-10.jpg') }}"
                                                                    alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-5.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-4.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-2.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="pm-product">
                            <div class="image">
                                <a href="product-details.html"><img src="{{ asset('assets/web/image/product/home-1/product-1.jpg') }}" alt=""></a>
                                <div class="hover-conents">
                                    <ul class="product-btns">
                                        <li><a href="wishlist.html"><i class="ion-ios-heart-outline"></i></a></li>
                                        <li><a href="compare.html"><i class="ion-ios-shuffle"></i></a></li>
                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"><i
                                                class="ion-ios-search"></i></a></li>
                                    </ul>
                                </div>
                                <span class="onsale-badge">Sale!</span>
                            </div>
                            <div class="content">
                                <h3>Convallis quam sit</h3>
                                <div class="price text-red">
                                    <span class="old">$200</span>
                                    <span>$300</span>
                                </div>
                                <div class="btn-block">
                                    <a href="cart.html" class="btn btn-outlined btn-rounded">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Promotion Block 2 -->
<!-- <section class="pt--50 space-db--30">
    <h2 class="d-none">Promotion Block
    </h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4">
                <a class="promo-image overflow-image">
                    <img src="{{ asset('assets/web/image/product/promo-product-image-2.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-4">
                <a class="promo-image overflow-image  promo-small ">
                    <img src="{{ asset('assets/web/image/product/promo-product-image-sm.jpg') }}" alt="">
                </a>
                <a class="promo-image overflow-image  promo-small ">
                    <img src="{{ asset('assets/web/image/product/promo-product-image-sm-2.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-4">
                <a class="promo-image overflow-image">
                    <img src="{{ asset('assets/web/image/product/promo-product-image.jpg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</section> -->
<!-- Slider bLock 4 -->
<div class="pt--50">
    <div class="container">
        <div class="block-title">
            <h2>FREQUENTY ORDERD PRODUCTS</h2>
        </div>
        <div class="petmark-slick-slider border grid-column-slider" 
            data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 3000,
                "slidesToShow": 5,
                "rows" :2,
                "arrows": true
            }'
            data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
            ]'
        >
            @foreach($frequently as $product)
            <div class="single-slide">
                <div class="pm-product">
                    <div class="image">
                        <a href="#">
                            <img src="{{ $product->thumbnail }}" alt="" width="400px">
                        </a>
                        <div class="hover-conents">
                            <ul class="product-btns">
                                <li><a href="#"><i class="ion-ios-heart-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-shuffle"></i></a></li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal">
                                        <i class="ion-ios-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="onsale-badge">Sale!</span>
                    </div>
                    <div class="content">
                        <h3>{{ $product->name }}</h3>
                        @php($price = $product->prices()->where('default','Yes')->first())
                        <div class="price text-red">
                            <!-- <span class="old">$200</span> -->
                            <span>&#8360; {{ $price->price }}</span>
                        </div>
                        <div class="btn-block">
                            <a href="#" class="btn btn-outlined btn-rounded">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="pt--50">
    <div class="container">
        <div class="block-title">
            <h2>FEATURED PRODUCTS</h2>
        </div>
        <div class="petmark-slick-slider border grid-column-slider" 
            data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 3000,
                "slidesToShow": 5,
                "rows" :2,
                "arrows": true
            }'
            data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
            ]'
        >
            @foreach($featured as $product)
            <div class="single-slide">
                <div class="pm-product">
                    <div class="image">
                        <a href="#">
                            <img src="{{ $product->thumbnail }}" alt="" width="400px">
                        </a>
                        <div class="hover-conents">
                            <ul class="product-btns">
                                <li><a href="#"><i class="ion-ios-heart-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-shuffle"></i></a></li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal">
                                        <i class="ion-ios-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="onsale-badge">Sale!</span>
                    </div>
                    <div class="content">
                        <h3>{{ $product->name }}</h3>
                        @php($price = $product->prices()->where('default','Yes')->first())
                        <div class="price text-red">
                            <!-- <span class="old">$200</span> -->
                            <span>&#8360; {{ $price->price }}</span>
                        </div>
                        <div class="btn-block">
                            <a href="#" class="btn btn-outlined btn-rounded">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="pt--50">
    <div class="container">
        <div class="block-title">
            <h2>MENS ADN WOMAN PRODUCTS</h2>
        </div>
        <div class="petmark-slick-slider border grid-column-slider" 
            data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 3000,
                "slidesToShow": 5,
                "rows" :2,
                "arrows": true
            }'
            data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
            ]'
        >
            @foreach($menWomans as $product)
            <div class="single-slide">
                <div class="pm-product">
                    <div class="image">
                        <a href="#">
                            <img src="{{ $product->thumbnail }}" alt="" width="400px">
                        </a>
                        <div class="hover-conents">
                            <ul class="product-btns">
                                <li><a href="#"><i class="ion-ios-heart-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-shuffle"></i></a></li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal">
                                        <i class="ion-ios-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="onsale-badge">Sale!</span>
                    </div>
                    <div class="content">
                        <h3>{{ $product->name }}</h3>
                        @php($price = $product->prices()->where('default','Yes')->first())
                        <div class="price text-red">
                            <!-- <span class="old">$200</span> -->
                            <span>&#8360; {{ $price->price }}</span>
                        </div>
                        <div class="btn-block">
                            <a href="#" class="btn btn-outlined btn-rounded">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- slide Block 5 / Normal Slider -->
<div class="pt--50">
    <div class="container">
        <div class="block-title">
            <h2>WELLNESS PRODUCTS</h2>
        </div>
        <div class="petmark-slick-slider border normal-slider"
            data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 3000,
                "slidesToShow": 3,
                "arrows": true
            }'
            data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 1} }
            ]'>
            @foreach($featured as $product)
            <div class="single-slide">
                <div class="pm-product  product-type-list">
                    <div class="image">
                        <a href="#">
                            <img src="{{ $product->thumbnail }}" alt="">
                        </a>
                        <span class="onsale-badge">Sale!</span>
                    </div>
                    <div class="content">
                        @php($price = $product->prices()->where('default','Yes')->first())
                        <h3>{{ $product->name }}</h3>
                        <div class="price text-red">
                            <!-- <span class="old">$200</span> -->
                            <span>&#8360; {{ $price->price }}</span>
                        </div>
                        <div class="btn-block">
                            <a href="#" class="btn btn-outlined btn-rounded">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- slide Block 3 / Normal Slider -->
<div class="pt--50 pb--50">
    <div class="container">
        <div class="petmark-slick-slider brand-slider border normal-slider grid-border-none"
            data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 3000,
                "slidesToShow": 5,
                "arrows": true
            }'
            data-slick-responsive='[
                {"breakpoint":991, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
            @foreach($brands as $brand)
            <div class="single-slide">
                <a href="#" class="overflow-image brand-image">
                    <img src="{{ $brand->logo }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection