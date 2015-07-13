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


Route::get('home', array(
	'uses'=>'DashboardController@index'
	));


Route::get('/', array(
	'uses'=>'CoreController@index'
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
/*
	Route::get('settings/{key}', array(
		'uses'=>'SettingsController@edit'
		));
*/

// Controllers
// API DATA

});
// --------------------------------------------------------------------------
