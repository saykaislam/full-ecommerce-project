<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login', 'Admin\AuthController@ShowLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\AuthController@LoginCheck')->name('admin.login.check');
Route::group(['as'=>'admin.','prefix' =>'admin','namespace'=>'Admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('roles','RoleController');
    Route::post('/roles/permission','RoleController@create_permission');
    Route::resource('staffs','StaffController');
    Route::resource('brands','BrandController');
    Route::resource('categories','CategoryController');
    Route::post('categories/is_home', 'CategoryController@updateIsHome')->name('categories.is_home');
    Route::resource('attributes','AttributeController');
    Route::resource('subcategories','SubcategoryController');
    Route::resource('sub-subcategories','SubSubcategoryController');
    Route::resource('products','ProductController');
    Route::resource('offers','OfferController');

    //Frontend Home Setting
    Route::get('/frontend_settings/home', 'HomeController@home_settings')->name('home_settings.index');
    Route::resource('home_categories','HomeCategoryController');
    Route::post('/home_categories/update_status', 'HomeCategoryController@update_status')->name('home_categories.update_status');
    Route::resource('generalsettings','GeneralSettingController');
    Route::get('/logo','GeneralSettingController@logo')->name('generalsettings.logo');
    Route::post('/logo','GeneralSettingController@storeLogo')->name('generalsettings.logo.store');
    Route::resource('banners','BannerController');
    Route::get('/home_banners/create/{position}', 'BannerController@create')->name('home_banners.create');
    Route::post('/home_banners/update_status', 'BannerController@update_status')->name('home_banners.update_status');
    Route::post('/home_banners/update_status_2', 'BannerController@update_status_2')->name('home_banners.update_status_2');

    Route::resource('coupon','CouponController');
    Route::post('/coupon/get_form', 'CouponController@get_coupon_form')->name('coupon.get_coupon_form');
    Route::post('/products/get_products_by_subcategory', 'ProductController@get_products_by_subcategory')->name('products.get_products_by_subcategory');
    Route::post('/coupon/get_form_edit', 'CouponController@get_coupon_form_edit')->name('coupon.get_coupon_form_edit');
//    Route::get('/coupon/destroy/{id}', 'CouponController@destroy')->name('coupon.destroy');
    //Flash Deal
    Route::resource('flash_deals','FlashDealController');
    Route::post('/flash_deals/update_status', 'FlashDealController@update_status')->name('flash_deals.update_status');
    Route::post('/flash_deals/update_featured', 'FlashDealController@update_featured')->name('flash_deals.update_featured');
    Route::post('/flash_deals/product_discount', 'FlashDealController@product_discount')->name('flash_deals.product_discount');
    Route::post('/flash_deals/product_discount_edit', 'FlashDealController@product_discount_edit')->name('flash_deals.product_discount_edit');

    Route::post('products/update2/{id}','ProductController@update2')->name('products.update2');
    Route::get('products/slug/{name}','ProductController@ajaxSlugMake')->name('products.slug');
    Route::post('products/get-subcategories-by-category','ProductController@ajaxSubCat')->name('products.get_subcategories_by_category');
    Route::post('products/get-subsubcategories-by-subcategory','ProductController@ajaxSubSubCat')->name('products.get_subsubcategories_by_subcategory');
    Route::post('products/sku_combination','ProductController@sku_combination')->name('products.sku_combination');
    Route::post('/products/sku_combination_edit', 'ProductController@sku_combination_edit')->name('products.sku_combination_edit');
    Route::post('products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');
    Route::post('products/published/update', 'ProductController@updatePublished')->name('products.published');
    Route::post('products/featured/update', 'ProductController@updateFeatured')->name('products.featured');
    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');


// Admin Order Management
    Route::get('orders','OrderManagementController@orderList')->name('order.list');
    Route::get('order/pending','OrderManagementController@pendingOrder')->name('order.pending');
    Route::get('order/on-reviewed','OrderManagementController@onReviewedOrder')->name('order.on-reviewed');
    Route::get('order/on-delivered','OrderManagementController@onDeliveredOrder')->name('order.on-delivered');
    Route::get('order/delivered','OrderManagementController@deliveredOrder')->name('order.delivered');
    Route::get('order/completed','OrderManagementController@completedOrder')->name('order.completed');
    Route::get('order/canceled','OrderManagementController@canceledOrder')->name('order.canceled');
    Route::get('order-product/status-change/{id}','OrderManagementController@OrderProductChangeStatus')->name('order-product.status');
    Route::get('order-details/{id}','OrderManagementController@orderDetails')->name('order-details');
    Route::get('order-details/invoice/print/{id}','OrderManagementController@orderInvoicePrint')->name('invoice.print');

    // Admin User Management
    Route::resource('customers','CustomerController');
    Route::get('customers/show/profile/{id}','CustomerController@profileShow')->name('customers.profile.show');
    Route::put('customers/update/profile/{id}','CustomerController@updateProfile')->name('customer.profile.update');
    Route::put('customers/password/update/{id}','CustomerController@updatePassword')->name('customer.password.update');
    Route::get('customers/ban/{id}','CustomerController@banCustomer')->name('customers.ban');

    //Review

    //Sliders
    Route::resource('sliders','SliderController');
    Route::get('/reviews','ReviewController@index')->name('reviews.index');
    Route::post('review/status/update', 'ReviewController@updateStatus')->name('review-status.update');
    Route::get('review/show/{id}','ReviewController@show')->name('review.view');
    Route::post('review/update/{id}','ReviewController@reviewUpdate')->name('review.update');
    //Blogs
    Route::resource('blogs','BlogController');
    Route::post('blog/status', 'BlogController@updateStatus')->name('blog.status');

    Route::resource('advertisement','AdvertisementController');
    Route::resource('profile','ProfileController');
    Route::put('password/update/{id}','ProfileController@updatePassword')->name('password.update');

    //performance
    Route::get('/config-cache', 'SystemOptimize@ConfigCache')->name('config.cache');
    Route::get('/clear-cache', 'SystemOptimize@CacheClear')->name('cache.clear');
    Route::get('/view-cache', 'SystemOptimize@ViewCache')->name('view.cache');
    Route::get('/view-clear', 'SystemOptimize@ViewClear')->name('view.clear');
    Route::get('/route-cache', 'SystemOptimize@RouteCache')->name('route.cache');
    Route::get('/route-clear', 'SystemOptimize@RouteClear')->name('route.clear');
    Route::get('/site-optimize', 'SystemOptimize@Settings')->name('site.optimize');

});
