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
		$languages = $this->getLocales();
		View::share('languages', $languages);
	}

	public function register()
	{
		//
	}


	public function getLocales()
	{
		$languages = Cache::get('locales');
//dd($languages);

		if ($languages == null) {
//			$languages = Locale::all();
			$languages = Cache::rememberForever('languages', function() {
				return DB::table('locales')
					->where('active', '=', 1)
					->get();
			});
		}
//dd($languages);

		if ( empty($languages) ) {
			throw new LocalesNotDefinedException('Please make sure you have run "php artisan config:publish dimsav/laravel-translatable" ' . ' and that the locales configuration is defined.');
		}
//dd($languages);

	return $languages;

	}


}
