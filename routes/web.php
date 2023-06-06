<?php

use App\Http\Controllers\AdminController;
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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@logout')->name('admin.logout');
//=========================== Admin ====================================
//Category section
Route::get('admin/categories','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store','Admin\CategoryController@storeCat')->name('store.category');
Route::get('admin/categories/edit/{id}','Admin\CategoryController@Edit');
Route::post('admin/categories/update/','Admin\CategoryController@updateCat')->name('update.category');
Route::get('admin/categories/delete/{id}','Admin\CategoryController@Delete');
Route::get('admin/categories/inactive/{id}','Admin\CategoryController@Inactive');
Route::get('admin/categories/active/{id}','Admin\CategoryController@Active');

// Brand-------------------------------------
Route::get('admin/brand','Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brand-store','Admin\BrandController@store')->name('store.brand');
Route::get('admin/brand/edit/{id}','Admin\BrandController@Edit');
Route::post('admin/brand/update/','Admin\BrandController@updateBra')->name('update.brand');
Route::get('admin/brand/delete/{id}','Admin\brandController@Delete');
Route::get('admin/brand/inactive/{id}','Admin\brandController@Inactive');
Route::get('admin/brand/active/{id}','Admin\brandController@Active');

// product-------------------------------------
Route::get('admin/products/add','Admin\ProductController@addProduct')->name('add-products');
Route::post('admin/products/store','Admin\ProductController@storeProduct')->name('store-products');
Route::get('admin/products/manage','Admin\ProductController@manageProduct')->name('manage-products');
Route::get('admin/products/edit/{id}','Admin\ProductController@edit_pro')->name('edit-product');
Route::post('admin/products/update/{id}','Admin\ProductController@update_products')->name('update-products');
Route::post('admin/products/image-update/{id}','Admin\ProductController@updateImage')->name('update-image');
Route::get('admin/products/delete/{id}','Admin\ProductController@deleteImage')->name('delete-image');
Route::get('admin/products/inactive/{id}','Admin\ProductController@Inactive');
Route::get('admin/products/active/{id}','Admin\ProductController@active');
//--------------------------Coupon------------------------------
Route::get('admin/coupon','Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/coupon/store','Admin\CouponController@storeCoupon')->name('store.coupon');
Route::get('admin/coupon/edit/{id}','Admin\CouponController@coupomEdit');
Route::post('admin/coupon/update/{id}','Admin\CouponController@updateCoupon')->name('update.coupon');
Route::get('admin/coupon/delete/{id}','Admin\CouponController@Delete');
Route::get('admin/coupon/inactive/{id}','Admin\CouponController@Inactive');
Route::get('admin/coupon/active/{id}','Admin\CouponController@Active');
//------------------------Orders------------------------------------------
Route::get('admin/orders','Admin\CouponController@orderIndex')->name('admin.orders');
Route::get('admin/orders/view/{id}','Admin\CouponController@viewOrder');
//===========================Frontend Routes============================
//---------------Cart-------------------------------------------
Route::post('add/to-cart/{product_id}','CartController@addToCart');
Route::get('cart','CartController@cartPage');
Route::get('cart/destroy/{cart_id}','CartController@destroy');
Route::post('cart/quantity/update/{cart_id}','CartController@quantityUpdate');
Route::post('coupon/apply','CartController@applyCoupon');
Route::get('coupon/destroy','CartController@couponDestroy');

//-------------------Wishlist----------------------------
Route::get('add/to-wishlist/{product_id}','WishlistController@addToWishlist');
Route::get('wishlist','WishlistController@wishlistPage');
Route::get('wishlist/destroy/{wishlist_id}','WishlistController@destroy');
//-------------------Product details----------------------------
Route::get('product/details/{product_id}','FrontendController@productDetails');
// -------------------checkout controller-----------------------------
Route::get('checkout','CheckoutController@index');
Route::post('place/order','OrderController@storeOrder')->name('place-order');
Route::get('order/success','OrderController@orderSuccess');




