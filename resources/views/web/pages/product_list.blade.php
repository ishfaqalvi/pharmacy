@extends('web.layout.app')

@section('page_title')
	Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  	<div class="container">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      		<li class="breadcrumb-item active" aria-current="page">Products</li>
    	</ol>
  	</div>
</nav>
<main class="section-padding shop-page-section">
  	<div class="container">
    	{{ $products->links('web.include.product.toolbar') }}
    	<div class="shop-product-wrap list with-pagination row border grid-four-column me-0 ms-0 g-0">
      		@foreach($products as $product)
      		<div class="col-lg-3 col-sm-6">
        		<div class="pm-product product-type-list">
          			<a href="{{ route('product.show', $product->id)}}" class="image" tabindex="0">
            			<img src="{{ $product->thumbnail }}" alt="">
          			</a>
          			<div class="hover-conents">
	            		<ul class="product-btns">
	              			<li>
	              				<a href="wishlist.html" tabindex="0">
	              					<i class="ion-ios-heart-outline"></i>
	              				</a>
	              			</li>
	              			<li>
	              				<a href="compare.html" tabindex="0">
	              					<i class="ion-ios-shuffle"></i>
	              				</a>
	              			</li>
	              			<li>
	              				<a href="#" data-bs-toggle="modal" data-bs-target="#quickModal" tabindex="0">
	              					<i class="ion-ios-search"></i>
	              				</a>
	              			</li>
	            		</ul>
          			</div>
          			<div class="content">
            			<h3 class="font-weight-500">
            				<a href="{{ route('product.show', $product->id)}}">
            					{{ $product->name }}
            				</a>
            			</h3>
            			<div class="price text-red">
            				@php($price = $product->prices()->where('default','Yes')->first())
              				@if($price->new_price != $price->old_price)
              					<span class="old">&#8360; {{ $price->old_price }}</span>
              				@endif
              				<span>&#8360; {{ $price->new_price }}</span>
            			</div>
            			<div class="btn-block grid-btn">
              				<a href="cart.html" class="btn btn-outlined btn-rounded btn-mid" tabindex="0">
              					Add to Cart
              				</a>
            			</div>
            			<div class="card-list-content ">
              				<div class="rating-widget mt--20">
                				<a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                				<a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                				<a href="#" class="single-rating"><i class="fas fa-star"></i></a>
                				<a href="#" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
                				<a href="#" class="single-rating"><i class="far fa-star"></i></a>
              				</div>
              				<article>
                				<h3 class="d-none sr-only">Article</h3>
                  				<p>{{ $product->description }}</p>
              				</article>
              				<div class="btn-block d-flex">
                				<a href="cart.html" class="btn btn-outlined btn-rounded btn-mid" tabindex="0">
                				Add to Cart</a>
                				<div class="btn-options">
                  					<a href="wishlist.html">
                  						<i class="ion-ios-heart-outline"></i>Add to Wishlist
                  					</a>
                  					<a href="compare.html">
                  						<i class="ion-ios-shuffle"></i>Add to Compare
                  					</a>
                				</div>
              				</div>
            			</div>
          			</div>
        		</div>
      		</div>
      		@endforeach
        </div>
	    {{ $products->links('web.include.product.pagination') }}
	</div>
</main>
@include('web.include.product.preview')
@endsection