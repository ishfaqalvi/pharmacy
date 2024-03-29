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
  		<div class="shop-toolbar mb--30">
			<div class="row align-items-center">
				<div class="col-5 col-md-3 col-lg-4">
		  		<!-- Product View Mode -->
		  			<div class="product-view-mode">
		    			<a href="#" class="sortting-btn active" data-bs-target="list ">
		    				<i class="fas fa-list"></i>
		    			</a>
		    			<a href="#" class="sortting-btn" data-bs-target="grid">
		    				<i class="fas fa-th"></i>
		    			</a>
		  			</div>
				</div>
				{{ $products->links('web.include.product.toolbar') }}	
			</div>
		</div>
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
	              				<a href="javascript:void(0)" class="add-to-wishlist" data-product-id="{{ $product->id }}" title="Add to Wishlist">
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
            				@php($price = $product->price())
              				<!-- @if($price->new_price != $price->old_price)
              					<span class="old">&#8360; {{ $price->old_price }}</span>
              				@endif -->
              				<span>&#8360; {{ $price->new_price }}</span>
            			</div>
            			<div class="btn-block grid-btn">
            				<!-- <a href="javascript:void(0)" class="addToCart btn btn-outlined btn-rounded" data-product-id="{{ $product->id }}" data-price-id="{{ $price->id }}">Add to Cart</a> -->
            				<a href="{{ route('product.show', $product->id)}}" class="btn btn-outlined btn-rounded">Add to Cart</a>
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
	                            <!-- <a href="javascript:void(0)" class="addToCart btn btn-outlined btn-rounded" data-product-id="{{ $product->id }}" data-price-id="{{ $price->id }}">Add to Cart</a> -->
	                            <a href="{{ route('product.show', $product->id)}}" class="btn btn-outlined btn-rounded">Add to Cart</a>
                				<div class="btn-options ms-2">
                					<a href="javascript:void(0)" class="add-to-wishlist" data-product-id="{{ $product->id }}" title="Add to Wishlist">
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