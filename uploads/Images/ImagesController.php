<?php namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use App;
use View;
use Theme;
use Lang;
use Illuminate\Routing\Route;
use Input;
use Model;
use Auth;
use Request;
use Image;
use File;

class ImagesController extends \App\Http\Controllers\Admin\AdminController {

	public function index() {
		View::share('active','images');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.images'));
		View::share('items', Images::all()->take(10));
		View::share('items_total', images::all()->count());
		return Theme::view('admin.images.index');
	}

	public function ajax_table() {

		  $iTotalRecords = Images::all()->count();
		  $iDisplayLength = intval($_REQUEST['length']);
		  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		  $iDisplayStart = intval($_REQUEST['start']);
		  $sEcho = intval($_REQUEST['draw']);

		  $records = array();
		  $records["data"] = array();

		  $end = $iDisplayStart + $iDisplayLength;
		  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

		  $order = intval($_REQUEST['order'][0]['column']);
		  switch ($order) {
			  case '0':
				  $order = 'id';
				  break;
			  case '1':
				  $order = 'id';
				  break;
			  case '2':
				  $order = 'created_at';
				  break;
			  case '3':
				  $order = 'title';
				  break;
			  case '4':
				  $order = 'type';
				  break;
			  case '5':
				  $order = 'user_id';
				  break;
		  }
		  $direction = $_REQUEST['order'][0]['dir'];

		  $items = images::take($iDisplayLength)->skip($iDisplayStart)->orderBy($order, $direction)->get();
		  foreach($items as $item) {
		    $id = $item->id;
		    $records["data"][] = array(
		      '<input type="checkbox" name="id[]" value="'.$id.'">',
		      $id,
		      $item->created_at->toDateTimeString(),
		      '<img src="/uploads/images/c3_'.$item->url.'" alt="'.$item->title.'"> ' .$item->title,
		      strtoupper($item->type),
		      $item->user->name,
		      '<a href="/admin/images/'.$item->id.'" class="btn blue btn-xs default"><i class="fa fa-pencil"></i> '.Lang::get('admin.edit').'</a>',
		   );
		  }

		  $records["draw"] = $sEcho;
		  $records["recordsTotal"] = $iTotalRecords;
		  $records["recordsFiltered"] = $iTotalRecords;
		  echo json_encode($records);

	}

	public function create(Route $route) {
		View::share('active','images');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.image'));
		return Theme::view('admin.images.create');
	}

