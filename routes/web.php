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
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   return "Cleared!";
});

Route::get('/migrate', function() {
   Artisan::call('migrate');
   /*Artisan::call('migrate:refresh --path=/database/migrations/2021_08_16_162921_create_activities_table.php');*/
   return "Migrated!";
});

Route::group(['namespace' => 'Website','as'=>'webiste.'],function(){

	Route::get('/','HomeController@index')->name('home.index');
	
	Route::get('/menu/{slug}','MenuController@index')->name('menu.index');
	Route::get('/restaurants','MenuController@listCategoryWise')->name('restaurant.list.categ');

	Route::get('/cuisines/{id}','MenuController@restaurantList')->name('restaurant.list');
	Route::post('/website/add-to-cart','MenuController@addToCart');

	Route::get('/bussiness-account','BussinessAccountController@create')->name('bussiness.account');
	Route::post('/bussiness-account','BussinessAccountController@store');

	Route::get('/about','HomeController@aboutus')->name('aboutus');
	
	Route::post('/website/add-wish-list','WishlistController@addToWishList');

});

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

});