<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


//Route::get('test','TestController@index')->middleware('user');

Auth::routes(['register'=>false]);
Route::get('/', 'FrontendController@testIndex')->name('index');
Route::get('/index', 'FrontendController@indexHome')->name('indexHome');
Route::get('/lang', 'FrontendController@testIndex')->name('frontpage.lang');


// Zulfiqar Routing
Route::get('/header', 'FrontendController@header')->name('header');
Route::get('/search','FrontendController@search')->name('search');
Route::get('/search/lang','FrontendController@testIndex')->name('search.lang');


Route::get('/', 'FrontendController@testIndex')->name('home');

// Zulfiqar Routing over

Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

Route::get('user/register','FrontendController@register')->name('register.form');
Route::post('user/register','FrontendController@registerSubmit')->name('register.submit');
// Reset password
Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');
// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');

//Route::get('/','FrontendController@home')->name('home');
// Route::get('/','FrontendController@home')->name('home');

// Frontend Routes
Route::get('/home', 'FrontendController@index');
Route::get('/about-us','FrontendController@aboutUs')->name('about-us');
Route::get('/allProducts','FrontendController@allProducts')->name('allProducts');
Route::get('/faq','FrontendController@faq')->name('faq');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact/message','MessageController@store')->name('contact.store');
Route::get('product-detail/{id}','FrontendController@productDetail')->name('product-detail');
Route::get('product-detail-lang/{id}','FrontendController@productDetaillang')->name('product-detail-lang');
Route::get('category/{id}','FrontendController@category')->name('category');
Route::get('brands/{id}','FrontendController@brands')->name('brands');
Route::get('subCategory/{id}','FrontendController@subCategory')->name('subCategory');


Route::post('/product/search','FrontendController@productSearch')->name('product.search');
Route::get('/product-cat/{id}','FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-brand/{slug}','FrontendController@productBrand')->name('product-brand');
// Cart section
Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart');
Route::get('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');
Route::post('cart-update','CartController@cartUpdate')->name('cart.update');


// Route::get('/cart',function(){
//    return view('frontend.pages.cart');
// })->name('cart');

Route::get('/cart','CartController@cart')->name('cart');




Route::get('/checkout','CartController@checkout')->name('checkout');

// Route::get('/checkout','CartController@checkout')->name('checkout')->middleware(['admin','user']);

//// Wishlist
//Route::get('/wishlist',function(){
//    return view('frontend.pages.wishlist');
//})->name('wishlist');

Route::get('/wishlist','WishlistController@wishlistShow')->name('wishlist');


Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}','WishlistController@wishlistDelete')->name('wishlist-delete');
Route::post('cart/order','OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
Route::get('/income','OrderController@incomeChart')->name('product.order.income');
// Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
Route::get('/product-grids','FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists','FrontendController@productLists')->name('product-lists');
Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');
// Order Track
Route::get('/product/track','OrderController@orderTrack')->name('order.track');
Route::post('product/track/order','OrderController@productTrackOrder')->name('product.track.order');
// Blog
Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');
Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');

// NewsLetter
Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');

// Product Review
Route::resource('/review','ProductReviewController');
//Route::post('product/{slug}/review','ProductReviewController@store')->name('review.store');

// Post Comment
Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
Route::resource('/comment','PostCommentController');
// Coupon
Route::post('/coupon-store','CouponController@couponStore')->name('coupon-store');
// Payment
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

// Backend section start

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::get('/','AdminController@index')->name('admin');
//    Route::get('/file-manager',function(){
//        return view('backend.layouts.file-manager');
//    })->name('file-manager');

    Route::get('/file-manager','AdminController@filemanager')->name('file-manager');
    // user route
    Route::resource('users','UsersController');
    // Banner
    Route::resource('banner','BannerController');
    // Brand
    Route::resource('brand','BrandController');
    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');

    Route::resource('/subcategory','SubCategoryController');






    // Product
    Route::resource('/product','ProductController');
    Route::get('/feature','FeatureController@index');
    Route::get('/feature/edit/{id}','FeatureController@edit')->name('feature.edit');
    Route::get('/feature/edit-parts/{id}','FeatureController@editparts')->name('partfeature.edit');
    Route::get('/feature/create/{id}','FeatureController@create')->name('feature.create');
    Route::post('/feature/store/','FeatureController@store')->name('feature.store');
    Route::post('/feature/store-parts/','FeatureController@storeparts')->name('partsfeature.store');
    Route::get('/feature/show-vehicles/{id}','FeatureController@show')->name('feature.show');
    Route::get('/feature/show-parts/{id}','FeatureController@showPartsFeatures')->name('partsfeature.show');
    Route::post('/feature/update/','FeatureController@update')->name('feature.update');
    Route::post('/feature/update-parts/','FeatureController@partsupdate')->name('partsfeature.update');

    // Ajax for sub category
    Route::post('/category/{id}/child','CategoryController@getChildByParent');
    // POST category
    Route::resource('/post-category','PostCategoryController');
    // Post tag
    Route::resource('/post-tag','PostTagController');
    // Post
    Route::resource('/post','PostController');
    // Message
    Route::resource('/message','MessageController');
    Route::get('/message/five','MessageController@messageFive')->name('messages.five');

    // Order
    Route::resource('/order','OrderController');
    // Shipping
    Route::resource('/shipping','ShippingController');
    // Coupon
    Route::resource('/coupon','CouponController');
    // Settings
    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
//    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');

    Route::get('/vendor-pending-request/','VendorController@vendorPendingRequests')->name('user-pending-request');
    Route::get('/vendor-request-approve/{id}','VendorController@vendorRequestApprove')->name('user-request-approve');
    Route::get('/active-vendors/','VendorController@activeVendors')->name('active-vendors');
    Route::get('/deactive-vendors/{id}','VendorController@deactiveVendors')->name('vendor-deactivate');
    Route::get('/all-vendors/','VendorController@allVendors')->name('all-vendors');
    Route::get('/delete-vendor/{id}','VendorController@destroy')->name('vendor.destroy');


    Route::get('/vendor-products/','VendorProductController@vendorProducts')->name('vendor.products');
    Route::get('/single-vendor-products/{id}','VendorProductController@singleVendorAllProducts')->name('single.vendor.products');
    Route::get('/single-product-details/{id}','VendorProductController@singleProductDetails')->name('single.products.details');
//    Route::get('/single-product-details-lang/{id}','VendorProductController@singleProductDetailsLang')->name('single.products.details.lang');


    Route::get('/vendor_order','VendorOrderController@admin_order')->name('admin_order');

    Route::get('/approve-vendor_product/{id}','VendorProductController@approveVendorProduct')->name('approve_product');
    Route::get('/reject-vendor-product/{id}','VendorProductController@rejectVendorProduct')->name('reject_product');
    Route::get('/admin-vendor-approved-products','ProductController@showVendorApprovedProducts')->name('admin_vendor_products.approved_products');
    Route::get('/admin-vendor-rejected-products','ProductController@showRejectedProducts')->name('admin_vendor_products.rejected_products');
    Route::get('/admin-products','ProductController@adminProducts')->name('product.adminproducts');
    Route::get('/ban-vendor-product/{id}','VendorProductController@banVendorProduct')->name('ban_product');
    Route::get('/unban-vendor-product/{id}','VendorProductController@unBanVendorProduct')->name('unban_product');



});

