<?php

namespace App\Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Modules\Core\Http\Models\Locale;

use Config;
use Schema;
use View;


class ViewComposerServiceProvider extends ServiceProvider
{


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{

		$locales = $this->getLocales();
//dd($locales);

		View::share('locales', $locales);
	}

	public function register()
	{
		//
	}


	public function getLocales()
	{

		$locales = Locale::all();
		if ( empty($locales) ) {
			throw new LocalesNotDefinedException('Please make sure you have run "php artisan config:publish dimsav/laravel-translatable" ' . ' and that the locales configuration is defined.');
		}
//dd($locales);

	return $locales;

	}


}
