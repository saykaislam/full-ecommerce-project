<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Frontend\FrontendController@index')->name('index');
Route::get('/about-us', 'Frontend\AboutController@About')->name('about-us');
Route::get('/contact', 'Frontend\AboutController@contact')->name('contact-us');
Route::get('/faqs', 'Frontend\AboutController@faqs')->name('faqs');
Route::get('/our-policy', 'Frontend\AboutController@policy')->name('policy');
Route::get('/terms-and-conditions', 'Frontend\AboutController@terms')->name('terms-condition');
Route::get('/shipping', 'Frontend\AboutController@shipping')->name('shipping');
Route::get('/order-returns', 'Frontend\AboutController@returns')->name('returns');
Route::get('/add/wishlist/{id}', 'Frontend\WishlistController@wishlistAdd' )->name('add.wishlist');
Route::get('/remove/wishlist/{id}', 'Frontend\WishlistController@wishlistRemove' )->name('remove.wishlist');

//search route here.............
Route::get('/search', 'Frontend\SearchController@search')->name('search');
Route::get('/search?q={search}', 'Frontend\SearchController@search')->name('suggestion.search');
Route::post('/ajax-search', 'Frontend\SearchController@ajax_search')->name('search.ajax');

Route::get('/product/{slug}', 'Frontend\SearchController@product')->name('product');
Route::get('/products', 'Frontend\SearchController@listing')->name('products');
Route::get('/search?category={category_slug}', 'Frontend\SearchController@search')->name('products.category');
Route::get('/search?subcategory={subcategory_slug}', 'Frontend\SearchController@search')->name('products.subcategory');
Route::get('/search?subsubcategory={subsubcategory_slug}', 'Frontend\SearchController@search')->name('products.subsubcategory');
Route::get('/search?brand={brand_slug}', 'Frontend\SearchController@search')->name('products.brand');

//Blog
Route::get('/blogs', 'Frontend\BlogController@index')->name('blog-list');
Route::get('/blog-details/{slug}', 'Frontend\BlogController@details')->name('blog-details');

//wishlist


Route::post('/registration','Frontend\FrontendController@register')->name('user.register');
Route::get('/get-verification-code/{id}', 'Frontend\VerificationController@getVerificationCode')->name('get-verification-code');
Route::post('/get-verification-code-store', 'Frontend\VerificationController@verification')->name('get-verification-code.store');
Route::get('/check-verification-code', 'Frontend\VerificationController@CheckVerificationCode')->name('check-verification-code');

//Forget Password
Route::get('/reset-password','Frontend\FrontendController@getPhoneNumber')->name('reset.password');
Route::post('/otp-store','Frontend\FrontendController@checkPhoneNumber')->name('phone.check');
Route::post('/change-password','Frontend\FrontendController@otpStore')->name('otp.store');
Route::post('/new-password/update/{id}','Frontend\FrontendController@passwordUpdate')->name('reset.password.update');


//product
Route::get('/product/{slug}', 'Frontend\ProductController@productDetails')->name('product-details');
Route::get('/todays-deal-products', 'Frontend\ProductController@todaysDealProducts')->name('all.todays_deal.products');
Route::get('/featured-products', 'Frontend\ProductController@featuredProduct')->name('all.featured.products');
Route::get('/all-products', 'Frontend\ProductController@allProducts')->name('all.product.list');
Route::get('/best-sale-products', 'Frontend\ProductController@bestSaleProducts')->name('all.best_sale.products');
Route::get('/flash-deal-products/{slug}', 'Frontend\ProductController@flashDealProducts')->name('all.flash-deal.products');
Route::get('/all-categories', 'Frontend\ProductController@allCategories')->name('all.categories');
Route::get('/products/category/{slug}', 'Frontend\ProductController@categoryProduct')->name('category.products');
Route::post('/product/variant_price', 'Frontend\ProductController@variant_price')->name('products.variant_price');


