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

Route::group(['namespace' => 'Website','as'=>'webiste.'],function(){

	Route::get('/','HomeController@index')->name('home.index');
	Route::get('/menu/{slug}','MenuController@index')->name('menu.index');
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
	Route::resource('cuisine', 'CuisineController');
	Route::resource('restaurant', 'RestaurantController');
	Route::resource('menu_group', 'MenuGroupController');
	Route::resource('menu_item', 'MenuItemController');
	Route::post('/menu-item/menugroup','MenuItemController@menuGroup');
	Route::resource('menu_quantity_group','MenuQuantityGroupController');
	Route::resource('menu_item_price_quantity','MenuItemPriceQuantityController');

});