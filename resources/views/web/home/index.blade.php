@extends('web.layout.app')

@section('page_title')
	Sakoon Pharmacy
@endsection

@section('content')
<!-----------------------------------------------------------------------------------
									SLIDER SECTION
------------------------------------------------------------------------------------>
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
        	@if($slider->type != 'Simple')
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ strtoupper($slider->heading) }}</h2>
                        <h4 class="mt--30">{{ strtoupper($slider->sub_heading) }}</h4>
                        <div class="slider-btn mt--30">
                            <a href="#" class="btn btn-outlined--primary btn-rounded">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <span class="herobanner-progress"></span>
        </div>
        @endforeach
    </div>
</section>

<!-----------------------------------------------------------------------------------
									POLICY BLOCK SECTION
------------------------------------------------------------------------------------>
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

<!-----------------------------------------------------------------------------------
									CATEGORIES SECTION
------------------------------------------------------------------------------------>
<section class="category-section pt--50">
    <div class="container">
        <div class="block-title">
            <h2>TOP CATEGORIES</h2>
        </div>
        <div class="category-block">
            <div class="row g-0">
                @foreach(categoriesList() as $category)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-block-single">
                        <a href="{{ route('product.index', ['category' => $category->name ])}}" class="icon">
                            <img src="{{ $category->logo }}" alt="">
                        </a>
                        <h3>
                            <a href="{{ route('product.index', ['category' => $category->name ])}}">
                                {{ $category->name }}
                            </a>
                        </h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-----------------------------------------------------------------------------------
								PROMOTION BLOCK SECTION
------------------------------------------------------------------------------------>
<section class="pt--50 space-db--30">
    <h2 class="d-none">Promotion Block</h2>
    <div class="container">
        <a class="promo-image overflow-image">
            <img src="{{ asset('assets/web/image/product/promo-product-image-huge.jpg') }}" alt="">
        </a>
    </div>
</section>

<!-----------------------------------------------------------------------------------
						FREQUENTLY ORDERD PRODUCTS SECTION
------------------------------------------------------------------------------------>
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
            @php($price = $product->prices()->whereDefault('Yes')->first())
            <div class="single-slide">
                <div class="pm-product">
                    <div class="image">
                        <a href="{{ route('product.show', $product->id)}}">
                            <img src="{{ $product->thumbnail }}" alt="" width="150px" height="175px">
                        </a>
                        <div class="hover-conents">
                            <ul class="product-btns">
                                <li><a href="#"><i class="ion-ios-heart-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-shuffle"></i></a></li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productPreview">
                                        <i class="ion-ios-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="onsale-badge">{{ $price->title }}</span>
                    </div>
                    <div class="content">
                        <h3>{{ Str::limit($product->name, 25) }}</h3>
                        <div class="price text-red">
                            @if($price->new_price != $price->old_price)
                                <span class="old">&#8360; {{ $price->old_price }}</span>
                            @endif
                            <span>&#8360; 
                                {{ $price->new_price }}
                            </span>
                        </div>
                        <div class="btn-block">
                            <form method="post" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price_id" value="{{ $price->id }}">
                                <button type="submit" class="btn btn-outlined btn-rounded">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-----------------------------------------------------------------------------------
							FEATURED PRODUCTS SECTION
------------------------------------------------------------------------------------>
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
            @php($price = $product->prices()->whereDefault('Yes')->first())
            <div class="single-slide">
                <div class="pm-product">
                    <div class="image">
                        <a href="{{ route('product.show', $product->id)}}">
                            <img src="{{ $product->thumbnail }}" alt="" width="150px" height="175px">
                        </a>
                        <div class="hover-conents">
                            <ul class="product-btns">
                                <li><a href="#"><i class="ion-ios-heart-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-shuffle"></i></a></li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#producPreview">
                                        <i class="ion-ios-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="onsale-badge">{{ $price->title }}</span>
                    </div>
                    <div class="content">
                        <h3>{{ Str::limit($product->name, 25) }}</h3>
                        <div class="price text-red">
                            @if($price->new_price != $price->old_price)
                                <span class="old">&#8360; {{ $price->old_price }}</span>
                            @endif
                            <span>&#8360; 
                                {{ $price->new_price }}
                            </span>
                        </div>
                        <div class="btn-block">
                            <form method="post" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price_id" value="{{ $price->id }}">
                                <button type="submit" class="btn btn-outlined btn-rounded">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-----------------------------------------------------------------------------------
						MEN AND WOMAN PRODUCTS SECTION
------------------------------------------------------------------------------------>
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
            @php($price = $product->prices()->whereDefault('Yes')->first())
            <div class="single-slide">
                <div class="pm-product">
                    <div class="image">
                        <a href="{{ route('product.show', $product->id)}}">
                            <img src="{{ $product->thumbnail }}" alt="" width="150px" height="175px">
                        </a>
                        <div class="hover-conents">
                            <ul class="product-btns">
                                <li><a href="#"><i class="ion-ios-heart-outline"></i></a></li>
                                <li><a href="#"><i class="ion-ios-shuffle"></i></a></li>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#producPreview">
                                        <i class="ion-ios-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="onsale-badge">{{ $price->title }}</span>
                    </div>
                    <div class="content">
                        <h3>{{ Str::limit($product->name, 25) }}</h3>
                        <div class="price text-red">
                            @if($price->new_price != $price->old_price)
                                <span class="old">&#8360; {{ $price->old_price }}</span>
                            @endif
                            <span>&#8360; 
                                {{ $price->new_price }}
                            </span>
                        </div>
                        <div class="btn-block">
                            <form method="post" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price_id" value="{{ $price->id }}">
                                <button type="submit" class="btn btn-outlined btn-rounded">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-----------------------------------------------------------------------------------
							WELLNESS PRODUCTS SECTION
------------------------------------------------------------------------------------>
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
            @foreach($wellness as $product)
            @php($price = $product->prices()->whereDefault('Yes')->first())
            <div class="single-slide">
                <div class="pm-product  product-type-list">
                    <div class="image">
                        <a href="{{ route('product.show', $product->id)}}">
                            <img src="{{ $product->thumbnail }}" alt="">
                        </a>
                        <span class="onsale-badge">{{ $price->title }}</span>
                    </div>
                    <div class="content">
                        <h3>{{ $product->name }}</h3>
                        <div class="price text-red">
                            @if($price->new_price != $price->old_price)
                                <span class="old">&#8360; {{ $price->old_price }}</span>
                            @endif
                            <span>&#8360; 
                                {{ $price->new_price }}
                            </span>
                        </div>
                        <div class="btn-block">
                            <form method="post" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price_id" value="{{ $price->id }}">
                                <button type="submit" class="btn btn-outlined btn-rounded">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-----------------------------------------------------------------------------------
								BRAND SECTION
------------------------------------------------------------------------------------>
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
                <a href="{{ route('product.index', ['brand' => $brand->name ])}}" class="overflow-image brand-image">
                    <img src="{{ $brand->logo }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('web.include.product.preview')
@endsection