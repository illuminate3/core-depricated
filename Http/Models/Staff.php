<?php

namespace App\Modules\Core\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class Staff extends Model {

	use PresentableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contracts';

// Presenter ---------------------------------------------------------------
	protected $presenter = 'App\Modules\Jinji\Http\Presenters\Jinji';

// Translation Model -------------------------------------------------------
// Hidden ------------------------------------------------------------------
// Fillable ----------------------------------------------------------------
// Relationships -----------------------------------------------------------

// hasMany
// belongsTo
// belongsToMany

// Functions ---------------------------------------------------------------
// Scopes ---------------------------------------------------------------

	public function scopeSiteID($query)
	{
//		return $query->where('site_id', '=', 11);
				$siteId = Cache::get('siteId');
				return $query->whereHas('sites', function($query) use($siteId)
				{
					$query->where('sites.id', $siteId);
				});
	}


}
