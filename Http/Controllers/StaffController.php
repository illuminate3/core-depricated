<?php

namespace App\Modules\Core\Http\Controllers;

//use App\Modules\Jinji\Http\Models\Staff;

use App\Modules\Jinji\Http\Models\Employee;
use App\Modules\Jinji\Http\Repositories\EmployeeRepository;
use App\Modules\Core\Http\Repositories\LocaleRepository;
use App\Modules\Jinji\Http\Models\Contact;
use App\Modules\Jinji\Http\Repositories\ContactRepository;
// use App\Modules\Kagi\Http\Models\User;
// use App\Modules\Kagi\Http\Repositories\UserRepository;

use Cache;
use Config;
use Datatables;
use Session;
use Theme;


class StaffController extends CoreController
{


// 	use DispatchesJobs, ValidatesRequests;

	/**
	 * Initializer.
	 *
	 * @return \JinjiController
	 */
	public function __construct(
//			Staff $staff,
			Employee $employee,
			EmployeeRepository $employee_repo,
			LocaleRepository $locale_repo,
			Contact $profile,
			ContactRepository $profile_repo
// 			UserRepository $user
		)
	{
//		$this->staff = $staff;
		$this->employee = $employee;
		$this->employee_repo = $employee_repo;
		$this->locale_repo = $locale_repo;
		$this->profile = $profile;
		$this->profile_repo = $profile_repo;
//		$this->user = $user;
// middleware
// 		$this->middleware('auth');
//		$this->middleware('auth', ['only' => 'staff']);
	}


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function staff()
	{
		return Theme::View('modules.core.staff.staff');
	}


	public function directory()
	{
		return Theme::View('modules.core.staff.directory');
	}


	public function show($id)
	{
		return Theme::View('modules.core.staff.dashboard',  $this->employee_repo->show($id));
	}


	/**
	* Datatables data
	*
	* @return Datatables JSON
	*/
	public function data()
	{
		$siteId = Cache::get('siteId');

// 		$query = Employee::join('contacts','employees.profile_id','=','contacts.id')
// 			->join('sites','employees.site_id','=','sites.id')
// 			->where('employees.renraku_type_id', '=', 1)
// 			->select([
// 				'employees.id',
// 				'contacts.first_name',
// 				'contacts.last_name',
// 				'contacts.email_1',
// 				'sites.name',
// 				]);
		$query = Employee::join('profiles','employees.profile_id','=','profiles.id')
			->join('sites','employees.site_id','=','sites.id')
//			->where('sites.site_id', '=', $siteId)
			->select([
				'employees.id',
				'profiles.first_name',
				'profiles.last_name',
				'profiles.email_1',
				'sites.name',
				]);
//dd($query);

		if ( $siteId != Config::get('core_tenant.default_tenant_id') ) {
			return $query->whereHas('sites', function($query) use($siteId)
			{
				$query->where('sites.id', $siteId);
			});
		}


		return Datatables::of($query)
			->addColumn(
				'actions',
				'
					<a href="{{ URL::to(\'directory/\' . $id . \'/\' ) }}" class="btn btn-info btn-sm" >
						<span class="glyphicon glyphicon-search"></span>  {{ trans("kotoba::button.view") }}
					</a>
				'
				)
			->make(true);

	}


}
