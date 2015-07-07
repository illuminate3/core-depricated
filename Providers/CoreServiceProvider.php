<?php

namespace App\Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;

use App;
use Config;
use Lang;
use View;


class CoreServiceProvider extends ServiceProvider
{


	/**
	 * Register the Core module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Core\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Core module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('core', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('core', realpath(__DIR__.'/../Resources/Views'));
	}


}
