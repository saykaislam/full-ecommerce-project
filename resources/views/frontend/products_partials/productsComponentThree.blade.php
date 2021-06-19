<div class="col">
    <div class="product type-product">
        <div class="product-wrapper" style="border: 1px solid #ddd; background-color: #ffffff!important; border-radius: 5px;">
            <div class="product-image" style="border-radius: 5px 0 5px 5px;">
                <a href="{{route('product-details',$product->slug)}}" class="woocommerce-LoopProduct-link"><img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.jpg') }}"  data-src=" {{url($product->thumbnail_img)}} " alt="{{$product->name}}"></a>
                <div class="hover-area">
                    @if($product->variant_product == 0)
                        @if($product->current_stock > 0)
                            <div class="cart-button">
                                <a  onclick="addToCart('{{$product->id}}', 0 )" class="button add_to_cart_button" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Add to Cart" aria-label="Add to Cart">Add to Cart</a>
                            </div>
                        @else
                            <div class="cart-button">
                                <a  class="text-danger button add_to_cart_button" >Out Of Stock!</a>
                            </div>
                        @endif
                    @else
                        <div class="cart-button">
                            <a class="quickview-btn button add_to_cart_button" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View" onclick="showQuickViewModal({{ $product->id }})">Add to cat</a>
                        </div>
                    @endif
                    <div class="wishlist-button">
                        <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist" onclick="addToWishList({{ $product->id }})">Wishlist</a>
                    </div>
                    <div class="compare-button">
                        <a class="compare button" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Compare" aria-label="Compare" onclick="addToCompare({{ $product->id }})">Compare</a>
                    </div>
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-title"><a href="{{route('product-details',$product->slug)}}">{{Str::limit($product->name,30)}}</a></h3>
                <div class="product-price">
                    <div class="price">
                        <ins>৳{{ home_discounted_base_price($product->id) }}</ins>
                        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                            <del>৳{{ home_base_price($product->id) }}</del>
                            @if($product->discount_type == 'percent')
                                <div class="on-sale"><span>{{$product->discount}}</span><span>% off</span></div>
                            @endif
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
                    <div class="sold-items">
                        Sold: <span>{{$product->num_of_sale}}</span> <span>Pices</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
