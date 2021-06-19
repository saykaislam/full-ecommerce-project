
    <div id="sidebar" class="widget-title-bordered-full">
        <div id="woocommerce_product_categories-4" class="widget woocommerce widget_product_categories widget-toggle">
            <h2 class="widget-title">Product categories</h2>
            <ul class="product-categories">
                @foreach(categories() as $category)
                <li class="cat-item cat-parent">
                    <a href="#">{{$category->name}}</a>
                    <span class="has-child"></span>
                    <ul class="product-categories children">
                        @foreach(subcategories($category->id) as $subcategory)
                            <li class="cat-item cat-parent">
                                <a href="#">{{$subcategory->name}}</a>
                                <span class="has-child"></span>
                                <ul class="children">
                                    @foreach(Sub_subcategories($subcategory->id) as $sub_subcategory)
                                        <li class="cat-item"><a href="#">{{$sub_subcategory->name}}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <div id="bigbazar-price-filter-list-1" class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle">
            <h2 class="widget-title">Filter by Price</h2>
            <ul class="price-filter-list">
                <li class="wc-layered-nav-term">
                                        <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>0.00</bdi>
                                        </span> -
                    <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>50.00</bdi>
                                        </span>
                </li>
                <li class="wc-layered-nav-term">
                                        <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>50.00</bdi>
                                        </span> -
                    <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>100.00</bdi>
                                        </span>
                </li>
                <li class="wc-layered-nav-term">
                                        <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>100.00</bdi>
                                        </span> -
                    <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>200.00</bdi>
                                        </span>
                </li>
                <li class="wc-layered-nav-term">
                                        <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>200.00</bdi>
                                        </span> -
                    <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>400.00</bdi>
                                        </span>
                </li>
                <li class="wc-layered-nav-term">
                                        <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>400.00</bdi>
                                        </span> -
                    <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>800.00</bdi>
                                        </span>
                </li>
                <li class="wc-layered-nav-term">
                                        <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>800.00 +</bdi>
                                        </span>
                </li>
            </ul>
        </div>
        <div id="bigbazar-attributes-filter-3" class="widget woocommerce bigbazar-attributes-filter widget_layered_nav widget-toggle">
            <h2 class="widget-title">Colors</h2>
            <ul class="swatch-filter-pa_color">
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Black</span>
                    <span class="count">(3)</span>
                </li>
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Blue</span>
                    <span class="count">(4)</span>
                </li>
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Dark Blue</span>
                    <span class="count">(5)</span>
                </li>
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Grey</span>
                    <span class="count">(3)</span>
                </li>
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Red</span>
                    <span class="count">(4)</span>
                </li>
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Silver</span>
                    <span class="count">(2)</span>
                </li>
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Black</span>
                    <span class="count">(3)</span>
                </li>
                <li class="wc-layered-nav-term">
                    <span class="nav-title">Blue</span>
                    <span class="count">(4)</span>
                </li>
            </ul>
        </div>
        <div id="bigbazar-attributes-filter-4" class="widget woocommerce bigbazar-attributes-filter widget_layered_nav widget-toggle">
            <h2 class="widget-title">Brands</h2>
            <ul class="swatch-filter-pa_brands">
                @foreach(brand() as $brand)
                <li class="wc-layered-nav-term">
                    <span class="nav-title">{{$brand->name}}</span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="owl-carousel owl-nav-hover-primary nav-top-right single-carousel dot-disable product-list e-bg-white">
                    <div class="item">
                        <div class="row row-cols-1">
                        </div>
                    </div>
                    <div class="item">
                        <div class="row row-cols-1">
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-37.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Game The Legend of Zelda Solid Color Printed T-shirt</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$17.96 - 25.50</ins>
                                                </div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.9</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(343)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-40.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Anti-static Comb Large Wide Toothed  Comb Salon Hair Comb for T</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$35.00</ins>
                                                    <del>$50.00</del>
                                                </div>
                                                <div class="on-sale"><span>30</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.9</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(163)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-38.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Ladies Tops Shirt Blusas Mujer Women  Blouse 2019 Autumn Causal</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$25.00</ins>
                                                    <del>$50.00</del>
                                                </div>
                                                <div class="on-sale"><span>50</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.8</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(374)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-39.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Luxury Brand Handbag New Fashion  Simple Square bag Quality</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$20.00</ins>
                                                    <del>$25.00</del>
                                                </div>
                                                <div class="on-sale"><span>20</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.8</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(264)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row row-cols-1">
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-44.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">CNYISHE Elegant Satin  V-neck Ladies Christmas Party Night Dress</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$45.00</ins>
                                                    <del>$50.00</del>
                                                </div>
                                                <div class="on-sale"><span>10</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.75</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(538)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-45.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Men Genuine Leather Handbags Business Travel Shoulder Bag</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$15.00</ins>
                                                    <del>$25.00</del>
                                                </div>
                                                <div class="on-sale"><span>40</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.9</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(216)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-36.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Women Ice Silk Sleepwear Female Nightgown Women Nightwear</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$36.00</ins>
                                                    <del>$50.00</del>
                                                </div>
                                                <div class="on-sale"><span>28</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.95</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(263)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-46.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Mini Wireless Bluetooth  5.0 Earphone in Ear Sport</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$3.00</ins>
                                                    <del>$5.00</del>
                                                </div>
                                                <div class="on-sale"><span>40</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.9</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(253)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row row-cols-1">
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-23.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Fashion Mens Suit Jackets Slim  3 Pieces Suit Blazer Business</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$30.00</ins>
                                                    <del>$50.00</del>
                                                </div>
                                                <div class="on-sale"><span>40</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.6</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(63)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-47.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Single ButtonWomen's Winter Jackets And Coats Thicken Long Plus Size</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$3.00</ins>
                                                    <del>$5.00</del>
                                                </div>
                                                <div class="on-sale"><span>40</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.9</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(253)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-24.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Brand android television TV 32 40 46</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$700.00</ins>
                                                    <del>$1000.00</del>
                                                </div>
                                                <div class="on-sale"><span>30</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.9</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(97)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product type-product">
                                    <div class="product-wrapper">
                                        <div class="product-image">
                                            <a href="single-shop.html" class="woocommerce-LoopProduct-link"><img src="assets/images/products/squire-14.png" alt="Product Image"></a>
                                            <div class="wishlist-view">
                                                <div class="quickview-button">
                                                    <a class="quickview-btn" href="#quick-view" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Quick View" aria-label="Quick View">Quick View</a>
                                                </div>
                                                <div class="whishlist-button">
                                                    <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add to Wishlist" aria-label="Add to Wishlist">Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="single-shop.html">Men LED Digital Watches Women Sport Silicone</a></h3>
                                            <div class="product-price">
                                                <div class="price">
                                                    <ins>$65.00</ins>
                                                    <del>$100.00</del>
                                                </div>
                                                <div class="on-sale"><span>35</span><span>% off</span></div>
                                            </div>
                                            <div class="shipping-feed-back">
                                                <div class="star-rating">
                                                    <div class="rating-wrap">
                                                        <a href="single-shop.html"><i class="fas fa-star"></i><span> 4.7</span></a>
                                                    </div>
                                                    <div class="rating-counts-wrap">
                                                        <a href="#">(73)</a>
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
