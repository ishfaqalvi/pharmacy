@extends('website.layout.app')

@section('title') {{ settings('website_title') }} @endsection

@section('content')
<section class="py-5 products-listing bg-light">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-3">
                <div class="filters mobile-filters shadow-sm rounded bg-white mb-4 d-none d-block d-md-none">
                    <div class="border-bottom">
                        <a class="h6 font-weight-bold text-dark d-block m-0 p-3" data-toggle="collapse" href="#mobile-filters" role="button" aria-expanded="false" aria-controls="mobile-filters">Filter By <i class="icofont-arrow-down float-right mt-1"></i></a>
                    </div>
                    <div id="mobile-filters" class="filters-body collapse multi-collapse">
                        <div id="accordion">
                            <div class="filters-card border-bottom p-3">
                                <div class="filters-card-header" id="headingOffer">
                                    <h6 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseSort" aria-expanded="true" aria-controls="collapseSort">
                                            Sort by Products <i class="icofont-arrow-down float-right"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapseSort" class="collapse" aria-labelledby="headingOffer" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan111">
                                            <label class="custom-control-label" for="osahan111">Relevance </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan112">
                                            <label class="custom-control-label" for="osahan112">Price (Low to High)</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan113">
                                            <label class="custom-control-label" for="osahan113">Price (High to Low)</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan114">
                                            <label class="custom-control-label" for="osahan114">Discount (High to Low)</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan115">
                                            <label class="custom-control-label" for="osahan115">Name (A to Z)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card border-bottom p-3">
                                <div class="filters-card-header" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                            All Category
                                            <i class="icofont-arrow-down float-right"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapsetwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        <form class="filters-search mb-3">
                                            <div class="form-group">
                                                <i class="icofont-search"></i>
                                                <input type="text" class="form-control" placeholder="Start typing to search...">
                                            </div>
                                        </form>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan116">
                                            <label class="custom-control-label" for="osahan116">
                                                Jackets <small class="text-black-50">156</small>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan117">
                                            <label class="custom-control-label" for="osahan117">
                                                Blazers & Coats <small class="text-black-50">120</small>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan118">
                                            <label class="custom-control-label" for="osahan118">
                                                Suits <small class="text-black-50">130</small>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan119">
                                            <label class="custom-control-label" for="osahan119">
                                                Rain Jackets <small class="text-black-50">120</small>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan110">
                                            <label class="custom-control-label" for="osahan110">
                                                T-Shirts <small class="text-black-50">111</small>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan1111">
                                            <label class="custom-control-label" for="osahan1111">
                                                Casual Shirts <small class="text-black-50">95</small>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan1122">
                                            <label class="custom-control-label" for="osahan1122"> Formal Shirts <small class="text-black-50">50</small></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan1133">
                                            <label class="custom-control-label" for="osahan1133"> Sweatshirts <small class="text-black-50">32</small></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan1144">
                                            <label class="custom-control-label" for="osahan1144"> Sweaters <small class="text-black-50">156</small></label>
                                        </div>
                                        <div class="mt-2"><a href="#" class="link">See all</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card border-bottom p-3">
                                <div class="filters-card-header" id="headingOne">
                                    <h6 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Brand <i class="icofont-arrow-down float-right"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan1155">
                                            <label class="custom-control-label" for="osahan1155">Brand 1 <small class="text-black-50">230</small></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan1166">
                                            <label class="custom-control-label" for="osahan1166">Brand 2 <small class="text-black-50">95</small></label>
                                        </div>
                                        <div class="mt-2"><a href="#" class="link">See all</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card border-bottom p-3">
                                <div class="filters-card-header" id="headingOffer">
                                    <h6 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOffer" aria-expanded="true" aria-controls="collapseOffer">
                                            Price <i class="icofont-arrow-down float-right"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapseOffer" class="collapse" aria-labelledby="headingOffer" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan1100">
                                            <label class="custom-control-label" for="osahan1100">Any Price </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan11111">
                                            <label class="custom-control-label" for="osahan11111">$50 - $100
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan11222">
                                            <label class="custom-control-label" for="osahan11222">$100 - $150
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan11333">
                                            <label class="custom-control-label" for="osahan11333">$150 - $200
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="osahan11444">
                                            <label class="custom-control-label" for="osahan11444">$200 - $1000
                                            </label>
                                        </div>
                                        <div class="mt-2"><a href="#" class="link">See all</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filters shadow-sm rounded bg-white mb-3 d-none d-sm-none d-md-block">
                    <div class="filters-header border-bottom pl-4 pr-4 pt-3 pb-3">
                        <h5 class="m-0 text-dark">Filter By</h5>
                    </div>
                    <div class="filters-body">
                        <div id="accordion">
                            <div class="filters-card border-bottom p-4">
                                <div class="filters-card-header" id="headingTwo">
                                    <h6 class="mb-0">
                                    <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                    All Category
                                    <i class="icofont-arrow-down float-right"></i>
                                    </a>
                                    </h6>
                                </div>
                                <div id="collapsetwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                    <form class="filters-search mb-3">
                                        <div class="form-group">
                                            <i class="icofont-search"></i>
                                            <input type="text" class="form-control" placeholder="Start typing to search...">
                                        </div>
                                    </form>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11q">
                                        <label class="custom-control-label" for="osahan11q">Jackets <small class="text-black-50">156</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11w">
                                        <label class="custom-control-label" for="osahan11w">Blazers & Coats <small class="text-black-50">120</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11e">
                                        <label class="custom-control-label" for="osahan11e">Suits <small class="text-black-50">130</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11r">
                                        <label class="custom-control-label" for="osahan11r">Rain Jackets <small class="text-black-50">120</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11y">
                                        <label class="custom-control-label" for="osahan11y"> T-Shirts <small class="text-black-50">111</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11u">
                                        <label class="custom-control-label" for="osahan11u"> Casual Shirts <small class="text-black-50">95</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11i">
                                        <label class="custom-control-label" for="osahan11i"> Formal Shirts <small class="text-black-50">50</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11p">
                                        <label class="custom-control-label" for="osahan11p"> Sweatshirts <small class="text-black-50">32</small></label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11po">
                                        <label class="custom-control-label" for="osahan11po"> Sweaters <small class="text-black-50">156</small></label>
                                    </div>
                                    <div class="mt-2"><a href="#" class="link">See all</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card border-bottom p-4">
                                <div class="filters-card-header" id="headingOne">
                                    <h6 class="mb-0">
                                    <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Brand <i class="icofont-arrow-down float-right"></i>
                                    </a>
                                    </h6>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11z">
                                        <label class="custom-control-label" for="osahan11z">Brand 1 <small class="text-black-50">230</small>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11zz">
                                        <label class="custom-control-label" for="osahan11zz">Brand 2 <small class="text-black-50">95</small>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11zzz">
                                        <label class="custom-control-label" for="osahan11zzz">Brand 3 <small class="text-black-50">35</small>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11x">
                                        <label class="custom-control-label" for="osahan11x">Brand 4 <small class="text-black-50">46</small>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11xx">
                                        <label class="custom-control-label" for="osahan11xx">Brand 5 <small class="text-black-50">20</small></label>
                                    </div>
                                    <div class="mt-2"><a href="#" class="link">See all</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="filters-card border-bottom p-4">
                                <div class="filters-card-header" id="headingOffer">
                                    <h6 class="mb-0">
                                    <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOffer" aria-expanded="true" aria-controls="collapseOffer">
                                    Price <i class="icofont-arrow-down float-right"></i>
                                    </a>
                                    </h6>
                                </div>
                                <div id="collapseOffer" class="collapse" aria-labelledby="headingOffer" data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11cc">
                                        <label class="custom-control-label" for="osahan11cc">Any Price </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11c">
                                        <label class="custom-control-label" for="osahan11c">$50 - $100
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11v">
                                        <label class="custom-control-label" for="osahan11v">$100 - $150
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11vv">
                                        <label class="custom-control-label" for="osahan11vv">$150 - $200
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="osahan11gg">
                                        <label class="custom-control-label" for="osahan11gg">$200 - $1000
                                        </label>
                                    </div>
                                    <div class="mt-2"><a href="#" class="link">See all</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="img/offer-2.png" class="w-100 bg-white rounded overflow-hidden position-relative shadow-sm d-none d-sm-none d-md-block" alt="...">
            </div> --}}
            <div class="col-md-12">
                <div class="shop-head mb-3">
                    @if(isset($filters['brand']))
                        @php($brand = brandById($filters['brand']))
                        <h5 class="mb-1 text-dark">{{ $brand->name }}</h5>
                        <a href="{{ route('home') }}"><span class="icofont icofont-ui-home"></span> Home</a>
                        <span class="icofont icofont-thin-right"></span>
                        <a href="{{ route('product.index') }}">Products</a>
                        <span class="icofont icofont-thin-right"></span> <span>{{ $brand->name }}</span>
                    @elseif(isset($filters['category']))
                        @php($category = categoryById($filters['category']))
                        <h5 class="mb-1 text-dark">{{ $category->name }}</h5>
                        <a href="{{ route('home') }}"><span class="icofont icofont-ui-home"></span> Home</a>
                        <span class="icofont icofont-thin-right"></span>
                        <a href="{{ route('product.index') }}">Products</a>
                        <span class="icofont icofont-thin-right"></span> <span>{{ $category->name }}</span>
                    @elseif(isset($filters['sub_category']))
                        @php($subCategory = subCategoryById($filters['sub_category']))
                        <h5 class="mb-1 text-dark">{{ $subCategory->name }}</h5>
                        <a href="{{ route('home') }}"><span class="icofont icofont-ui-home"></span> Home</a>
                        <span class="icofont icofont-thin-right"></span>
                        <a href="{{ route('product.index') }}">Products</a>
                        <span class="icofont icofont-thin-right"></span>
                        <a href="{{ route('product.index',['category' => $subCategory->category_id]) }}">
                            {{ $subCategory->category->name }}
                        </a>
                        <span class="icofont icofont-thin-right"></span> <span>{{ $subCategory->name }}</span>
                    @else
                        <h5 class="mb-1 text-dark">All Products</h5>
                        <a href="{{ route('home') }}"><span class="icofont icofont-ui-home"></span> Home</a>
                        <span class="icofont icofont-thin-right"></span> <span>Products</span>
                    @endif
                </div>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-6 col-md-3">
                        <div class="card list-item bg-white rounded overflow-hidden position-relative shadow-sm">
                            <span class="like-icon"><a href="#"> <i class="icofont icofont-heart"></i></a></span>
                            <a href="{{ route('product.show',$product->id) }}">
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
                    <div class="col-md-12 text-center load-more">
                        {{ $products->withPath('/products/list/')->appends(request()->except('_token'))->links('website.product.include.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
