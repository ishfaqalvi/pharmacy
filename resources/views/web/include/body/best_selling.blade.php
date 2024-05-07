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
            @php($price = $product->price())
            <div class="single-slide">
                <div class="pm-product">
                    <div class="image">
                        <a href="{{ route('product.show', $product->id)}}">
                            <img src="{{ $product->thumbnail }}" alt="" width="150px" height="175px">
                        </a>
                        <div class="hover-conents">
                            <ul class="product-btns">
                                <li>
                                    <a href="javascript:void(0)" class="add-to-wishlist" data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                        <i class="ion-ios-heart-outline"></i>
                                    </a>
                                </li>
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
                            <!-- @if($price->new_price != $price->old_price)
                                <span class="old">&#8360; {{ $price->old_price }}</span>
                            @endif -->
                            <span>&#8360; 
                                {{ $price->new_price }}
                            </span>
                        </div>
                        <div class="btn-block">
                            <!-- <a href="javascript:void(0)" class="addToCart btn btn-outlined btn-rounded" data-product-id="{{ $product->id }}" data-price-id="{{ $price->id }}">Add to Cart</a> -->
                            <a href="{{ route('product.show', $product->id)}}" class="btn btn-outlined btn-rounded">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<section class="product-list pbc-5 pb-4 pt-5 bg-light">
      <div class="container">
         <h6 class="mt-1 mb-0 float-right"><a href="#">View All Items</a></h6>
         <h4 class="mt-0 mb-3 text-dark font-weight-normel">Best Selling Items</h4>
         <div class="row">
            @foreach($frequently as $product)
            @php($price = $product->price())
            <div class="col-6 col-md-3">
               <div class="card list-item bg-white rounded overflow-hidden position-relative shadow-sm">
                  <span class="like-icon"><a  hhref="javascript:void(0)" data-product-id="{{ $product->id }}">  <i class="icofont icofont-heart"></i></a></span>
                  <a  href="{{ route('product.show', $product->id)}}">
                     <span class="badge badge-danger">NEW</span>
                     <img src="img/item/1.jpg" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                     <h6 class="card-title mb-1">Floret Printed Ivory Skater Dress</h6>
                     <div class="stars-rating"><i class="icofont icofont-star active"></i><i
                           class="icofont icofont-star active"></i><i class="icofont icofont-star active"></i><i
                           class="icofont icofont-star active"></i><i class="icofont icofont-star"></i> <span>613</span>
                     </div>
                     <p class="mb-0 text-dark">$135.00 <span class="text-black-50"><del>{{ $price->title }}</del></span></p>
                  </div>
               </div>
            </div>
           
            @endforeach
         </div>
      </div>
      </div>
   </section>