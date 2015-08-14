<?php namespace Illuminate3\Uploads;

use Illuminate\Support\ServiceProvider;
use Route, Config;

class UploadsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->package('uploads', 'uploads');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->make('formbuilder')
			->register('file', 'Illuminate3\Uploads\Form\FileElement')
			->register('image', 'Illuminate3\Uploads\Form\ImageElement');


		Route::get('uploads/{path}', 'Illuminate3\Uploads\Controller\DownloadController@file')->where('path', '.*');
		Route::get('image/{width}/{height}/{path}', 'Illuminate3\Uploads\Controller\DownloadController@image')->where('path', '.*');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('uploads');
	}

}