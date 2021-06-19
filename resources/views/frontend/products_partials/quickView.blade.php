<script src="https://kit.fontawesome.com/624bf423b0.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('frontend/assets/css/product_details.css')}}">
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<div class="row">
    <div class="col-md-6">
        <div class="e-hover-image-zoom e-image-bg-light">
            <div class="product type-product">
                <div class="product-wrapper">
                    <div class="product-image">
                        <a href="{{route('product-details',$product->slug)}}" class="woocommerce-LoopProduct-link"><img class="lazyload" src="{{ asset('frontend/assets/images/placeholder.jpg') }}" data-src="{{url($product->thumbnail_img)}}" alt="Product Image"></a>
                        <ul class="position-absolute quick-meta">
                            <li><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Wishlist" aria-label="Wishlist" onclick="addToWishList({{ $product->id }})"><i class="flaticon-like flat-mini"></i></a></li>
                            <li><a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Share" aria-label="Share"><i class="flaticon-share flat-mini"></i></a></li>
                        </ul>
{{--                        <div class="product-labels">--}}
{{--                            <div class="shape1-badge3"><span>New</span></div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="e-hover-image-zoom e-image-bg-light">
            <div class="product type-product">
                <div class="product-wrapper">
                    <div class="product-info">
                        <div class="summary entry-summary">
                            <div class="summary-inner">
                                {{--<div class="entry-breadcrumbs">
                                    <nav class="breadcrumb-divider-slash" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                            <li class="breadcrumb-item"><a href="#">Men</a></li>
                                            <li class="breadcrumb-item"><a href="#">T-Shirts</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Men Hooded Navy Blue & Grey T-Shirt</li>
                                        </ol>
                                    </nav>
                                </div>--}}
                                <h1 class="product_title entry-title" >{{$product->name}}</h1>
                                <div class="woocommerce-product-rating">
                                    <div class="fancy-star-rating">
                                        <div class="rating-wrap">
                                            <div class="star-rating star-rating-sm mt-1">
                                                {{ renderStarRating($product->rating) }}
                                            </div>
                                        </div>
                                        <div class="rating-counts-wrap">
                                            <a href="#reviews" class="bigbazar-rating-review-link" rel="nofollow"> <span
                                                    class="rating-counts">({{$product->rating > 0 ? $product->rating : 0}} of 5)</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <span class="d-inline">Category: <a class="" href="#"> {{$product->category->name}}  </a></span>
                                </div>
                                <div class="">
                                    <span class="d-inline">Brand:  <a class="" href="#"> {{$product->brand->name}} </a></span>
                                </div>
                                @if(home_price($product->id) != home_discounted_price($product->id))
                                    <div class="">
                                        Price:
                                        <span>
                                        <del class="text-danger text-bold font-500">
                                            <strong class="text-danger">৳{{ home_price($product->id) }}</strong>
                                        </del>
                                    </span>
                                    </div>
                                    <div class="">
                                        Discounted Price:
                                        <span>
                                        <span class="text-danger text-bold font-500">
                                            <strong class="text-danger">৳{{ home_discounted_price($product->id) }}</strong>
                                        </span>
                                    </span>
                                    </div>
                            </div>
                            @else
                                <div class="">
                                    Price:
                                    <span>
                                    <span class="text-danger text-bold font-500">
                                        <strong class="text-danger">৳{{ home_discounted_price($product->id) }}</strong>
                                    </span>
                                </span>
                                </div>
                            @endif
                            {{--<div class="product-price-discount"><span class="on-sale"><span>19</span>% Off</span>--}}
                        </div>
                        @php
                            $qty = 0;
                            if($product->variant_product){
                                foreach ($product->stocks as $key => $stock) {
                                    $qty += $stock->qty;
                                }
                            }
                            else{
                                $qty = $product->current_stock;
                            }
                        @endphp

                        @if($qty > 0)
                            <div class="stock-availability in-stock text-success font-500">In Stock</div>
                        @else
                            <div class="stock-availability in-stock text-danger font-500">Stock Out</div>
                        @endif
                        <form id="option-choice-form" class="variations_form cart kapee-swatches-wrap" action="#" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            @php
                                $colors = json_decode($product->colors);
                            @endphp
                            <table class="variations">
                                @if (count(json_decode($product->colors)) > 0)
                                    <div class="row no-gutters">
                                        <div class="col-2 col-sm-2 col-xs-2 col-md-1">
                                            <div class="product-description-label mt-2">{{ __('Color')}}:</div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-color mb-2">
                                                @foreach (json_decode($product->colors) as $key => $color)
                                                    <li>
                                                        <input type="radio" id="{{ $product->id }}-color-{{ $key }}" name="color" value="{{ $color->code }}" @if($key == 0) checked @endif>
                                                        <label style="background: {{ $color->code }};" for="{{ $product->id }}-color-{{ $key }}" data-toggle="tooltip"></label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                @if ($product->choice_options != null)
                                    @foreach (json_decode($product->choice_options) as $key => $choice)

                                        <div class="row no-gutters">
                                            <div class="col-2 col-sm-2 col-xs-2 col-md-1 ">
                                                <div class="product-description-label mt-2 ">{{ \App\Model\Attribute::find($choice->attribute_id)->name }}:</div>
                                            </div>
                                            <div class="col-10">
                                                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                                    @foreach ($choice->values as $key => $value)
                                                        <li>
                                                            <input type="radio" id="{{ $choice->attribute_id }}-{{ $value }}" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key == 0) checked @endif>
                                                            <label for="{{ $choice->attribute_id }}-{{ $value }}" style="margin-left: 14px;">{{ $value }}</label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            </table>
                            <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                <div class="col-3">
                                    <div class="product-description-label">{{ __('Total Price')}}:</div>
                                </div>
                                <div class="col-9">
                                    <div class="product-price">
                                        <strong id="chosen_price">

                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="single_variation_wrap no-gutters">
                                <div class="quantity">
                                    <input type="number" min="1" max="9" step="1" value="1" name="quantity" data-field="quantity">
                                </div>
                                <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
                                    @if ($qty > 0)
                                        <button type="button"
                                                class="single_add_to_cart_button button alt single_add_to_cart_ajax_button"
                                                onclick="addToCartGlobal()">
                                            Add to cart
                                        </button>
                                        <div class="bigbazar-quick-buy">
                                            <button type="button"
                                                    class="bigbazar_quick_buy_button bigbazar_quick_buy_variable bigbazar_quick_buy_58"
                                                    onclick="buyNow()" >Buy Now
                                            </button>
                                        </div>
                                    @else
                                        <button
                                            class="bigbazar_quick_buy_button bigbazar_quick_buy_variable bigbazar_quick_buy_58 bg-danger" disabled>Out Of Stock!
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <h5 class="text-secondary my-3">Description</h5>
                        <p>{!! Str::limit($product->description,150) !!}</p>
{{--                        <div class="short-description d-flex">--}}
{{--                            <span class="me-4"><b>Highlights:</b></span>--}}
{{--                            <div class="short-description">--}}
{{--                                <ul class="list-style-tick">--}}
{{--                                    <li>Regular Fit.</li>--}}
{{--                                    <li>Full sleeves.</li>--}}
{{--                                    <li>Machine wash, tumble dry.</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        {{--<div class="hover-area">
                            <div class="compare-button">
                                <a href="#">Compare</a>
                            </div>
                            <div class="cart-button">
                                <a onclick="addToCart('{{$product->id}}', 0 )">Add to Cart</a>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#option-choice-form input').on('change', function(){
        getVariantPrice();
    });
</script>
