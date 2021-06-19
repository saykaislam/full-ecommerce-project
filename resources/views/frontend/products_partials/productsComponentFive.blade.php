<div class="item">
    <div class="product type-product">
        <div class="product-wrapper">
            <div class="product-image">
                <a href="{{route('product-details',$product->slug)}}" class="woocommerce-LoopProduct-link">
                    <img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.jpg') }}" data-src=" {{url($product->thumbnail_img)}} " alt="{{$product->name}}">
                </a>

                <div class="hover-area">
                    <div class="cart-button">
                        <a href="#" class="button add_to_cart_button" data-bs-toggle="tooltip"
                           data-bs-placement="right" title=""
                           data-bs-original-title="Add to Cart" aria-label="Add to Cart">Add to
                            Cart</a>
                    </div>
                    <div class="wishlist-button">
                        <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip"
                           data-bs-placement="right" title=""
                           data-bs-original-title="Add to Wishlist"
                           aria-label="Add to Wishlist" onclick="addToWishList({{ $product->id }})">Wishlist</a>
                    </div>
                    <div class="compare-button">
                        <a class="compare button" href="#" data-bs-toggle="tooltip"
                           data-bs-placement="right" title="" data-bs-original-title="Compare"
                           aria-label="Compare" onclick="addToCompare({{ $product->id }})">Compare</a>
                    </div>
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-title"><a href="{{route('product-details',$product->slug)}}">{{$product->name}}</a>
                </h3>
                <div class="product-price">
                    <div class="price">
                        <ins>৳ {{ home_discounted_base_price($product->id) }}</ins>
                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                        <del>৳ {{ home_base_price($product->id) }}</del>
                        @endif
                    </div>
                </div>
                <div class="shipping-feed-back">
                    <div class="star-rating">
                        <div class="rating-wrap">
                            <div class="star-rating star-rating-sm mt-1">
                                {{ renderStarRating($product->rating) }}
                            </div>
                        </div>
                        <div class="rating-counts-wrap">
                            <a href="#">({{$product->rating > 0 ? $product->rating : 0}} of 5)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
