<?php

namespace App\Modules\Core\Http\Presenters;

use Laracasts\Presenter\Presenter;

use Config;
use DB;
use Session;


class Core extends Presenter {


	/**
	 * Present the name
	 *
	 * @return string
	 */
	public function name()
	{
		return ucwords($this->entity->name);
	}

	public function checked()
	{
//dd("loaded");
		$return = '';
		$activated = $this->entity->activated;
		if ( $activated == 1 ) {
			$return = "checked";
		}

		return $return;
	}

	public function status($status)
	{
//dd($status);

		$return = trans('kotoba::general.enabled');
		if ( $status == 0 ) {
			$return = trans('kotoba::general.disabled');
		}

		return $return;
	}


}
