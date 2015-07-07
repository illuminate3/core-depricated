<?php
namespace App\Modules\Core\Http\Controllers;

use App\Modules\Kagi\Http\Models\User;
// use App\Modules\Core\Http\Models\Status;
// use App\Modules\Core\Http\Repositories\StatusRepository;

// use Illuminate\Http\Request;
// use App\Modules\Core\Http\Requests\DeleteRequest;
// use App\Modules\Core\Http\Requests\StatusCreateRequest;
// use App\Modules\Core\Http\Requests\StatusUpdateRequest;

use Auth;
use Theme;

class DashboardController extends CoreController {


	public function __construct(
			User $user
// 			RoleRepository $role
		)
	{
		$this->user = $user;
// 		$this->role = $role;

// middleware
//		$this->middleware('guest');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//dd(Auth::user());
//dd(Theme::getProperty('theme::name', 'default value if nothing is returned'));
//dd(Theme::all());
//dd(Theme::getActive());
//dd(Theme::View('modules.general.landing'));

		if ( Auth::user() != null) {
			if ( Auth::user()->can('manage_admin') ) {
//				return View('general::dashboard');
				return Theme::View('modules.general.dashboard');
			}
		}
//dd(Theme::all());
//		return View('general::landing');
//Theme::setLayout('bootstrap');

//		return View('general::landing');
		return Theme::View('modules.general.landing');

	}


}
