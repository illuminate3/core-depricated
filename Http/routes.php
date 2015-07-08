<?php

/*
|--------------------------------------------------------------------------
| Core
|--------------------------------------------------------------------------
*/


// Resources
// Controllers

Route::get('welcome/general', array(
	'uses'=>'CoreController@welcome'
	));

Route::get('home', array(
	'uses'=>'CoreController@index'
	));


Route::get('/', array(
	'uses'=>'DashboardController@index'
	));

// API DATA


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {

// Resources

	Route::resource('locales', 'LocalesController');
	Route::resource('settings', 'SettingsController');
//	Route::resource('statuses', 'StatusesController');


// Controllers
// API DATA
/*
	Route::get('api/statuses', array(
		'uses'=>'StatusesController@data'
		));
*/
});
// --------------------------------------------------------------------------

Route::group(['prefix' => 'core'], function() {
	Route::get('/', function() {
		dd('This is the Core module index page.');
	});
});
