<?php

namespace Illuminate3\Uploads\Controller;

use Intervention\Image\Image;
use Response, App;

class DownloadController extends \BaseController
{
	/**
	 * @param $path
	 * @return Illuminate\Http\Response
	 */
	public function file($path)
	{
		$file = storage_path($path);

		if (!file_exists($file)) {
			App::abort(404);
		}

		return Response::download($file);
	}

	/**
	 * @param $path
	 * @param $width
	 * @param $height
	 * @return Illuminate\Http\Response
	 */
	public function image($width, $height, $path)
	{
		$file = storage_path($path);

		if (!file_exists($file)) {
			dd($file);
			App::abort(404);
		}

		return Image::make($file)->resize($width, $height);
	}

}

