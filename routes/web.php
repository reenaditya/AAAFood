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


/*===  RUN COMMAND ======*/
Route::get('/clear', function() {
   Artisan::call('config:clear');
   /*Artisan::call('view:clear');
   Artisan::call('config:cache');
   Artisan::call('cache:clear');*/
   return "Cleared!";
});

Route::get('/migrate', function() {
   Artisan::call('migrate');
   /*Artisan::call('migrate:refresh --path=/database/migrations/2021_09_01_180930_create_restraurant_requests_table.php');*/
   return "Migrated!";
});



/*SOCIAL MEDIA LOGIN */
Route::get('auth/google', 'SocialLoginController@redirectToGoogle');
Route::get('auth/google/callback', 'SocialLoginController@handleGoogleCallback');

Route::get('auth/facebook', 'SocialLoginController@facebookRedirect');
Route::get('auth/facebook/callback', 'SocialLoginController@loginWithFacebook');
/*END*/

/*STRIPE PAYMENTS*/
Route::get('stripe','StripeController@stripe');
Route::post('stripe','StripeController@stripePost')->name('stripe.post');
/*Route::post('placeorder/cod','StripeController@codPost')->name('placeorder.cod');*/
/*END*/

Route::group(['namespace' => 'Website','as'=>'webiste.'],function(){

	Route::get('/','HomeController@index')->name('home.index');
	Route::post('/search/suggetion/list','HomeController@searchRestro');
	Route::post('/home/search','HomeController@homeSearch');
	
	Route::get('/menu/{slug}','MenuController@index')->name('menu.index');
	Route::get('/restaurants','MenuController@listCategoryWise')->name('restaurant.list.categ');

	Route::get('/cuisines/{id}','MenuController@restaurantList')->name('restaurant.list');
	Route::post('/website/add-to-cart','MenuController@addToCart');
	Route::get('/menu/{slug}/checkout','MenuController@checkout');
	Route::get('/order/history','MenuController@orderHistory')->name('order.history');

	Route::get('/bussiness-account','BussinessAccountController@create')->name('bussiness.account');
	Route::post('/bussiness-account','BussinessAccountController@store');
	Route::get('/delivery-account','HomeController@deliveryAcc')->name('delivery.account');

	Route::get('/about','HomeController@aboutus')->name('aboutus');
	Route::post('/website/add-wish-list','WishlistController@addToWishList');
	
	/*Create Restaurant link*/
	Route::get('/bussiness-account/restaurant/add','RestaurantController@index');
	Route::post('/bussiness-account/restaurant/add','RestaurantController@store');


});

/*Verify email link*/
Route::get('user/verify/email','Admin\OrderController@deliveryBoyLinkEmailVerify');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/*
|-----------------------------------------------------------------------------
| Admin Routes
|-----------------------------------------------------------------------------
|
*/
Route::group([
	'namespace' => 'Admin',
	'as'=>'admin.',
	'prefix' => 'admin',
	'middleware' => ['auth:sanctum', 'verified']
],function(){

	Route::get('dashboard','DashboardController@index')->name('dashboard.index');
	
	Route::resource('user', 'UserManagementController');
	
	Route::resource('cuisine', 'CuisineController');
	
	Route::resource('restaurant', 'RestaurantController');
	
	Route::resource('menu_group', 'MenuGroupController');
	
	Route::resource('menu_item', 'MenuItemController');
	Route::post('/menu-item/menu-group-quantity','MenuItemController@menuGroupQuantity');
	
	Route::resource('menu_quantity_group','MenuQuantityGroupController');
	
	Route::resource('menu_item_price_quantity','MenuItemPriceQuantityController');
	
	Route::resource('restaurant_request','RestraurantRequestController');
	
	Route::resource('setting','SettingController');

	Route::resource('order','OrderController');
	Route::post('order/payment/status','OrderController@paymentStatus');
	Route::post('order/status','OrderController@orderStatus');
	Route::get('order-new','OrderController@newOrder')->name('order.new');
	Route::get('order-completed','OrderController@completedOrder')->name('order.completed');
	Route::get('order-details/{id}','OrderController@detailsOrder')->name('order.details');
	Route::get('delivery-boy-order-history','OrderController@deliveryBoyOrderHistory')->name('order.db.history');
	Route::post('order/post-comment','OrderController@postComment');

	Route::post('user/change-delivery-boy-status','OrderController@deliveryBoyStatus');
	Route::post('user/delivery-boy-order-accept-status','OrderController@deliveryBoyOrderAccept');
	Route::post('user/delivery-boy-verify-email','OrderController@deliveryBoyVerifyEmail');

});