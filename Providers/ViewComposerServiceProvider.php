<?php

namespace App\Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;

use App\Modules\Core\Http\Models\Locale;

use DB;
use Cache;
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
		View::share('locales', $locales);
	}

	public function register()
	{
		//
	}


	public function getLocales()
	{
/*
$value = Cache::get('key');


$value = Cache::rememberForever('users', function() {
    return DB::table('users')->get();
});


$value = Cache::get('key', function() {
    return DB::table(...)->get();
});

*/
//		$locales = Locale::all();
		$locales = Cache::get('locales');
//dd($locales);

		if ($locales == null) {
			$locales = Cache::rememberForever('locales', function() {
				return DB::table('locales')
					->where('active', '=', 1)
					->get();
			});
		}
//dd($locales);

		if ( empty($locales) ) {
			throw new LocalesNotDefinedException('Please make sure you have run "php artisan config:publish dimsav/laravel-translatable" ' . ' and that the locales configuration is defined.');
		}
//dd($locales);

	return $locales;

	}


}
