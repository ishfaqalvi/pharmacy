<div class="modal fade modal-quick-view" id="productPreview" tabindex="-1" role="dialog" aria-labelledby="quickModal"
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