//Cart
Route::get('/shopping-cart', 'Frontend\CartController@cartShow')->name('shopping-cart');
Route::get('/product/remove/cart/{id}', 'Frontend\CartController@cartRemove')->name('product.cart.remove');
Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout');
Route::post('/products/get/variant/price', 'Frontend\ProductController@ProductVariantPrice')->name('product.variant.price');
Route::post('/products/ajax/addtocart', 'Frontend\CartController@ProductAddCart')->name('product.add.cart');
Route::post('/products/global/addtocart', 'Frontend\CartController@globalAddToCart')->name('product.global.addToCart');
Route::post('/products/ajax/buy', 'Frontend\CartController@ProductBuy')->name('product.direct.buy');
Route::post('/show/quick-view-modal', 'Frontend\CartController@showQuickViewModal')->name('show.quick-view.modal');
Route::post('/compare/addToCompare', 'Frontend\CompareController@addToCompare')->name('compare.addToCompare');
Route::get('/compare', 'Frontend\CompareController@index')->name('compare');
Route::get('/compare/reset', 'Frontend\CompareController@reset')->name('compare.reset');


//Route::post('/products/get/variant/price', 'Frontend\ProductController@ProductVariantPrice')->name('product.variant.price');
//Route::get('/products/{slug}', 'Frontend\ProductController@productList')->name('product.list');
//Route::get('/products/{name}/{slug}/{sub}', 'Frontend\ProductController@productSubCategory')->name('product.by.subcategory');
//Route::get('/products/{name}/{slug}', 'Frontend\ProductController@productByBrand')->name('product.by.brand');
//Route::post('/products/ajax/addtocart', 'Frontend\CartController@ProductAddCart')->name('product.add.cart');
//Route::get('/product/clear/cart', 'Frontend\CartController@clearCart')->name('product.clear.cart');
//Route::get('/product/remove/cart/{id}', 'Frontend\CartController@cartRemove')->name('product.cart.remove');
//Route::post('/cart/quantity_update', 'Frontend\CartController@quantityUpdate')->name('qty.update');

Route::get('/flash-deals/{slug}', 'Frontend\VendorController@flashdeal')->name('flash-deals');
Route::get('/todays-deal/{slug}', 'Frontend\VendorController@todaysDeal')->name('todays-deal-products');
Route::get('/todays-deal/{name}/{slug}/{sub}', 'Frontend\VendorController@todaysDealSubCategory');
Route::get('/best-selling/{slug}', 'Frontend\VendorController@bestSelling')->name('best-selling-products');
Route::get('/best-selling/{name}/{slug}/{sub}', 'Frontend\VendorController@bestSellingSubCategory');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth', 'user']], function () {
    //this route only for with out resource controller
    Route::get('/user/dashboard', 'User\DashboardController@index')->name('user.dashboard');
    Route::get('/user/edit-profile', 'User\ProfileController@editProfile')->name('user.edit-profile');
    Route::post('/user/profile/update', 'User\ProfileController@updateProfile')->name('user.profile-update');
    Route::get('/user/edit-password', 'User\ProfileController@editPassword')->name('user.edit-password');
    Route::post('/user/password/update', 'User\ProfileController@updatePassword')->name('user.password-update');
    Route::get('/user/invoices', 'User\DashboardController@invoices')->name('user.invoices');
    Route::get('/user/notifications', 'User\DashboardController@notification')->name('user.notification');
    Route::get('/user/order-history', 'User\OrderManagementController@orderHistory')->name('user.order.history');
    Route::get('/user/order/details/{id}', 'User\OrderManagementController@orderDetails')->name('user.order.details');
    Route::post('/user/order/review', 'User\OrderManagementController@reviewStore')->name('user.order.review.store');
    Route::get('order-details/invoice/print/{id}','User\OrderManagementController@printInvoice')->name('invoice.print');
    Route::get('/user/wishlist', 'User\DashboardController@wishlist')->name('user.wishlist');
    Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout');
    Route::post('/checkout/order/submit', 'Frontend\CartController@orderSubmit')->name('checkout.order.submit');
    //this route only for resource controller
    Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User',], function () {
        Route::resource('address', 'AddressController');
        Route::resource('wishlists', 'WishlistController');
    });
    Route::post('/wishlists/remove', 'User\WishlistController@remove')->name('wishlists.remove');
    Route::post('/user/address-status/update/{id}', 'User\AddressController@updateStatus')->name('user.update.status');

});

