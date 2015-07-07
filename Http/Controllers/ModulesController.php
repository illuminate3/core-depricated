<?php
namespace App\Modules\Kantoku\Http\Controllers;

//use Illuminate\Http\Request;
use App\Modules\Kantoku\Http\Requests\DeleteRequest;
//use App\Modules\Kantoku\Http\Requests\ModuleCreateRequest;
use App\Modules\Kantoku\Http\Requests\ModuleUpdateRequest;

use Cache;
use Config;
use Flash;
use Module;

class ModulesController extends KantokuController {

/*
{!! Module::asset('moduleslug::css/bootstrap.css') !!}
{!! Module::asset('moduleslug::js/bootstrap.js') !!}
Module::view('modules.yourmodule.your.view')
*/

	/**
	 * Create a new UserController instance.
	 *
	 * @param  App\Modules\Kagi\Http\Domain\Repositories\ModuleRepository $module
	 * @return void
	 */
	public function __construct()
	{
// middleware
// 		$this->middleware('auth');
// 		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
// dd("loaded");

//		$activeModule				= Module::getActive();
		$modules					= Module::all();
// dd($modules);
// // $moduleProperties = Module::getProperties('Jinji');
// // dd($moduleProperties);
//
// //dd(file_get_contents(Config::get('modules.path', public_path('Modules')) . '/' . 'Jinji' . '/module.json'));
//
// //		$collection = new \Illuminate\Support\Collection();
// 		foreach ($modules as $module) {
// // 			$json_string = Config::get('modules.path', public_path('Modules')) . '/' . $module . '/module.json';
// // 			$jsondata = file_get_contents($json_string);
// $moduleProperties = Module::getProperties($module);
//
// //$moduleProperties = array_merge($moduleProperties, $moduleProperties);
//
//
// //			$collection[$module] = json_decode($moduleProperties, true);
// //			$collection[$module] = $moduleProperties;
// 		}
// dd($moduleProperties);


// dd($collection);
// dd($collection['moduleSkeleton']['slug']);
// foreach ($modules as $module) {
//
// $slug_property = $module . '::slug';
// //dd($slug_property);
//
// //dd(Module::getProperty($slug_property, trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.slug')));
//
// $slug = Module::getProperty($slug_property, trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.slug'));
// print_r($slug);
//
// }
// dd($slug);
//
//
//
// dd($modules);

		return View('kantoku::modules.index',
			compact(
// 				'activeModule',
// 				'collection',
				'modules'
			));


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
dd("create");
//		return view('kagi::users.create', $this->user->create());
		return view('kantoku::modules.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\requests\UserCreateRequest $request
	 *
	 * @return Response
	 */
	public function store(
		UserCreateRequest $request
		)
	{
dd("store");
		$this->user->store($request->all());

		return redirect('user')->with('ok', trans('back/users.created'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
dd("show");
		return View('kantoku::modules.show',  $this->module->show($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($module)
	{
//dd("edit");
//		$module = $this->moduleRepo->edit($slug);
//		return View('kantoku::modules.edit',  $this->module->edit($id));


//		$activeModule				= Module::getActive();
		$name						= Module::getProperty( $module . '::name', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.name'));
		$slug						= Module::getProperty( $module . '::slug', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.slug'));
		$version					= Module::getProperty( $module . '::version', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.version'));
		$description				= Module::getProperty( $module . '::description', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.description'));
		$enabled					= Module::getProperty( $module . '::enabled', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.enabled'));
		$order						= Module::getProperty( $module . '::order', trans('kotoba::general.error.no_data') . ':' . trans('kotoba::general.order'));
//dd($slug);

		if ($enabled == true ) {
			$checked = 'checked';
		} else {
			$checked = null;
		}
//dd($checked);

		return View('kantoku::modules.edit',
			compact(
// 				'activeModule',
				'checked',
				'name',
				'slug',
				'description',
				'version',
				'enabled',
				'order'
			));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\requests\UserUpdateRequest $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(
		ModuleUpdateRequest $request,
		$slug
		)
	{
//dd($slug);

// 		$activeModule				= Module::getActive();
		$name						= $request->name;
		$slug						= $request->slug;
		$description				= $request->description;
		$version					= $request->version;
		$enabled					= $request->enabled;
		$order						= $request->order;

		if ( (Module::isDisabled($slug)) && ($enabled == 1)) {
			Module::enable($slug);
//			Cache::forever('module', $slug);
		} else {
			Module::disable($slug);
		}

		Module::setProperty( $slug . '::name', $name);
		Module::setProperty( $slug . '::slug', $slug);
		Module::setProperty( $slug . '::description', $description);
		Module::setProperty( $slug . '::version', $version);
		Module::setProperty( $slug . '::order', $order);
		Module::setProperty( $slug . '::enabled', $enabled);

		Flash::success( trans('kotoba::cms.success.module_update') );
		return redirect('admin/modules');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(
		DeleteRequest $request,
		$id
		)
	{
dd("destroy");
		$this->user->destroy($id);

		return redirect('user')->with('ok', trans('back/users.destroyed'));
	}


}