	public function store(imagesRequest $request) {

		$title = Input::get('title');
		$file = Input::file('file');

		$filename = rand(1000,9999).time().substr($file->getClientOriginalName(), -4);

		// Manual crop & save
		$destinationPath = 'precrop/';
		Input::file('file')->move($destinationPath, $filename);

		$img = Image::make($destinationPath.$filename);
		$img->save($destinationPath.$filename);

		if(Input::get('watermark') == 1) {
			Image::make($destinationPath.$filename)->resize(1280, null, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			})
			->insert('themes/'.Theme::getActive().'/assets/logo.gif', 'bottom-left', 20, 20)
			->save($destinationPath.'1_'.$filename, 90);
		} else {
			Image::make($destinationPath.$filename)->resize(1280, null, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			})->save($destinationPath.'1_'.$filename, 90);
		};

		Image::make($destinationPath.$filename)->resize(1024, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'2_'.$filename, 90);

		Image::make($destinationPath.$filename)->resize(840, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'3_'.$filename, 90);

		Image::make($destinationPath.$filename)->resize(400, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'4_'.$filename, 90);

		Image::make($destinationPath.$filename)->resize(200, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'5_'.$filename, 90);

		if(Input::get('watermark') == 1) {
			$img = Image::make($destinationPath.$filename);
			$img->insert('themes/'.Theme::getActive().'/assets/logo.gif', 'bottom-left', 20, 20);
			$img->save($destinationPath.$filename);
		};

		View::share('resized', $filename);
		View::share('file_title', $title);
		View::share('active','images');
		Theme::setLayout('admin.app');
		View::share('title', Lang::get('admin.new').' '.Lang::get('admin.crop'));
		return Theme::view('admin.images.crop');
		// End manual crop & save

	}

	public function crop() {

		$x = intval(Input::get('x'));
		$y = intval(Input::get('y'));
		$w = intval(Input::get('w'));
		$h = intval(Input::get('h'));
		$destinationPath = 'uploads/images/';
		$url = Input::get('url');
		$title = Input::get('title');

		Image::make('precrop/3_'.$url)->crop($w, $h, $x, $y)->save($destinationPath.'c_'.$url);
		Image::make($destinationPath.'c_'.$url)->resize(265, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'c_'.$url, 95);
		Image::make($destinationPath.'c_'.$url)->resize(185, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'c2_'.$url, 99);
		Image::make($destinationPath.'c2_'.$url)->resize(85, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->save($destinationPath.'c3_'.$url, 99);

		Image::make('precrop/'.$url)->save($destinationPath.$url);
		File::delete('precrop/'.$url);
		Image::make('precrop/1_'.$url)->save($destinationPath.'1_'.$url);
		File::delete('precrop/1_'.$url);
		Image::make('precrop/2_'.$url)->save($destinationPath.'2_'.$url);
		File::delete('precrop/2_'.$url);
		Image::make('precrop/3_'.$url)->save($destinationPath.'3_'.$url);
		File::delete('precrop/3_'.$url);
		Image::make('precrop/4_'.$url)->save($destinationPath.'4_'.$url);
		File::delete('precrop/4_'.$url);
		Image::make('precrop/5_'.$url)->save($destinationPath.'5_'.$url);
		File::delete('precrop/5_'.$url);

		$media = new Images;
		$media->title = $title;
		$media->url = $url;
		$media->type = "img";
		$media->user_id = Auth::user()->id;
		$media->save();

	    return redirect('/admin/images')->with('message', Lang::get('admin.image').' '.Lang::get('admin.create_success'));

	}

	public function show($id) {

		View::share('active','images');
		Theme::setLayout('admin.app');
		$item = Images::find($id);
		View::share('item', $item);
		View::share('title', ''.Lang::get('admin.edit').': '.$item->title.'');
		return Theme::view('admin.images.show');
	}

	public function update($id, imagesRequest $request) {
	    $data = Input::all();
	    array_forget($data, '_token');
	    $data['user_id'] = Auth::user()->id;
	    $db = Images::find($id);
		$db->update($data);
	    return redirect('/admin/images')->with('message', Lang::get('admin.image').' '.Lang::get('admin.update_success'));
	}

	public function actions() {
		foreach(Request::input('id') as $id) {
				$db = images::find($id);
				$items = App\Items::where('image_id',$id)->get();
				$categories = App\Category::where('image_id',$id)->get();
			if (Request::input('customActionName') == "delete") {
	        	App\ItemMedia::where('media_id',$id)->delete();
	        	App\CategoriesMedia::where('media_id',$id)->delete();
				foreach($items as $item) {
					$item->image_id = null;
					$item->save();
				};
				foreach($categories as $category) {
					$category->image_id = null;
					$category->save();
				};
				unlink('uploads/images/'.$db->url.'');
				unlink('uploads/images/1_'.$db->url.'');
				unlink('uploads/images/2_'.$db->url.'');
				unlink('uploads/images/3_'.$db->url.'');
				unlink('uploads/images/4_'.$db->url.'');
				unlink('uploads/images/5_'.$db->url.'');
				unlink('uploads/images/c_'.$db->url.'');
				unlink('uploads/images/c2_'.$db->url.'');
				unlink('uploads/images/c3_'.$db->url.'');
				$db->delete();
			}
		}
	}

	public function images() {

		$query = Input::get('term');
		$search = Images::where('title', 'LIKE', "%$query%")->select(array('id','title as text','url'))->take(10)->get();
		return json_encode($search);

	}

}
