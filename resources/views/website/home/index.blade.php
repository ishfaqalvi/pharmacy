@extends('website.layout.app')

@section('title')
{{ settings('website_title') }}
@endsection
@section('banner')
    <div class="py-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <header>
                        <div id="owl-carousel-one" class="owl-carousel">
                            @foreach ($sliders as $slider)
                                <div class="item"><img class="img-fluid mx-auto" src="{{ $slider->image }}"></div>
                            @endforeach
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="offers-block">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('assets/website/img/offer-1.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="offers-block">
                        <a href="#">
                            <img class="img-fluid mb-3" src="{{ asset('assets/website/img/offer-3.png') }}" alt="">
                        </a>
                    </div>
                    <div class="offers-block">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('assets/website/img/offer-4.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="offers-block">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('assets/website/img/offer-2.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-list pbc-5 pb-4 pt-5 bg-light">
        <div class="container">
            <h6 class="mt-1 mb-0 float-right"><a href="#">View All Items</a></h6>
            <h4 class="mt-0 mb-3 text-dark font-weight-normel">Featured Products</h4>
            <div class="row">
                @foreach ($featured as $product)
                <div class="col-6 col-md-3">
                    <div class="card list-item bg-white rounded overflow-hidden position-relative shadow-sm">
                        <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                        <a href="#">
                            {{-- <span class="badge badge-danger">NEW</span> --}}
                            <img src="{{ $product->thumbnail }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1">{{ $product->name }}</h6>
                            <div class="stars-rating">
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star"></i>
                                <span>613</span>
                            </div>
                            <p class="mb-0 text-dark">
                                &#8360; {{ $product->price()->new_price }}
                                {{-- <span class="text-black-50">
                                    <del>$500.00 </del>
                                </span> --}}
                                @if($product->category->discount > 0)
                                    <span class="bg-info rounded-sm pl-1 ml-1 pr-1 text-white small"> {{ $product->category->discountn }}% OFF</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <section class="product-list pbc-5 pb-4 pt-5 bg-light">
        <div class="container">
            <h6 class="mt-1 mb-0 float-right"><a href="#">View All Items</a></h6>
            <h4 class="mt-0 mb-3 text-dark font-weight-normel">Frequently Products</h4>
            <div class="row">
                @foreach ($frequently as $product)
                <div class="col-6 col-md-3">
                    <div class="card list-item bg-white rounded overflow-hidden position-relative shadow-sm">
                        <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                        <a href="#">
                            {{-- <span class="badge badge-danger">NEW</span> --}}
                            <img src="{{ $product->thumbnail }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1">{{ $product->name }}</h6>
                            <div class="stars-rating">
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star"></i>
                                <span>613</span>
                            </div>
                            <p class="mb-0 text-dark">
                                &#8360; {{ $product->price()->new_price }}
                                {{-- <span class="text-black-50">
                                    <del>$500.00 </del>
                                </span> --}}
                                @if($product->category->discount > 0)
                                    <span class="bg-info rounded-sm pl-1 ml-1 pr-1 text-white small"> {{ $product->category->discountn }}% OFF</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <section class="product-list pbc-5 pb-4 pt-5 bg-light">
        <div class="container">
            <h6 class="mt-1 mb-0 float-right"><a href="#">View All Items</a></h6>
            <h4 class="mt-0 mb-3 text-dark font-weight-normel">Wellness Products</h4>
            <div class="row">
                @foreach ($wellness as $product)
                <div class="col-6 col-md-3">
                    <div class="card list-item bg-white rounded overflow-hidden position-relative shadow-sm">
                        <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                        <a href="#">
                            {{-- <span class="badge badge-danger">NEW</span> --}}
                            <img src="{{ $product->thumbnail }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-1">{{ $product->name }}</h6>
                            <div class="stars-rating">
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star active"></i>
                                <i class="icofont icofont-star"></i>
                                <span>613</span>
                            </div>
                            <p class="mb-0 text-dark">
                                &#8360; {{ $product->price()->new_price }}
                                {{-- <span class="text-black-50">
                                    <del>$500.00 </del>
                                </span> --}}
                                @if($product->category->discount > 0)
                                    <span class="bg-info rounded-sm pl-1 ml-1 pr-1 text-white small"> {{ $product->category->discountn }}% OFF</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <section class="offer-product py-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="offers-block">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('assets/website/img/ad/1.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="offers-block">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('assets/website/img/ad/2.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-list pbc-5 pb-4 pt-5 bg-light">
        <div class="container">
            <h6 class="mt-1 mb-0 float-right"><a href="#">View All Items</a></h6>
            <h4 class="mt-0 mb-3 text-dark">Men & Woman Products</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-carousel-category owl-theme">
                        @foreach ($menWomans as $product)    
                        <div class="item">
                            <div class="card list-item bg-white rounded overflow-hidden position-relative shadow-sm">
                                <span class="like-icon">
                                    <a href="#">
                                        <i class="icofont icofont-heart"></i>
                                    </a>
                                </span>
                                <a href="#">
                                    {{-- <span class="badge badge-danger">NEW</span> --}}
                                    <img src="{{ $product->thumbnail }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title mb-1">{{ $product->name }}</h6>
                                    <div class="stars-rating">
                                        <i class="icofont icofont-star active"></i>
                                        <i class="icofont icofont-star active"></i>
                                        <i class="icofont icofont-star active"></i>
                                        <i class="icofont icofont-star active"></i>
                                        <i class="icofont icofont-star"></i>
                                        <span>613</span>
                                    </div>
                                    <p class="mb-0 text-dark">
                                        &#8360; {{ $product->price()->new_price }}
                                        {{-- <span class="text-black-50">
                                            <del>$500.00 </del>
                                        </span> --}}
                                        @if($product->category->discount > 0)
                                            <span class="bg-info rounded-sm pl-1 ml-1 pr-1 text-white small"> {{ $product->category->discountn }}% OFF</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
