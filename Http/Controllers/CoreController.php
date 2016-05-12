<?php

namespace App\Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;

use Auth;
use Theme;

class CoreController extends Controller
{

// 	use DispatchesJobs, ValidatesRequests;

	/**
	 * Initializer.
	 *
	 * @return \CoreController
	 */
	public function __construct()
	{
// middleware
//		$this->middleware('auth');
//		$this->middleware('admin');
	}


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function welcome()
	{
		return Theme::View('modules.core.welcome.core');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//dd(Auth::user());

		if ( Auth::user() != null) {
			if ( Auth::user()->can('manage_own') ) {
				return Theme::View('modules.core.dashboard');
			}
		}

		return Theme::View('modules.core.landing');

	}


}