// User section start
Route::group(['prefix'=>'/user','middleware'=>['user']],function(){
    Route::get('/','HomeController@index')->name('user');
     // Profile
     Route::get('/profile','HomeController@profile')->name('user-profile');
     Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
    //  Order
    Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
    Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');
    // Product Review
    Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');

    // Post comment
    Route::get('user-post/comment','HomeController@userComment')->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');

    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');
    Route::get('/vendor-request/','VendorController@vendorRequest')->name('user-request');
    Route::get('/vendor-status/','VendorController@vendorCancelRequest')->name('user-cancel-request');

});

Route::get('/vendor-request/','VendorController@vendorRequest')->name('user-request');
Route::get('/vendor-pending-request/','VendorController@vendorPendingRequests')->name('user-pending-request');
Route::get('/vendor-request-approve/{id}','VendorController@vendorRequestApprove')->name('user-request-approve');
Route::get('/active-vendors/','VendorController@activeVendors')->name('active-vendors');
Route::get('/deactive-vendors/{id}','VendorController@deactiveVendors')->name('vendor-deactivate');
Route::get('/all-vendors/','VendorController@allVendors')->name('all-vendors');
Route::get('/delete-vendor/{id}','VendorController@destroy')->name('vendor.destroy');




Route::group(['prefix'=>'/vendor','middleware'=>['auth','vendor']],function(){
    Route::get('test','TestController@index');

    Route::get('/vendor-dashboard','VendorController@dashboard')->name('vendor-dashboard');

    Route::get('/profile','VendorController@profile')->name('vendor-profile');
    Route::post('/profile/{id}','VendorController@profileUpdate')->name('vendor-profile-update');
    Route::resource('/vendor_product','VendorProductController');
    Route::get('/vendor-products','VendorProductController@showVendorApprovedProducts')->name('Vendor_products.approved_products');

    Route::get('/feature','VendorFeatureController@index');
    Route::get('/feature/edit/{id}','VendorFeatureController@edit')->name('vendorfeature.edit');
    Route::get('/feature/create/{id}','VendorFeatureController@create')->name('vendorfeature.create');
    Route::post('/feature/store/','VendorFeatureController@store')->name('vendorfeature.store');
    Route::post('/feature/store-parts/','VendorFeatureController@storeparts')->name('partsvendorfeature.store');
    Route::get('/feature/show/{id}','VendorFeatureController@show')->name('vendorfeature.show');
    Route::post('/feature/update/','VendorFeatureController@update')->name('vendorfeature.update');

    Route::get('/feature','VendorFeatureController@index');

    Route::resource('/vendor_order','VendorOrderController');


});

    //Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    //    \UniSharp\LaravelFilemanager\Lfm::routes();
    //});

Route::get('/clear_cache','LiveCmdController@clear_cache')->name('clear_cache');
Route::get('/view_clear','LiveCmdController@view_clear')->name('view_clear');
Route::get('/optimize','LiveCmdController@optimize')->name('optimize');
Route::get('/storage_link','LiveCmdController@storage_link')->name('storage_link');


//Route::get('/testmodal','TestController@testmodal');

use Stichoza\GoogleTranslate\GoogleTranslate;

Route::get('/translate', function () {
    $tr = new GoogleTranslate('hi');

//    $data[] ='';
    $data1 =  $tr->translate('i am faraz abdul basit. i am a girl.i am faraz abdul basit. i am a girl');
    $data2 =   $tr->translate(' i am a girl');

return $data1 . "<br>"."this is second string". $data2;
});

Route::get('/translatemethod', function () {
    return GoogleTranslate::trans('ich bin zayn','ur');

});
//
//Route::get('/api-translate',function (){
//   view ('language');
//});
Route::get('/api_translate','LiveCmdController@api_translate')->name('api_translate');

Route::get('/api_translate_laravel','LiveCmdController@api_translate_laravel')->name('api_translate_laravel');

Route::get('/langw3school','LiveCmdController@langw3school')->name('langw3school');
