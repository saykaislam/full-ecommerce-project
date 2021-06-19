<header class="ecommerce-header" id="myHeader">
    <div class="top-header font-400 d-none d-lg-block py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 sm-mx-none">
                    <div class="d-flex align-items-center text-general">
                        <i class="flaticon-phone-call flat-mini me-2 text-primary"></i>
                        <span>+1 029 312 9131</span>
                    </div>
                </div>
                <div class="col-lg-8">
                    <ul class="top-links ms-auto list-color-white d-flex justify-content-end">
                        @if(Auth::guest())
                        <li><a href="{{route('login')}}"><i class="flaticon-user-3 flat-mini text-primary me-1"></i>Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                        @else
                        <li class="my-account-dropdown">
                            <a href="{{route('login')}}" class="has-dropdown"><i class="flaticon-user-3 flat-mini text-primary me-1"></i>{{Auth::User()->name}}</a>
                            <ul class="my-account-popup">
                                <li><a href="{{route('login')}}"><span class="menu-item-text">Dashboard</span></a></li>
                                <li>
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button>Logout</button>
                                    </form>
{{--                                    <a href="checkout.html"><span class="menu-item-text"></span></a>--}}
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header d-none d-lg-block py-4 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 sm-mx-none">
                    <a class="navbar-brand d-flex align-items-center h-100" href="{{url('/')}}"><img class="nav-logo" src="{{asset('frontend/logo.jpg')}}" alt="" height="43px;"></a>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="product-search-one">
                        <form class="form-inline search-pill-shape" action="{{ route('search') }}" method="GET">
                            <input type="text" class="form-control search-field" id="search" name="q" placeholder="I’m shopping for" autocomplete="off">
                            <div class="select-appearance-none">
                                <select class="form-control selectpicker" name="category">
                                    <option value="">{{__('All Categories')}}</option>
                                    @foreach (\App\Model\Category::all() as $key => $category)
                                        <option value="{{ $category->slug }}"
                                                @isset($category_id)
                                                @if ($category_id == $category->id)
                                                selected
                                            @endif
                                            @endisset
                                        >{{ __($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="search-submit">
                                <i class="flaticon-search flat-mini text-dark"></i>
                            </button>
                            <div class="typed-search-box d-none" id="search-box">
                                <div class="search-preloader">
                                    <div class="loader">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="search-nothing d-none">

                                </div>
                                <div id="search-content">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 xs-mx-none">
                    <div class="d-flex align-items-center justify-content-end h-100">
                        <div class="mr-30">
                            <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                                <i class="flaticon-support flat-small me-1 text-dark"></i>
                                <div class="d-table">
                                    <div class="font-400">Helpline</div>
                                    <div class="font-500 text-extra1">(+109) 029 312 9131</div>
                                </div>
                            </a>
                        </div>
                        @php
                        $wishlists = \App\Model\Wishlist::where('user_id',Auth::id())->count();
                        @endphp
                        <div class="wishlist-view my-0 ml-30">
                            <a href="{{route('user.wishlists.index')}}" class="position-relative top-quantity d-flex align-items-center text-white text-decoration-none" title="Wishlist">
                                <i class="flaticon-like flat-small text-dark"></i>
                                <span class="">{{$wishlists}}</span>
                            </a>
                        </div>
                        <div class="refresh-view my-0 ml-30" id="compare">
                            @include('frontend.products_partials.compare')
{{--                            <a href="compare.html" class="position-relative top-quantity d-flex align-items-center text-dark text-decoration-none" title="Compare">--}}
{{--                                <i class="flaticon-shuffle flat-small text-dark"></i>--}}
{{--                                @if(Session::has('compare'))--}}
{{--                                    <span class="cartCountTotal" id="compare_items_sidenav">{{ count(Session::get('compare'))}}</span>--}}
{{--                                @else--}}
{{--                                    <span class="cartCountTotal" id="compare_items_sidenav">0</span>--}}
{{--                                @endif--}}
{{--                            </a>--}}
                        </div>
                        <div class="cart-view position-relative m-0 ml-30">
                            <a href="cart.html" class="has-cart-data position-relative top-quantity d-flex align-items-center text-decoration-none" title="View Cart">
                                <i class="flaticon-shopping-cart flat-small text-dark me-1"></i>
                                <span class="cartCountTotal">{{Cart::count()}}</span>
                                {{--<div class="d-none d-xl-table text-dark lh-base">
                                    <div class="font-400">Cart</div>
                                    <div class="font-600">$62.00</div>
                                </div>--}}
                            </a>
                            <div class="cart-popup">
                                @include('frontend.includes.addToCart')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-nav d-none d-lg-block bg-extra1">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-3">
                    <div class="categories-menu-wrapper category-hover-open h-100 text-dark bg-primary position-relative">
                        <div class="category-title-wrapper align-items-center d-flex">
                            <i class="flaticon-menu me-3 bg-dark p-3 text-white flat-mini"></i>
                            <span class="font-400 higlight-font font-seventeen text-white">All Departments</span>
                        </div>
                        <div class="bg-white h-100 categories-menu">
                            <ul class="menu">
{{--                                <li class="highlight"><a href="#">Values of the day</a></li>--}}
{{--                                <li class="highlight"><a href="#">Top most offers</a></li>--}}
                                @foreach(categories() as $category)
                                <li class="menu-item-has-children unicode-megamenu-dropdown unicode-megamenu-item-full-width">
                                    <a href="#">{{$category->name}}</a>
                                    <div class="unicode-megamenu-wrapper">
                                        <div class="unicode-megamenu-holder">
                                            <div class="row row-cols-3">
                                                @foreach(subcategories($category->id) as $subcategory)
                                                <div class="col">
                                                    <ul class="unicode-menu-element unicode-megamenu-list">
                                                        <li class="menu-item">
                                                            <a class="nav-link" href="#" title="Top wear"> <span>{{$subcategory->name}}</span></a>
                                                            <ul class="unicode-sub-megamenu">
                                                                @foreach(Sub_subcategories($subcategory->id) as $sub_subcategory)
                                                                <li class="menu-item">
                                                                    <a class="nav-link" href="#" title="Tops"> <span>{{$sub_subcategory->name}}</span> </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-xl-9">
                    <nav class="navbar navbar-expand-lg nav-white nav-secondary-hover">
                        <a class="navbar-brand d-lg-none" href="#"><img class="nav-logo" src="{{asset('frontend/logo.jpg')}}" alt="Image not found !" style="height: 43px;!important;"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="flaticon-menu-2 flat-small text-primary"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item highlight-item">
                                    <a class="nav-link" href="#">New Arrival<span class="tooltip">New</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item dropdown mega-dropdown">
                                    <a class="nav-link" href="#">Shop</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('blog-list')}}">Blog</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('contact-us')}}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="header-sticky bg-white py-10" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-6 order-lg-1">
                    <div class="d-flex align-items-center h-100 md-py-10">
                        <div class="nav-leftpush-overlay">
                            <nav class="navbar navbar-expand-lg nav-general nav-primary-hover">
                                <button type="button" class="push-nav-toggle d-lg-none border-0">
                                    <i class="flaticon-menu-2 flat-small text-primary"></i>
                                </button>
                                <div class="navbar-slide-push transation-this">
                                    <div class="login-signup bg-secondary d-flex justify-content-between py-10 px-20 align-items-center">
                                        <a href="registration.html" class="d-flex align-items-center text-white">
                                            <i class="flaticon-user flat-small me-1"></i>
                                            <span>Login/Signup</span>
                                        </a>
                                        <span class="slide-nav-close"><i class="flaticon-cancel flat-mini text-white"></i></span>
                                    </div>
                                    <div class="menu-and-category">
                                        <ul class="nav nav-pills wc-tabs" id="menu-and-category" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="pills-push-menu-tab" data-bs-toggle="pill" href="#pills-push-menu" role="tab" aria-controls="pills-push-menu" aria-selected="true">Menu</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pills-push-categories-tab" data-bs-toggle="pill" href="#pills-push-categories" role="tab" aria-controls="pills-push-categories" aria-selected="true">Categories</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="menu-and-categoryContent">
                                            <div class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description" id="pills-push-menu" role="tabpanel" aria-labelledby="pills-push-menu-tab">
                                                <div class="push-navbar">
                                                    <ul class="navbar-nav">
                                                        <li class="nav-item highlight-item"><a class="nav-link" href="#">Flash Deal</a></li>
                                                        <li class="nav-item highlight-item"><a class="nav-link" href="#">New Arrival</a></li>
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="index.html">Home</a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="index.html">Classic Fashion</a></li>
                                                                <li><a class="dropdown-item" href="index-optical-shop.html">Optical Shop</a></li>
                                                                <li><a class="dropdown-item" href="index-food-corner.html">Food Corner</a></li>
                                                                <li><a class="dropdown-item" href="index-cosmetic-store.html">Cosmetic Store</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="nav-item dropdown mega-dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#">Shop</a>
                                                        </li>
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#">Pages</a>
                                                        </li>
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="blog-grid-left-sidebar.html">Blog</a>
                                                        </li>
                                                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                                                    </ul>
                                                    <a href="#" class="p-20 d-block bg-secondary text-primary text-uppercase font-600 hover-text-primary">Buy now!</a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-push-categories" role="tabpanel" aria-labelledby="pills-push-categories-tab">
                                                <div class="categories-menu">
                                                    <ul class="menu">
                                                        <li class="menu-item-has-children unicode-megamenu-dropdown unicode-megamenu-item-full-width">
                                                            <a href="#">Women's Fashion</a>
                                                            <div class="unicode-megamenu-wrapper" style="background-image: url(frontend/assets/images/banner/49.png); background-size: cover;
																		background-position:0px;">
                                                                <div class="unicode-megamenu-holder">
                                                                    <div class="row row-cols-3">
                                                                        <div class="col">
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item">
                                                                                    <a class="nav-link" href="#" title="Top wear"> <span>Top Clothing</span></a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Tops"> <span>Tops</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="T-Shirts"> <span>T-Shirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Shirts"> <span>Shirts</span></a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Jeans &amp; Jeggings"> <span>Jeans &amp; Jeggings</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Trousers &amp; Capris"> <span>Trousers &amp; Capris</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item"> <a class="nav-link" href="#" title="Fusion Wear"><span>Fusion Wear</span></a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sweaters &amp; Sweatshirts"> <span>Sweaters &amp; Sweatshirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Coats &amp; Blazers"> <span>Coats &amp; Blazers</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Jackets &amp; Waistcoats"> <span>Jackets &amp; Waistcoats</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Shorts &amp; Skirts"> <span>Shorts &amp; Skirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Camisoles &amp; Slips"> <span>Camisoles &amp; Slips</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col">
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item">
                                                                                    <a class="nav-link" href="#" title="Sports &amp; Active Wear"> <span>Sports &amp; Active Wear</span> </a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Clothing"> <span>Clothing</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Footwear"> <span>Footwear</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="T-Shirts"> <span>T-Shirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sports Accessories"> <span>Sports Accessories</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sports Equipment"> <span>Sports Equipment</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item">
                                                                                    <a class="nav-link" href="#" title="Lingerie &amp; Sleepwear"> <span>Lingerie &amp; Sleepwear</span> </a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Bras &amp; Lingerie Sets"> <span>Bras &amp; Lingerie Sets</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Briefs"> <span>Briefs</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Shapewear"> <span>Shapewear</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sleepwear &amp; Loungewear"> <span>Sleepwear &amp; Loungewear</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Camisoles &amp; Thermals"> <span>Camisoles &amp; Thermals</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item-has-children unicode-megamenu-dropdown unicode-megamenu-item-full-width">
                                                            <a href="#">Men's Fashion</a>
                                                            <div class="unicode-megamenu-wrapper">
                                                                <div class="unicode-megamenu-holder">
                                                                    <div class="row row-cols-3">
                                                                        <div class="col">
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item">
                                                                                    <a class="nav-link" href="#" title="Top wear"> <span>Top Clothing</span></a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Tops"> <span>Tops</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="T-Shirts"> <span>T-Shirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Shirts"> <span>Shirts</span></a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Jeans &amp; Jeggings"> <span>Jeans &amp; Jeggings</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Trousers &amp; Capris"> <span>Trousers &amp; Capris</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item"> <a class="nav-link" href="#" title="Fusion Wear"><span>Fusion Wear</span></a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sweaters &amp; Sweatshirts"> <span>Sweaters &amp; Sweatshirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Coats &amp; Blazers"> <span>Coats &amp; Blazers</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Jackets &amp; Waistcoats"> <span>Jackets &amp; Waistcoats</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Shorts &amp; Skirts"> <span>Shorts &amp; Skirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Camisoles &amp; Slips"> <span>Camisoles &amp; Slips</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col">
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item">
                                                                                    <a class="nav-link" href="#" title="Sports &amp; Active Wear"> <span>Sports &amp; Active Wear</span> </a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Clothing"> <span>Clothing</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Footwear"> <span>Footwear</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="T-Shirts"> <span>T-Shirts</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sports Accessories"> <span>Sports Accessories</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sports Equipment"> <span>Sports Equipment</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="unicode-menu-element unicode-megamenu-list">
                                                                                <li class="menu-item">
                                                                                    <a class="nav-link" href="#" title="Lingerie &amp; Sleepwear"> <span>Lingerie &amp; Sleepwear</span> </a>
                                                                                    <ul class="unicode-sub-megamenu">
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Bras &amp; Lingerie Sets"> <span>Bras &amp; Lingerie Sets</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Briefs"> <span>Briefs</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Shapewear"> <span>Shapewear</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Sleepwear &amp; Loungewear"> <span>Sleepwear &amp; Loungewear</span> </a>
                                                                                        </li>
                                                                                        <li class="menu-item">
                                                                                            <a class="nav-link" href="#" title="Camisoles &amp; Thermals"> <span>Camisoles &amp; Thermals</span> </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col">
                                                                            <img src="{{asset('frontend/assets/images/banner/13.png')}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="menu-item-has-children"><a href="#">Phones &amp; Telecommunications</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Computer, Office &amp; Security</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Consumer Electronics</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Jewelry &amp; Watches</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Home, Pet &amp; Appliances</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Bags &amp; Shoes</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Toys , Kids &amp; Babies</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Outdoor Fun &amp; Sports</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Beauty, Health &amp; Hair</a></li>
                                                        <li class="menu-item-has-children"><a href="#">Home Improvement &amp; Tools</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <a class="navbar-brand" href="{{url('/')}}"><img class="nav-logo" src="{{asset('frontend/logo.jpg')}}" height="45" alt="Image not found !"></a>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-3 col-6 order-lg-3">
                    <div class="d-flex align-items-center justify-content-end h-100 md-py-10">
                        @if(Auth::guest())
                        <div class="sign-in position-relative font-general my-account-dropdown">
                            <a href="#" class="has-dropdown d-flex align-items-center text-dark text-decoration-none" title="My Account">
                                <i class="flaticon-user-3 flat-small me-1"></i>
                            </a>
                            <ul class="my-account-popup">
                                <li><a href="{{route('login')}}"><span class="menu-item-text">Login</span></a></li>
                                <li><a href="{{route('register')}}"><span class="menu-item-text">Register</span></a></li>
                            </ul>
                        </div>
                        @else
                            <div class="sign-in position-relative font-general my-account-dropdown">
                                <a href="{{route('user.dashboard')}}" class="has-dropdown d-flex align-items-center text-dark text-decoration-none" title="My Account">
                                    <i class="flaticon-user-3 flat-small me-1"></i>
                                </a>
                                <ul class="my-account-popup">
                                    <li><a href="{{route('user.dashboard')}}"><span class="menu-item-text">Dashboard</span></a></li>
                                    <li><a href="{{route('checkout')}}"><span class="menu-item-text">Checkout</span></a></li>
                                    <li><a href="{{route('user.wishlists.index')}}"><span class="menu-item-text">Wishlist</span></a></li>
                                    <li>
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <button>Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        @php
                            $wishlists = \App\Model\Wishlist::where('user_id',Auth::id())->count();
                        @endphp
                            <div class="wishlist-view my-0 ml-30">
                                <a href="{{route('user.wishlists.index')}}" class="position-relative top-quantity d-flex align-items-center text-white text-decoration-none" title="Wishlist">
                                    <i class="flaticon-like flat-small text-dark"></i>
                                    <span class="">{{$wishlists}}</span>
                                </a>
                            </div>
                            <div class="refresh-view my-0 ml-30" id="compare_2">
                                @include('frontend.products_partials.compare')
{{--                                <a href="compare.html" class="position-relative top-quantity d-flex align-items-center text-dark text-decoration-none" title="Compare">--}}
{{--                                    <i class="flaticon-shuffle flat-small text-dark"></i>--}}
{{--                                    @if(Session::has('compare'))--}}
{{--                                        <span class="cartCountTotal" id="compare_items_sidenav_2">{{ count(Session::get('compare'))}}</span>--}}
{{--                                    @else--}}
{{--                                        <span class="cartCountTotal" id="compare_items_sidenav_2">0</span>--}}
{{--                                    @endif--}}
{{--                                </a>--}}
                            </div>
                            <div class="cart-view position-relative m-0 ml-30">
                                <a href="cart.html" class="has-cart-data position-relative top-quantity d-flex align-items-center text-decoration-none" title="View Cart">
                                    <i class="flaticon-shopping-cart flat-small text-dark me-1"></i>
                                    <span class="cartCountTotal">{{Cart::count()}}</span>
                                    {{--<div class="d-none d-xl-table text-dark lh-base">
                                        <div class="font-400">Cart</div>
                                        <div class="font-600">$62.00</div>
                                    </div>--}}
                                </a>
                                <div class="cart-popup">
                                    @include('frontend.includes.addToCart')
                                </div>

                            </div>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-6 col-lg-6 col-12 order-lg-2">
                    <div class="product-search-one">
                        <form class="form-inline search-pill-shape" action="{{ route('search') }}" method="GET">
                            <input type="text" class="form-control search-field" id="search2" name="q" placeholder="I’m shopping for" autocomplete="off">
                            <div class="select-appearance-none">
                                <select class="form-control selectpicker" name="category">
                                    <option value="">{{__('All Categories')}}</option>
                                    @foreach (\App\Model\Category::all() as $key => $category)
                                        <option value="{{ $category->slug }}"
                                                @isset($category_id)
                                                @if ($category_id == $category->id)
                                                selected
                                            @endif
                                            @endisset
                                        >{{ __($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"  class="search-submit"><i class="flaticon-search flat-mini text-white"></i></button>
                            <div class="typed-search-box d-none" id="search-box-2">
                                <div class="search-preloader">
                                    <div class="loader">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="search-nothing d-none">

                                </div>
                                <div id="search-content2">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
