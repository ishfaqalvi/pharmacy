@extends('web.layout.app')

@section('page_title')
	Sakoon Pharmacy
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  	<div class="container">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      		<li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
      		<li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
    	</ol>
  	</div>
</nav>
@php($defaultPrice = $product->price())
<main class="product-details-section">
  	<div class="container">
    	<div class="pm-product-details">
      		<div class="row">
        		<div class="col-md-6">
          			<div class="image-block">
            			<img id="zoom_03" src="{{ $product->thumbnail }}" data-zoom-image="{{ $product->thumbnail }}" alt="" width="400px" height="400px"/>
            			<div id="product-view-gallery" class="elevate-gallery">
	              			@foreach($product->images as $gallery)
			              	<a href="#" class="gallary-item" data-image="{{ $gallery->image }}"
			                data-zoom-image="{{ $gallery->image }}">
			                	<img src="{{ $gallery->image }}" alt=""/>
			              	</a>
				            @endforeach
            			</div>
          			</div>
        		</div>
        		<div class="col-md-6 mt-5 mt-md-0">
          			<div class="description-block">
            			<div class="header-block">
                			<h3>{{ $product->name }}</h3>
                			<div class="navigation">
			                  	<a href="#"><i class="ion-ios-arrow-back"></i></a>
			                  	<a href="#"><i class="ion-ios-arrow-forward"></i></a>
			                </div>
            			</div>
            			<div class="rating-block d-flex  mt--10 mb--15">
              				<div class="rating-widget">
                				<a href="#" class="single-rating"><i class="fas fa-star"></i></a>
				                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
				                <a href="#" class="single-rating"><i class="fas fa-star"></i></a>
				                <a href="#" class="single-rating"><i class="fas fa-star-half-alt"></i></a>
				                <a href="#" class="single-rating"><i class="far fa-star"></i></a>
              				</div>
              				<p class="rating-text">
              					<a href="#comment-form">(1 customer review)</a>
              				</p>
            			</div>
  						<p class="price">
              				@if($defaultPrice->new_price != $defaultPrice->old_price)
              					<span class="old-price">&#8360; {{ $defaultPrice->old_price }}</span>
              				@endif
              				&#8360; <span id="original_price">{{ $defaultPrice->new_price }}</span> 
            			</p>
            			<div class="wrapper">
            				@php($option = 0 )
            				@foreach($product->prices as $key => $price)
            				@php($option = ++$key)
            				<input type="radio" id="option-{{ $option}}" name="price_id" data-price="{{$price->new_price}}"value="{{ $price->id }}" @if($price->default == 'Yes') checked @endif>
  							<label class="option option-{{$option}}" for="option-{{$option}}">
  								<div class="dot"></div>
  								<span class="title">{{ $price->title }}</span>
  							</label>
            				@endforeach
               			</div>
            			<div class="product-short-para">
              				<p>{{ $product->description }}</p>
            			</div>
            			<div class="status">
              				<i class="fas fa-check-circle"></i>{{ $product->quantity }} IN STOCK
            			</div>
            			<div class="add-to-cart">
              				<div class="count-input-block">
                				<input type="number" id="quantity-input" class="form-control text-center" value="1" min="1">
              				</div>
              				<div class="btn-block">
                				<a 
                					href="javascript:void(0)" 
                					class="addToCart btn btn-rounded btn-outlined--primary" 
                					data-product-id="{{ $product->id }}">
                					Add to Cart
                				</a>
              				</div>
            			</div>
            			<div class="btn-options">
              				<a href="wishlist.html"><i class="ion-ios-heart-outline"></i>Add to Wishlist</a>
              				<a href="compare.html"><i class="ion-ios-shuffle"></i>Add to Compare</a>
            			</div>
            			<div class="product-meta mt--30">
	              			<p>Catagories: 
	              				<a href="#" class="single-meta">{{ $product->category->name }}</a>, 
	              				<a href="#" class="single-meta">{{ $product->subCategory->name }}</a>
	              			</p>
	              			<p>Brand: 
	              				<a href="#" class="single-meta">{{ $product->category->name }}</a>
	              			</p>
	            		</div>
	            		<div class="share-block-1">
	              			<ul class="social-btns">
	              			@foreach($product->categorizations as $row)
	                			<li>
	                				<a href="#" class="twitter">
	                					<i class="fas fa-plus-square"></i> 
	                					<span>{{ $row->type }}</span>
	                				</a>
	                			</li>
	                		@endforeach
	              			</ul>
	            		</div>
	            		<div class="share-block-2  mt--30">
	              			<h4>SHARE THIS PRODUCT</h4>
	              			<ul class="social-btns social-btns-2">
				                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
				                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
				                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
				                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
				                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
	              			</ul>
	            		</div>
	          		</div>
	        	</div>
	      	</div>
	    </div>
	</div>
  	<section class="review-section pt--60">
    	<h2 class="sr-only d-none">Product Review</h2>
    	<div class="container">
			<div class="product-details-tab">
  				<ul class="nav nav-tabs" id="myTab" role="tablist">
    				<li class="nav-item">
      					<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DESCRIPTION</a>
    				</li>
    				<li class="nav-item">
      					<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">REVIEWS (1)</a>
    				</li>
  				</ul>
  				<div class="tab-content" id="myTabContent">
    				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      					<article>
        					<h2 class="d-none sr-only">tab article</h2>
          					<p>{{ $product->description }}</p>
      					</article>
    				</div>
    				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      					<div class="review-wrapper">
        					<h2 class="title-lg mb--20">1 REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
        					<div class="review-comment mb--20">
          						<div class="avatar">
            						<img src="image/icon-logo/author-logo.png" alt="">
          						</div>
          						<div class="text">
            						<div class="rating-widget mb--15">
						              	<span class="single-rating"><i class="fas fa-star"></i></span>
						              	<span class="single-rating"><i class="fas fa-star"></i></span>
						              	<span class="single-rating"><i class="fas fa-star"></i></span>
						              	<span class="single-rating"><i class="fas fa-star-half-alt"></i></span>
						              	<span class="single-rating"><i class="far fa-star"></i></span>
            						</div>
            						<h6 class="author">ADMIN –  <span class="font-weight-400">March 23, 2015</span> </h6>
            						<p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
          						</div>
        					</div>
        					<h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
        					<div class="rating-row pt-2">
          						<p class="d-block">Your Rating</p>
          						<span class="rating-widget-block">
						            <input type="radio" name="star" id="star1">
						            <label for="star1"></label>
						            <input type="radio" name="star" id="star2">
						            <label for="star2"></label>
						            <input type="radio" name="star" id="star3">
						            <label for="star3"></label>
						            <input type="radio" name="star" id="star4">
						            <label for="star4"></label>
						            <input type="radio" name="star" id="star5">
						            <label for="star5"></label>
          						</span>
          						<form action="https://htmldemo.net/petmark/petmark/" class="mt--15 site-form ">
            						<div class="row">
              							<div class="col-12">
						                	<div class="form-group">
						                  		<label for="message">Comment</label>
						                  		<textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
						                	</div>
						              	</div>
						              	<div class="col-lg-4">
						                	<div class="form-group">
						                  		<label for="name">Name *</label>
						                  		<input type="text" id="name" class="form-control">
						                	</div>
						              	</div>
						              	<div class="col-lg-4">
						                	<div class="form-group">
						                  		<label for="email">Email *</label>
						                  		<input type="text" id="email" class="form-control">
						                	</div>
						              	</div>
						              	<div class="col-lg-4">
						                	<div class="form-group">
						                  		<label for="website">Website</label>
						                  		<input type="text" id="website" class="form-control">
						                	</div>
						              	</div>
						              	<div class="col-lg-4">
						                	<div class="submit-btn">
						                  		<a href="#" class="btn btn-black">Post Comment</a>
						                	</div>
						              	</div>
            						</div>
          						</form>
        					</div>
      					</div>
    				</div>
  				</div>
			</div>
    	</div>
  	</section>
  	<section>
	    <div class="pt--60">
	      	<div class="container">
	        	<div class="block-title">
	          		<h2>RELATED PRODUCTS</h2>
	        	</div>
	        	<div class="petmark-slick-slider border normal-slider" 
	        		data-slick-setting='{
	                    "autoplay": true,
	                    "autoplaySpeed": 3000,
	                    "slidesToShow": 5,
	                    "arrows": true
	                }'
	                data-slick-responsive='[
	                    {"breakpoint":991, "settings": {"slidesToShow": 3} },
	                    {"breakpoint":480, "settings": {"slidesToShow": 1,"rows" :1} }
	                ]'>
	                @foreach($product->relatedParents as $row)
	          		<div class="single-slide">
	            		<div class="pm-product">
	              			<div class="image">
	                			<a href="{{ route('product.show', $row->child_id) }}">
	                				<img src="{{ $row->child->thumbnail }}" alt="">
	                			</a>
	                			<span class="onsale-badge">Sale!</span>
	              			</div>
	              			<div class="content">
	                		<h3>{{ $row->child->name }}</h3>
	                		<div class="price text-red">
	                			@php($price = $row->child->prices()->where('default','Yes')->first())
	              				@if($price->new_price != $price->old_price)
	              					<span class="old">&#8360; {{ $price->old_price }}</span>
	              				@endif
	              				<span>&#8360; {{ $price->new_price }}</span>
	                  			<span class="old">$200</span>
	                  			<span>$300</span>
	                		</div>
	                		<div class="btn-block">
	                  			<a href="cart.html" class="btn btn-outlined btn-rounded">
	                  				Add to Cart
	                  			</a>
	                		</div>
	              		</div>
	            	</div>
	            	@endforeach
	          	</div>
	        </div>
	    </div>
  	</section>
</main>
@endsection

@section('script')
<script>
	$(document).ready(function() {
	    $('.wrapper input[type="radio"][name="price_id"]').change(function() {
	    	var selectedPriceId = $(this).val();
	        var price = $(this).data('price');
	        $('#original_price').text(price);
	    });
	    var defaultRadio = $('.wrapper input[type="radio"][name="price_id"]:checked');
	    $('#hidden_price_id').val(defaultRadio.val());
	    $('#original_price').text(defaultRadio.data('price'));
	});
</script>
@endsection