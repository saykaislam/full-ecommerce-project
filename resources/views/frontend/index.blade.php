@extends('frontend.layouts.master')
@section('title','Home')
@section('content')
    <div class="full-row py-2">
        <div class="container">
            <div class="row g-3">
                <div class="col-xl-9">
                    <div id="slider" style="width:1200px; margin:0 auto;margin-bottom: 0px;">
                        <!-- Slide 1-->
                        @foreach(sliders() as $slider)
                            <div class="ls-slide" data-ls="duration:8000; transition2d:4; kenburnsscale:1.2;">
                                <img width="1920" height="1170" class="ls-l lazyload"
                                     src="{{ asset('frontend/assets/images/placeholder.jpg') }}"
                                     data-src="{{asset('uploads/sliders/'.$slider->image)}}" alt=""
                                     style="top:50%; left:50%; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:100%;"
                                     data-ls="showinfo:1; durationin:2000; easingin:easeOutExpo; scalexin:1.5; scaleyin:1.5; position:fixed;">

                                <p style="width:400px; font-size:40px; line-height:60px; top:38%; left:200px; white-space:normal;"
                                   class="ls-l higlight-font font-500 ls-hide-phone text-white"
                                   data-ls="offsetyin:150; durationin:700; delayin:500; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; parallaxlevel:0;">
                                    {{ $slider->title}}
                                </p>
                                <p style="font-size:15px; letter-spacing: 2px; line-height:20px; top:23%; left:200px;"
                                   class="ls-l ordenery-font text-white font-400 ls-hide-phone"
                                   data-ls="offsetyin:150; durationin:700; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; parallaxlevel:0;">
                                    SALE UPTO 30%</p>

                                <p style="width:580px; font-weight:400; font-size:17px; line-height:30px; top:58%; left:220px; white-space:normal;"
                                   class="ls-l ls-hide-phone text-white ordenery-font"
                                   data-ls="offsetxin:150; durationin:700; easingin:easeOutBack; rotatexin:20; scalexin:1; offsetyout:600; durationout:400; parallaxlevel:0; delayin:900;">
                                    Free Shipping<br>Buy Minimum $50</p>

                                <div style="width:3px; height:60px; border-radius:0; top:58%; left:200px;"
                                     class="ls-l ls-hide-phone bg-primary"
                                     data-ls="offsetxin:100; easingin:easeOutBack; delayin:700; durationout:400; offsetxout:-20; parallax:false; parallaxlevel:1;"></div>

                                <a style="" class="ls-l ls-hide-phone" href="#" target="_self"
                                   data-ls="offsetyin:150; durationin:700; delayin:1200; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; hover:true; hoveropacity:1; hoverbgcolor:#e74c3c ; parallaxlevel:0;">
                                    <p style="cursor:pointer;padding-top:8px; padding-bottom:8px; font-weight: 500; font-size:14px; top:72%; left:200px; background:#45b138; color:#ffffff; padding-right:25px; padding-left:25px; line-height:28px;"
                                       class=""><a href="">SHOP NOW</a></p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="row row-cols-xl-1 row-cols-md-2 row-cols-1 g-3">
                        @foreach(\App\Model\Banner::where('position',1)->where('published',1)->get() as $banner)
                            <div class="col">
                                <div class="banner-wrapper hover-img-zoom banner-one custom-class-114">
                                    <div class="banner-image overflow-hidden transation"><img class="lazyload"
                                                                                              src="{{ asset('frontend/assets/images/placeholder.jpg') }}"
                                                                                              data-src="{{url($banner->photo)}}"
                                                                                              alt="Banner Image"></div>
                                    <div class="banner-content y-center position-absolute">
                                        {{--                                    <div class="text-uppercase font-600 font-fifteen mb-2"><a href="#" class="text-extra1">New Arrival</a></div>--}}
                                        {{--                                    <h4><a href="#" class="text-white">{{$offer->title}}</a></h4>--}}
                                        {{--                                    <a href="#" class="btn-link mt-4 text-primary">Shop Now</a>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Banner Section End ====================-->

    <!--==================== Top Category This Week Section Start ====================-->
    <div class="full-row bg-light pt-40 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-10">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="font-large text-dark mb-0">Top Category This Week</h4>
                            <span class="font-500 font-fifteen ms-3">Choose what you looking for</span>
                        </div>
                        <a href="{{route('products')}}"
                           class="btn-link higlight-font text-general hover-text-primary transation-this">View All
                            Category</a>
                    </div>
                </div>
                <div class="col-12">
                    <div
                        class="owl-carousel eight-carousel dot-disable nav-arrow-middle-show owl-mx-20 e-title-dark e-title-hover-primary e-image-bg-light e-image-pill border border-light bg-white short-info p-30">
                        @foreach(home_category() as $homeCat)
                            <div class="item">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <div class="product type-product">
                                            <div class="product-wrapper">
                                                <div class="product-image">
                                                    <a href="{{route('products.category',$homeCat->category->slug)}}"><img
                                                            class="lazyload"
                                                            src="{{ asset('frontend/assets/images/placeholder.jpg') }}"
                                                            data-src="{{asset('uploads/categories/'.$homeCat->category->icon)}}"
                                                            alt="{{$homeCat->category->name}}"></a>
                                                </div>
                                                <div class="product-info text-center">
                                                    <h6 class="product-title"><a
                                                            href="{{route('category.products',$homeCat->category->slug)}}">{{$homeCat->category->name}}</a>
                                                    </h6>
                                                    <a href="#"
                                                       class="strok">({{ category_product_count($homeCat->category->id) }}
                                                        )</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Shop By Depeartment Section End ====================-->

    <!--==================== Flash Deal Today Section Start ====================-->
    @if( !empty($flashDeal) && $flashDeal->featured == 1  && strtotime(date('d-m-Y')) >= $flashDeal->start_date && strtotime(date('d-m-Y')) <= $flashDeal->end_date)
        <div class="full-row bg-light">
            <div class="container">
                <div class="col-12">
                    <div class="section-head d-flex align-items-sm-center flex-column flex-sm-row">
                        <h4 class="text-dark mb-0 mr-20 xs-mb-10">{{$flashDeal->title}}</h4>
                        <div class="deal-out-time">
                            <span class="mr-10">Ends In:</span>
                            <div class="bg-primary py-2">
                                <div class="time-count type-three"
                                     data-countdown="{{date('m/d/Y', $flashDeal->end_date)}}"></div>
                            </div>
                        </div>
                        <a href="{{route('products')}}"
                           class="ml-auto btn-link higlight-font text-dark hover-text-primary transation-this d-none d-sm-block">View
                            All</a>
                    </div>
                </div>
                <div class="col-12">
                    <div
                        class="five-carousel owl-carousel outer-bg-white owl-outer-border-light nav-arrow-middle-show dot-active-one deal-two e-bg-white hidden-hover-area e-hover-border-one">
                        @foreach($flashDealProducts as $flashDealProduct)
                            {{productsComponentFour($flashDealProduct->product)}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--==================== Flash Deal Today Section End ====================-->

    <!--==================== Banner Section Start ====================-->
    <div class="full-row pt-30 pb-0 bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="banner-wrapper hover-img-zoom banner-twelve bg-primary">
                        <div class="banner-image overflow-hidden transation"><img
                                src="{{asset('frontend/assets/images/banner/37.png')}}" alt="Banner Image"></div>
                        <div class="banner-content y-center w-100 position-absolute">
                            <div class="row align-items-center h-100">
                                <div class="col-xl-1 offset-sm-1 col-lg-2 col-md-2 col-sm-3">
                                    <div class="text-dark">
                                        <span class="d-block h6">Save Up to</span>
                                        <span class="h2 font-700">30%</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-7 col-sm-7">
                                    <h4 class="mb-3"><a href="#" class="text-secondary">Organic Fruit and Vegetable
                                            Daily Special Offer fresh food</a></h4>
                                    <span class="h6">With out deverse range of 100% fresh food</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Banner Section End ====================-->

    <!--==================== Today's Deals Food Section Start ====================-->

    @if($todaysDeals->count() > 0)
        <div class="full-row bg-light pb-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="bg-white border-light border">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-head d-flex justify-content-between align-items-center p-20">
                                        <h4 class="font-500 text-dark mb-0 mr-auto">Today's Deals</h4>
                                        <a href="{{route('all.todays_deal.products')}}"
                                           class="btn-link higlight-font transation-this">View All</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="woocommerce-tabs wc-tabs-wrapper ps-0 mt-0">
                                        <div class="tab-content icon-hover-primary" id="pills-tabContent-one">
                                            <div
                                                class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description"
                                                id="pills-fruit-one" role="tabpanel"
                                                aria-labelledby="pills-fruit-one-tab">
                                                <div
                                                    class="owl-carousel five-carousel nav-arrow-middle-show dot-disable e-bg-white outer-bg-white owl-border-one hidden-hover-area e-hover-border-one border-top border-light">
                                                    @foreach($todaysDeals as $todaysDeal)
                                                        {{productsComponent($todaysDeal)}}
                                                    @endforeach
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
    @endif
    <!--====================Today's Deals Food Section End ====================-->

    <!--==================== Featured Food Section Start ====================-->
    @if($featuredProducts->count() > 0)
        <div class="full-row bg-light pb-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="bg-white border-light border">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-head d-flex justify-content-between align-items-center p-20">
                                        <h4 class="font-500 text-dark mb-0 mr-auto">Featured Products</h4>
                                        <a href="{{route('all.featured.products')}}"
                                           class="btn-link higlight-font transation-this">View All</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="woocommerce-tabs wc-tabs-wrapper ps-0 mt-0">
                                        <div class="tab-content icon-hover-primary" id="pills-tabContent-one">
                                            <div
                                                class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description"
                                                id="pills-fruit-one" role="tabpanel"
                                                aria-labelledby="pills-fruit-one-tab">
                                                <div
                                                    class="owl-carousel five-carousel nav-arrow-middle-show dot-disable e-bg-white outer-bg-white owl-border-one hidden-hover-area e-hover-border-one border-top border-light">
                                                    @foreach($featuredProducts as $featuredProduct)
                                                        {{productsComponent($featuredProduct)}}
                                                    @endforeach
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
    @endif
    <!--==================== Featured Food Section End ====================-->

    <!--==================== Banner Section Start ====================-->
    <div class="full-row pb-0 bg-light">
        <div class="container">
            <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-3">
                @foreach(\App\Model\Banner::where('position',2)->where('published',1)->get() as $banner)
                    <div class="col">
                        <div class="banner-wrapper hover-img-zoom banner-one custom-class-114">
                            <div class="banner-image overflow-hidden transation"><img class="lazyload"
                                                                                      src="{{ asset('frontend/assets/images/placeholder.jpg') }}"
                                                                                      data-src="{{url($banner->photo)}}"
                                                                                      alt="Banner Image" width="394"
                                                                                      height="234"></div>
                            <div class="banner-content y-center position-absolute">
                                <div class="text-uppercase font-400 font-fifteen mb-2"><a href="#" class="text-dark">Italian
                                        Salad</a></div>
                                <h5><a href="#" class="text-dark">We’re always in the mood for food</a></h5>
                                <div class="d-block text-dark h5 mb-1 mt-4">Only From <span
                                        class="text-white h4">$9.99</span></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--==================== Banner Section End ====================-->

    <!--==================== Product For You Section Start ====================-->
    @if($newProducts->count() > 0)
        <div class="full-row bg-light pb-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="bg-white border-light border-start">
                            <div class="row">
                                <div class="col-12">
                                    <div
                                        class="section-head d-flex align-items-center p-20 border border-light border-start-0">
                                        <h4 class="font-500 text-dark mb-0 mr-auto">Product For You</h4>
                                        <a href="{{route('all.product.list')}}"
                                           class="btn-link higlight-font transation-this">View All</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="row g-0 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 e-bg-white e-hover-shadow-one e-hover-wrapper-absolute e-border-one">
                                @foreach($newProducts as $newProduct)
                                    {{productsComponent($newProduct)}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--==================== Product For You Section End ====================-->

    <!--==================== Recomended Product Section Start ====================-->
    @if($bestSellerProducts->count() > 0)
        <div class="full-row bg-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="bg-white border-light border">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-head d-flex justify-content-between align-items-center p-20">
                                        <h4 class="text-dark mb-0">Best Sales Product</h4>
                                        <div class="woocommerce-tabs wc-tabs-wrapper ps-0 mt-0 align-self-end">
                                            <a href="{{route('all.best_sale.products')}}"
                                               class="btn-link higlight-font transation-this">View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="woocommerce-tabs wc-tabs-wrapper ps-0 mt-0">
                                        <div class="tab-content icon-hover-primary" id="pills-tabContent-three">
                                            <div
                                                class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description"
                                                id="pills-all-three" role="tabpanel"
                                                aria-labelledby="pills-all-three-tab">
                                                <div
                                                    class="owl-carousel single-carousel nav-arrow-middle-show dot-active-one owl-item-mb-5 outer-bg-white owl-mx-one owl-border-one border-top border-light">
                                                    <div class="item">
                                                        <div
                                                            class="row g-0 row-cols-xl-3 row-cols-md-2 row-cols-1 product-list e-bg-white show-hover-area hidden-hover-area e-hover-bg-light">
                                                            @foreach($bestSellerProducts as $bestSellerProduct)
                                                                {{productsComponentTwo($bestSellerProduct)}}
                                                            @endforeach
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
            </div>
        </div>
    @endif
    <!--==================== Recomended Product Section End ====================-->

    <!--==================== Service Info Section Start ====================-->
    <div class="full-row bg-light pt-30 pb-0">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 gy-3 gx-0 g-lg-0">
                <div class="col">
                    <div class="gray-right-line-one p-40 d-flex flex-column text-center bg-white">
                        <i class="flaticon-strawberry flat-medium text-extra1"></i>
                        <div class="mt-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">100%
                                    Natural Authentic</a></h5>
                            <div class="font-500">
                                <p>All of our farming product is completely natural.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gray-right-line-one p-40 d-flex flex-column text-center bg-white">
                        <i class="flaticon-shopping-online flat-medium text-extra1"></i>
                        <div class="mt-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">24h Online
                                    Order</a></h5>
                            <div class="font-500">
                                <p>All of our farming product is completely natural.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gray-right-line-one p-40 d-flex flex-column text-center bg-white">
                        <i class="flaticon-package flat-medium text-extra1"></i>
                        <div class="mt-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">Daily Best
                                    Deal</a></h5>
                            <div class="font-500">
                                <p>All of our farming product is completely natural.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="gray-right-line-one p-40 d-flex flex-column text-center bg-white">
                        <i class="flaticon-shopping-1 flat-medium text-extra1"></i>
                        <div class="mt-10">
                            <h5 class="mb-1"><a href="#" class="text-dark hover-text-primary transation-this">Friendly
                                    Members Program</a></h5>
                            <div class="font-500">
                                <p>All of our farming product is completely natural.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Service Info Section End ====================-->

    <!--==================== Recently Viewed Product Section Start ====================-->
    <div class="full-row bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-head d-flex justify-content-between align-items-center mb-20">
                        <h4 class="text-dark mb-0">Recently Viewed Product</h4>
                    </div>
                </div>
                <div class="col-12">
                    <div
                        class="owl-carousel ten-carousel nav-arrow-middle-show dot-disable px-30 py-20 owl-mx-one border border-light bg-white">
                        <div class="item bg-white">
                            <a href="#"></a><img src="{{asset('frontend/assets/images/products/squire-153.png')}}"
                                                 alt="Product Image">
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-125.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-159.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-144.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-147.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-139.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-138.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-154.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="{{asset('frontend/assets/images/products/squire-149h.png')}}"
                                             alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="assets/images/products/squire-145.png" alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="assets/images/products/squire-141.png" alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="assets/images/products/squire-140.png" alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="assets/images/products/squire-152.png" alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="assets/images/products/squire-156.png" alt="Product Image"></a>
                        </div>
                        <div class="item bg-white">
                            <a href="#"><img src="assets/images/products/squire-157.png" alt="Product Image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Recently Viewed Product Section End ====================-->

    <!--==================== Newslatter Section Start ====================-->
    <div class="full-row bg-extra1 py-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex align-items-center h-100">
                        <h4 class="text-white mb-0">Sign up to newslatter</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center h-100">
                        <span
                            class="text-white font-600 font-fifteen">.... and receive $5 coupon for first shopping</span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <form action="#" class="subscribe-form position-relative md-mt-20">
                        <input class="form-control rounded-pill mb-0" type="text" placeholder="Enter your email"
                               aria-label="Address">
                        <button class="btn btn-primary rounded-right-pill text-white" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Newslatter Section End ====================-->

@endsection
