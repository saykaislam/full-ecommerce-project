@extends('frontend.layouts.master')
@section('title','Product Details')
@push('css')
    <script src="https://kit.fontawesome.com/624bf423b0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/product_details.css')}}">
@endpush
@section('content')

    {{--    <!-- breadcrumb -->--}}
    {{--    <div class="full-row bg-light py-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row text-secondary">--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <h3 class="mb-2 text-secondary">Product Details</h3>--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <nav aria-label="breadcrumb" class="d-flex justify-content-sm-end align-items-center h-100">--}}
    {{--                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">--}}
    {{--                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home me-1"></i>Home</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="breadcrumb-item active" aria-current="page">Prodcut Details</li>--}}
    {{--                        </ol>--}}
    {{--                    </nav>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- breadcrumb -->--}}

    <div class="full-row" style="background-color: #fff;">
        <div class="container">
            <div class="row single-product-wrapper" style="position: relative;">
                <div class="quickView-preloader text-center"
                     style="padding-top: 20px; padding-bottom: 20px; display: none; position: absolute; top: 50%">
                    <img src="{{asset('frontend/assets/img/loading2.gif')}}" width="5%">
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="product-images">
                        <div class="images-inner">
                            <div
                                class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;">
                                <figure class="woocommerce-product-gallery__wrapper">
                                    <div class="bg-light">
                                        <img id="single-image-zoom" src="{{url($detailedProduct->thumbnail_img)}}"
                                             alt="Thumb Image"
                                             data-zoom-image="{{url($detailedProduct->thumbnail_img)}}"/>
                                    </div>

                                    <div id="gallery_09" class="product-slide-thumb">
                                        @foreach($photos as $photo)
                                            <a class="" href="#" data-image="{{url($photo)}}"
                                               data-zoom-image="{{url($photo)}}">
                                                <img src="{{url($photo)}}" alt="Thumb Image" width="108" height="108"/>
                                            </a>
                                        @endforeach
                                        {{--                                        <a class="active" href="#" data-image="{{asset('frontend/assets/images/products/squire-270.png')}}" data-zoom-image="{{asset('frontend/assets/images/products/squire-270.png')}}">--}}
                                        {{--                                            <img src="{{asset('frontend/assets/images/products/squire-270.png')}}" alt="Thumb Image" />--}}
                                        {{--                                        </a>--}}
                                        {{--                                        <a href="#" data-image="{{asset('frontend/assets/images/products/squire-271.png')}}" data-zoom-image="{{asset('frontend/assets/images/products/squire-271.png')}}">--}}
                                        {{--                                            <img src="{{asset('frontend/assets/images/products/squire-271.png')}}" alt="Thumb Image" />--}}
                                        {{--                                        </a>--}}
                                        {{--                                        <a href="#" data-image="{{asset('frontend/assets/images/products/squire-272.png')}}" data-zoom-image="{{asset('frontend/assets/images/products/squire-272.png')}}">--}}
                                        {{--                                            <img src="{{asset('frontend/assets/images/products/squire-272.png')}}" alt="Thumb Image" />--}}
                                        {{--                                        </a>--}}
                                    </div>
                                </figure>
                                {{--                                <figure class="woocommerce-product-gallery__wrapper">--}}
                                {{--                                    <div class="bg-light">--}}
                                {{--                                        <img id="single-image-zoom"--}}
                                {{--                                             src="{{asset('frontend/assets/images/products/squire-269.png')}}"--}}
                                {{--                                             alt="Thumb Image"--}}
                                {{--                                             data-zoom-image="frontend/assets/images/products/squire-269.png"/>--}}
                                {{--                                    </div>--}}

                                {{--                                    <div id="gallery_09" class="product-slide-thumb">--}}
                                {{--                                        <a class="active" href="#" data-image="{{asset('frontend/assets/images/products/squire-269.png')}}"--}}
                                {{--                                           data-zoom-image="frontend/assets/images/products/squire-269.png">--}}
                                {{--                                            <img src="{{asset('frontend/assets/images/products/squire-269.png')}}"--}}
                                {{--                                                 alt="Thumb Image"/>--}}
                                {{--                                        </a>--}}
                                {{--                                    </div>--}}
                                {{--                                </figure>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-7">
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
                            <h1 class="product_title entry-title">{{$detailedProduct->name}}</h1>
                            <div class="woocommerce-product-rating">
                                <div class="fancy-star-rating">
                                    <div class="rating-wrap">
                                        <div class="star-rating star-rating-sm mt-1">
                                            {{ renderStarRating($detailedProduct->rating) }}
                                        </div>
                                    </div>
                                    <div class="rating-counts-wrap">
                                        <a href="#reviews" class="bigbazar-rating-review-link" rel="nofollow"> <span
                                                class="rating-counts">({{$detailedProduct->rating > 0 ? $detailedProduct->rating : 0}} of 5)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <span class="d-inline">Category: <a class=""
                                                                    href="#"> {{$detailedProduct->category->name}}  </a></span>
                            </div>
                            <div class="">
                                <span class="d-inline">Brand:  <a class=""
                                                                  href="#"> {{$detailedProduct->brand->name}} </a></span>
                            </div>
                            @if(home_price($detailedProduct->id) != home_discounted_price($detailedProduct->id))
                                <div class="">
                                    Price:
                                    <span>
                                        <del class="text-danger text-bold font-500">
                                            <strong class="text-danger">৳{{ home_price($detailedProduct->id) }}</strong>
                                        </del>
                                    </span>
                                </div>
                                <div class="">
                                    Discounted Price:
                                    <span>
                                        <span class="text-danger text-bold font-500">
                                            <strong
                                                class="text-danger">৳{{ home_discounted_price($detailedProduct->id) }}</strong>
                                        </span>
                                    </span>
                                </div>
                        </div>
                        @else
                            <div class="">
                                Price:
                                <span>
                                    <span class="text-danger text-bold font-500">
                                        <strong
                                            class="text-danger">৳{{ home_discounted_price($detailedProduct->id) }}</strong>
                                    </span>
                                </span>
                            </div>
                        @endif
                        {{--<div class="product-price-discount"><span class="on-sale"><span>19</span>% Off</span>--}}
                    </div>
                    @php
                        $qty = 0;
                        if($detailedProduct->variant_product){
                            foreach ($detailedProduct->stocks as $key => $stock) {
                                $qty += $stock->qty;
                            }
                        }
                        else{
                            $qty = $detailedProduct->current_stock;
                        }
                    @endphp

                    @if($qty > 0)
                        <div class="stock-availability in-stock text-success font-500">In Stock</div>
                    @else
                        <div class="stock-availability in-stock text-danger font-500">Stock Out</div>
                    @endif

                    <form id="option-choice-form" class="variations_form cart kapee-swatches-wrap" action="#"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $detailedProduct->id }}">
                        @php
                            $colors = json_decode($detailedProduct->colors);
                        @endphp
                        <table class="variations">
                            @if (count(json_decode($detailedProduct->colors)) > 0)
                                <div class="row no-gutters">
                                    <div class="col-2 col-sm-2 col-xs-2 col-md-1">
                                        <div class="product-description-label mt-2">{{ __('Color')}}:</div>
                                    </div>
                                    <div class="col-10">
                                        <ul class="list-inline checkbox-color mb-2">
                                            @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                                <li>
                                                    <input type="radio" id="{{ $detailedProduct->id }}-color-{{ $key }}"
                                                           name="color" value="{{ $color->code }}"
                                                           @if($key == 0) checked @endif>
                                                    <label style="background: {{ $color->code }};"
                                                           for="{{ $detailedProduct->id }}-color-{{ $key }}"
                                                           data-toggle="tooltip"></label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if ($detailedProduct->choice_options != null)
                                @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)

                                    <div class="row no-gutters">
                                        <div class="col-2 col-sm-2 col-xs-2 col-md-1 ">
                                            <div
                                                class="product-description-label mt-2 ">{{ \App\Model\Attribute::find($choice->attribute_id)->name }}

                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                                @foreach ($choice->values as $key => $value)
                                                    <li>
                                                        <input type="radio"
                                                               id="{{ $choice->attribute_id }}-{{ $value }}"
                                                               name="attribute_id_{{ $choice->attribute_id }}"
                                                               value="{{ $value }}" @if($key == 0) checked @endif>
                                                        <label
                                                            for="{{ $choice->attribute_id }}-{{ $value }}">{{ $value }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                @endforeach
                            @endif
                        </table>
                        <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                            <div class="col-2">
                                <div class="product-description-label">{{ __('Total Price')}}:</div>
                            </div>
                            <div class="col-10">
                                <div class="product-price">
                                    <strong id="chosen_price">

                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="single_variation_wrap no-gutters">
                            <div class="quantity">
                                <input type="number" min="1" max="9" step="1" value="1" name="quantity"
                                       data-field="quantity">
                            </div>
                            <div
                                class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
                                @if ($qty > 0)
                                    <button type="button"
                                            class="single_add_to_cart_button button alt single_add_to_cart_ajax_button"
                                            onclick="addToCartGlobal()">
                                        Add to cart
                                    </button>
                                    <div class="bigbazar-quick-buy">
                                        <button type="button"
                                                class="bigbazar_quick_buy_button bigbazar_quick_buy_variable bigbazar_quick_buy_58"
                                                onclick="buyNow()">Buy Now
                                        </button>
                                    </div>
                                @else
                                    <button
                                        class="bigbazar_quick_buy_button bigbazar_quick_buy_variable bigbazar_quick_buy_58 bg-danger"
                                        disabled>Out Of Stock!
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="yith-wcwl-add-to-wishlist wishlist-fragment mt-1">
                        <div class="whishlist-button">
                            <a class="add_to_wishlist mr-20" href="#">Add to Wishlist</a> <a href="#">Compare</a>
                        </div>
                    </div>
                    <div class="product_meta"><span class="sku_wrapper">SKU: <span class="sku">N/A</span></span>

                    </div>
                    <div class="bigbazar-wc-message"></div>
                </div>
            </div>
        </div>
    </div>

    <!--==================== Product Description Section Start ====================-->
    <div class="full-row" style="background-color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-head border-bottom">
                        <div class="woocommerce-tabs wc-tabs-wrapper ps-0">
                            <ul class="nav nav-pills wc-tabs" id="pills-tab-one" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-description-one-tab" data-bs-toggle="pill"
                                       href="#pills-description-one" role="tab" aria-controls="pills-description-one"
                                       aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-information-one-tab" data-bs-toggle="pill"
                                       href="#pills-information-one" role="tab" aria-controls="pills-information-one"
                                       aria-selected="true">Additional Information</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-reviews-one-tab" data-bs-toggle="pill"
                                       href="#pills-reviews-one" role="tab" aria-controls="pills-reviews-one"
                                       aria-selected="true">Reviews(3)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="woocommerce-tabs wc-tabs-wrapper ps-0 mt-0">
                        <div class="tab-content" id="pills-tabContent-one">
                            <div
                                class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description"
                                id="pills-description-one" role="tabpanel" aria-labelledby="pills-description-one-tab">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="my-3">Product Description</h2>
                                        <p class="text-justify">{!! $detailedProduct->description !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-information-one" role="tabpanel"
                                 aria-labelledby="pills-information-one-tab">
                                <div class="row">
                                    <div class="col-8">
                                        <h2 class="my-3">Additional Information</h2>
                                        <table class="woocommerce-product-attributes shop_attributes">
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_color">
                                                <th class="woocommerce-product-attributes-item__label">Weight :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>150 g</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">Dimensions :</th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>16 × 10 × 20 cm</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">Item Height :
                                                </th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>18 Millimeters</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">Item model number
                                                    :
                                                </th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>MF841HN/A</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">Hard Disk
                                                    Technology :
                                                </th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>Solid State Drive</p>
                                                </td>
                                            </tr>
                                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
                                                <th class="woocommerce-product-attributes-item__label">Hardware Platform
                                                    :
                                                </th>
                                                <td class="woocommerce-product-attributes-item__value">
                                                    <p>Mac</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-reviews-one" role="tabpanel"
                                 aria-labelledby="pills-reviews-one-tab">
                                <div class="row">
                                    <div class="col-8">
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title my-3">(3) Customer Review</h2>
                                            <ol class="commentlist">
                                                <li>
                                                    <div class="comment_container">
                                                        <img src="{{asset('frontend/assets/images/avatar.png')}}"
                                                             class="avatar" alt="Image not found!">
                                                        <div class="comment-text">
                                                            <div class="star-rating" role="img"
                                                                 aria-label="Rated 5 out of 5">
                                                                <i class="flaticon-star-1"></i>
                                                                <i class="flaticon-star-1"></i>
                                                                <i class="flaticon-star-1"></i>
                                                                <i class="flaticon-star-1"></i>
                                                                <i class="flaticon-star-1"></i>
                                                            </div>
                                                            <p class="meta">
                                                                <strong
                                                                    class="woocommerce-review__author">Admin </strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <span class="woocommerce-review__published-date">September 26, 2019</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Aliquam nisi class massa dictum, quam morbi interdum
                                                                    commodo inceptos molestie cum euismod ut Libero
                                                                    lacus fames feugiat. Torquent sed dis litora velit
                                                                    justo interdum non iaculis libero
                                                                    porta orci. Egestas Turpis class, sed feugiat sed
                                                                    euismod magnis viverra.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <h5 id="reply-title" class="comment-reply-title my-20">Add A
                                                        Review</h5>
                                                    <form action="#" method="post" id="commentform"
                                                          class="comment-form">
                                                        <div class="row g-3">
                                                            <div class="col-6">
                                                                <label for="comment">Your Name<span
                                                                        class="required">*</span></label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="comment">Your Email<span
                                                                        class="required">*</span></label>
                                                                <input type="email" class="form-control">
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="comment-form-comment">
                                                                    <label for="comment">Your review<span
                                                                            class="required">*</span></label>
                                                                    <textarea id="comment" name="comment" cols="45"
                                                                              rows="8" required=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-submit">
                                                                    <button name="submit" type="submit" id="submit"
                                                                            class="btn btn-primary">Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="_wp_unfiltered_html_comment_disabled"
                                                               name="_wp_unfiltered_html_comment" value="0bbb6c8c11">
                                                    </form>
                                                </div>
                                                <!-- #respond -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Product Description Section En ====================-->

    <!--==================== Related Products Section Start ====================-->
    @if($relatedProducts->count() > 0)
        <div class="full-row pb-5" style="background-color: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-head border-bottom d-flex justify-content-between align-items-end">
                            <div class="d-flex section-head-side-title">
                                <h4 class="font-600 text-dark mb-0">Related Products</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="five-carousel owl-carousel dot-disable owl-mx-5 nav-arrow-middle-show e-title-hover-primary e-image-bg-light e-hover-image-zoom e-btn-set-four cart-slide-left e-info-center">
                            @foreach($relatedProducts as $product)
                                {{productsComponentFive($product)}}
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <!--==================== Related Products Section End ====================-->

@endsection
@push('js')
    <script src="{{asset('frontend/assets/js/jquery.elevatezoom.js')}}"></script>
    <script>
        $(document).ready(function () {
            /*$('#share').jsSocials({
                showLabel: false,
                showCount: false,
                shares: ["email", "twitter", "facebook", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
            });*/
            getVariantPrice();
        });
        //initiate the plugin and pass the id of the div containing gallery images
        $("#single-image-zoom").elevateZoom({
            gallery: 'gallery_09',
            zoomType: "inner",
            cursor: "crosshair",
            galleryActiveClass: 'active',
            imageCrossfade: true,
            loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
        });
        //pass the images to Fancybox
        $("#single-image-zoom").bind("click", function (e) {
            var ez = $('#single-image-zoom').data('elevateZoom');
            $.fancybox(ez.getGalleryList());
            return false;
        });
    </script>
@endpush
