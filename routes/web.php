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
