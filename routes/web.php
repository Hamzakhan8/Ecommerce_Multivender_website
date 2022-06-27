
<?php

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::resource('article','ArticleController');
Route::get('article/{id}','ArticleController@show');
Route::get('article/create','ArticleController@create');
Route::post('article/store','ArticleController@store');
//write the method like get or post u have mentioned in the form like method={'method_name'} after scope resolution
//write same here method name as mentioned in form
Route::get('article/edit/{id}','ArticleController@edit');
Route::post('article/update/{id}','ArticleController@update');
Route::get('article/delete/{id}', 'ArticleController@destroy');
Route::get('middlewaretesting','ArticleController@MiddlewareTesting')->name('middlewareTesting');
Route::get('article1to1','ArticleController@one2one');

Route::get('tagSearch/{id}','ArticleController@TagSearch')->name('tag.search');


Route::get('admin-dash','Controller@adminDashboard')->middleware('auth');

// ========================== USER DASHBOARD ===========================================================

Route::get('user-dash',function(){
return view('user-dashboard/layouts/master');
});


// Auth routes
Auth::routes();

// front end home index page
Route::get('/home/page', 'FrontEndController@index')->name('home.page');
Route::get('/home/login/page', 'FrontEndController@showLogin')->name('home.login.page');
Route::get('/home/register/page', 'FrontEndController@showRegister')->name('home.register.page');
Route::get('/', 'FrontEndController@index');

// ========================== RSOURCE CONTROLLER  ===========================================================

Route::resource('brand','BrandController');
Route::resource('user','UserController');
Route::resource('category','CategoryController');
Route::resource('comment','CommentController');
Route::resource('like','LikeController');
Route::resource('order','OrderController');
Route::resource('product','ProductController');
Route::get('product/{id}','ProductController@show')->name('product.show');
Route::resource('subcategory','SubcategoryController');
Route::resource('coupon','CouponController');
Route::resource('profile','ProfileController');
Route::resource('contact','ContactController');
Route::resource('city','CityController');
Route::resource('hall','HallController');

// routes whose destroy functions are not working we over ride them here

Route::get('brand/delete/{brand}','BrandController@destroy')->name('brand.destroy');
Route::get('user/delete/{user}','UserController@destroy')->name('user.destroy');
Route::get('contactUs/delete/{id}','ContactController@destroy')->name('contact.destroy');
Route::get('all-admins', 'UserController@allAdmins')->name('user.admins');
// ======================================================================================
	// Product Routes front END
Route::get('shop/category/{name}','FrontEndController@CategoryProducts')->name('category.products');
Route::get('shop/category/all-product','FrontEndController@allproducts')->name('allproduct');
Route::get('hot/deals/{name}','FrontEndController@hotDeals')->name('hotDeals');
Route::get('shop/subcategory/{name}','FrontEndController@SubCategoryProducts')->name('subcategory.products');
Route::get('shop/prouct-details/{name}','FrontEndController@ProductDetails')->name('shop.product.details');
Route::get('post/comment','FrontEndController@PostComment')->name('post.comment')->middleware('auth');
Route::get('search/product', 'FrontEndController@SearchProduct')->name('search.product');
Route::get('view/all/gifts','FrontEndController@viewAllGifts')->name('ViewAllGifts');
Route::get('contactUs','FrontEndController@contactUs')->name('contactUs');
//front end contact page
Route::get('allShop','FrontEndController@allShop')->name('allShop');
Route::get('shop/products/{id}','FrontEndController@shopProducts')->name('shop.products');
Route::get('shop/gifts/{id}','FrontEndController@shopGifts')->name('shop.gift');
Route::get('all/ocassions','FrontEndController@allOcassions')->name('allocassions');
Route::get('all/halls','FrontEndController@hallList')->name('hallList');
Route::get('cityAjax/{id}','FrontEndController@CityAjax');
//city ajax

Route::get('city/products/{city}/{category}','FrontEndController@cityProducts')->name('city.products');
Route::get('search/products/{city}/{search}','FrontEndController@citySearchProducts')->name('citySearch.products');


// ============================ Profile Route ======================================


// ============================= CART ROUTES =========================================================
Route::post('shop/add-to-cart','FrontEndController@AddCartItem')->name('add.cart')->middleware('auth');
Route::get('shop/cart','FrontEndController@CartDetails')->name('cart.list')->middleware('auth');
Route::get('shop/cart-update/{id}','FrontEndController@CartUpdate')->name('update.cart')->middleware('auth');
Route::post('shop/apply-coupon','FrontEndController@ApplyCoupon')->name('apply.coupon')->middleware('auth');
Route::get('shop/checkout/{price}', 'FrontEndController@Checkout')->name('checkout')->middleware('auth');
Route::post('shop/checkout/payment', 'FrontEndController@PlaceOrder')->name('order.place')->middleware('auth');
Route::get('shop/order/self','FrontEndController@selfOrder')->name('order.self')->middleware('auth');


Route::get('product/like/{product}','FrontEndController@ProductLike')->name('product.like');


Route::get('categoryAjax/{id}','ProductController@CategoryAjax');



// pagination
Route::post('pagination/fetch', 'FrontEndController@fetch')->name('pagination.fetch');
