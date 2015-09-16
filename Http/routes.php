<?php

/*
|--------------------------------------------------------------------------
| Core
|--------------------------------------------------------------------------
*/

// Resources
// Controllers

Route::group(['prefix' => 'core'], function() {
	Route::get('welcome', [
		'uses'=>'CoreController@welcome'
	]);
});

Route::get('/', array(
	'uses'=>'CoreController@index'
	));


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {

	Route::get('/', array(
		'uses'=>'DashboardController@index'
		));

	Route::get('dashboard', array(
		'uses'=>'DashboardController@index'
		));

// Resources

	Route::resource('locales', 'LocalesController');
	Route::resource('settings', 'SettingsController');
	Route::resource('statuses', 'StatusesController');
/*
	Route::get('settings/{key}', array(
		'uses'=>'SettingsController@edit'
		));
*/

// Controllers
// API DATA

});
// --------------------------------------------------------------------------
