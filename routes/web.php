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

Route::get('/', function () {
    return redirect()->route('public.site');
});

Route::get('/admin', function () {
    return redirect()->route('admin.view.login');
});


Route::get('admin/login',['as' => 'admin.view.login','uses' => 'LoginController@viewLogin']);
Route::post('admin/login',['as' => 'admin.login','uses' => 'LoginController@login_action']);

Route::get('site/home',['as' => 'public.site','uses' => 'DashboardController@visitSite']);
Route::get('site/about',['as' => 'site.about','uses' => 'DashboardController@about']);
Route::get('site/accomodation',['as' => 'site.accomodation','uses' => 'DashboardController@accomodation']);
Route::get('site/nile_curises',['as' => 'site.nile_curises','uses' => 'DashboardController@nile_curises']);
Route::get('site/tour_packages',['as' => 'site.tour_packages','uses' => 'DashboardController@tour_package']);
Route::get('site/tour_packages/{package_id}',['as' => 'site.tour_packages.show','uses' => 'DashboardController@package_show']);

Route::post('site/tour_packages/contact',['as' => 'site.tour_packages.contact','uses' => 'DashboardController@package_contact']);


Route::group(['middleware' => ['admin.auth']], function () {

	Route::get('admin/dashboard', ['as'=> 'admin.dashboard', 'uses' => 'DashboardController@dashboard']);
	Route::get('admin/logout',['as' => 'admin.logout','uses' => 'LoginController@logout']);

	Route::get('admin/users', ['as'=> 'admin.users.index', 'uses' => 'UsersController@index']);
	Route::post('admin/users', ['as'=> 'admin.users.store', 'uses' => 'UsersController@store']);
	Route::get('admin/users/create', ['as'=> 'admin.users.create', 'uses' => 'UsersController@create']);
	Route::put('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'UsersController@update']);
	Route::patch('admin/users/{users}', ['as'=> 'admin.users.update', 'uses' => 'UsersController@update']);
	Route::delete('admin/users/{users}', ['as'=> 'admin.users.destroy', 'uses' => 'UsersController@destroy']);
	Route::get('admin/users/{users}', ['as'=> 'admin.users.show', 'uses' => 'UsersController@show']);
	Route::get('admin/users/{users}/edit', ['as'=> 'admin.users.edit', 'uses' => 'UsersController@edit']);
	Route::post('admin/users/verifyEmail', ['as'=> 'admin.users.verifyEmail', 'uses' => 'UsersController@verifyEmail']);


	Route::get('admin/famous_places', ['as'=> 'admin.famousPlaces.index', 'uses' => 'FamousPlacesController@index']);
	Route::post('admin/famous_places', ['as'=> 'admin.famousPlaces.store', 'uses' => 'FamousPlacesController@store']);
	Route::get('admin/famous_places/create', ['as'=> 'admin.famousPlaces.create', 'uses' => 'FamousPlacesController@create']);
	Route::post('admin/famous_places/{famous_places}', ['as'=> 'admin.famousPlaces.update', 'uses' => 'FamousPlacesController@update']);
	Route::patch('admin/famous_places/{famous_places}', ['as'=> 'admin.famousPlaces.update', 'uses' => 'FamousPlacesController@update']);
	Route::delete('admin/famous_places/{famous_places}', ['as'=> 'admin.famousPlaces.destroy', 'uses' => 'FamousPlacesController@destroy']);
	Route::get('admin/famous_places/{famous_places}', ['as'=> 'admin.famousPlaces.show', 'uses' => 'FamousPlacesController@show']);
	Route::get('admin/famous_places/{famous_places}/edit', ['as'=> 'admin.famousPlaces.edit', 'uses' => 'FamousPlacesController@edit']);


	Route::get('admin/packages', ['as'=> 'admin.packages.index', 'uses' => 'PackageController@index']);
	Route::post('admin/packages', ['as'=> 'admin.packages.store', 'uses' => 'PackageController@store']);
	Route::get('admin/packages/create', ['as'=> 'admin.packages.create', 'uses' => 'PackageController@create']);
	Route::put('admin/packages/{packages}', ['as'=> 'admin.packages.update', 'uses' => 'PackageController@update']);
	Route::patch('admin/packages/{packages}', ['as'=> 'admin.packages.update', 'uses' => 'PackageController@update']);
	Route::delete('admin/packages/{packages}', ['as'=> 'admin.packages.destroy', 'uses' => 'PackageController@destroy']);
	Route::get('admin/packages/{packages}', ['as'=> 'admin.packages.show', 'uses' => 'PackageController@show']);
	Route::get('admin/packages/{packages}/edit', ['as'=> 'admin.packages.edit', 'uses' => 'PackageController@edit']);

	Route::get('admin/prices', ['as'=> 'admin.prices.index', 'uses' => 'PriceController@index']);
	Route::post('admin/prices', ['as'=> 'admin.prices.store', 'uses' => 'PriceController@store']);
	Route::get('admin/prices/create', ['as'=> 'admin.prices.create', 'uses' => 'PriceController@create']);
	Route::put('admin/prices/{prices}', ['as'=> 'admin.prices.update', 'uses' => 'PriceController@update']);
	Route::patch('admin/prices/{prices}', ['as'=> 'admin.prices.update', 'uses' => 'PriceController@update']);
	Route::delete('admin/prices/{prices}', ['as'=> 'admin.prices.destroy', 'uses' => 'PriceController@destroy']);
	Route::get('admin/prices/{prices}', ['as'=> 'admin.prices.show', 'uses' => 'PriceController@show']);
	Route::get('admin/prices/{prices}/edit', ['as'=> 'admin.prices.edit', 'uses' => 'PriceController@edit']);

	Route::get('admin/accomodations', ['as'=> 'admin.accomodations.index', 'uses' => 'AccomodationController@index']);
	Route::post('admin/accomodations', ['as'=> 'admin.accomodations.store', 'uses' => 'AccomodationController@store']);
	Route::get('admin/accomodations/create', ['as'=> 'admin.accomodations.create', 'uses' => 'AccomodationController@create']);
	Route::put('admin/accomodations/{accomodations}', ['as'=> 'admin.accomodations.update', 'uses' => 'AccomodationController@update']);
	Route::patch('admin/accomodations/{accomodations}', ['as'=> 'admin.accomodations.update', 'uses' => 'AccomodationController@update']);
	Route::delete('admin/accomodations/{accomodations}', ['as'=> 'admin.accomodations.destroy', 'uses' => 'AccomodationController@destroy']);
	Route::get('admin/accomodations/{accomodations}', ['as'=> 'admin.accomodations.show', 'uses' => 'AccomodationController@show']);
	Route::get('admin/accomodations/{accomodations}/edit', ['as'=> 'admin.accomodations.edit', 'uses' => 'AccomodationController@edit']);
	Route::post('admin/accomodations/imageRemove', ['as'=> 'admin.accomodations.image_remove', 'uses' => 'AccomodationController@imageRemove']);


	Route::get('admin/bookings', ['as'=> 'admin.bookings.index', 'uses' => 'BookingController@index']);
	Route::post('admin/bookings', ['as'=> 'admin.bookings.store', 'uses' => 'BookingController@store']);
	Route::get('admin/bookings/create', ['as'=> 'admin.bookings.create', 'uses' => 'BookingController@create']);
	Route::put('admin/bookings/{bookings}', ['as'=> 'admin.bookings.update', 'uses' => 'BookingController@update']);
	Route::patch('admin/bookings/{bookings}', ['as'=> 'admin.bookings.update', 'uses' => 'BookingController@update']);
	Route::delete('admin/bookings/{bookings}', ['as'=> 'admin.bookings.destroy', 'uses' => 'BookingController@destroy']);
	Route::get('admin/bookings/{bookings}', ['as'=> 'admin.bookings.show', 'uses' => 'BookingController@show']);
	Route::get('admin/bookings/{bookings}/edit', ['as'=> 'admin.bookings.edit', 'uses' => 'BookingController@edit']);

	Route::get('admin/categories', ['as'=> 'admin.categories.index', 'uses' => 'CategoryController@index']);
	Route::post('admin/categories', ['as'=> 'admin.categories.store', 'uses' => 'CategoryController@store']);
	Route::get('admin/categories/create', ['as'=> 'admin.categories.create', 'uses' => 'CategoryController@create']);
	Route::put('admin/categories/{categories}', ['as'=> 'admin.categories.update', 'uses' => 'CategoryController@update']);
	Route::patch('admin/categories/{categories}', ['as'=> 'admin.categories.update', 'uses' => 'CategoryController@update']);
	Route::delete('admin/categories/{categories}', ['as'=> 'admin.categories.destroy', 'uses' => 'CategoryController@destroy']);
	Route::get('admin/categories/{categories}', ['as'=> 'admin.categories.show', 'uses' => 'CategoryController@show']);
	Route::get('admin/categories/{categories}/edit', ['as'=> 'admin.categories.edit', 'uses' => 'CategoryController@edit']);

	Route::get('admin/pages/{pages}/edit', ['as'=> 'admin.pages.edit', 'uses' => 'PageController@edit']);
	Route::put('admin/pages/{pages}', ['as'=> 'admin.pages.update', 'uses' => 'PageController@update']);
	Route::patch('admin/pages/{pages}', ['as'=> 'admin.pages.update', 'uses' => 'PageController@update']);


	Route::put('admin/webSettings/{webSettings}', ['as'=> 'admin.webSettings.update', 'uses' => 'WebSettingController@update']);
	Route::patch('admin/webSettings/{webSettings}', ['as'=> 'admin.webSettings.update', 'uses' => 'WebSettingController@update']);
	Route::get('admin/webSettings/{webSettings}/edit', ['as'=> 'admin.webSettings.edit', 'uses' => 'WebSettingController@edit']);
});