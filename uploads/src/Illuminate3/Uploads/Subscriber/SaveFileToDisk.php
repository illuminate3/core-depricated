<?php

namespace Illuminate3\Uploads\Subscriber;

use Illuminate\Events\Dispatcher as Events;
use Illuminate\Database\Eloquent\Model;
use Illuminate3\Crud\CrudController;
use Illuminate3\Uploads\Model\File;
use Illuminate3\Uploads\Form\FileElement;
use Input;

/**
 * 
 * If there are any validation errors in a previous
 * form post, then set the errors in the current form.
 * This will show a help text with each element that
 * contains errors.
 */
class SaveFileToDisk
{
    /**
	 * Register the listeners for the subscriber.
	 *
	 * @param Events $events
	 */
	public function subscribe(Events $events)
	{
		$events->listen('crud::saved', array($this, 'onCrudSaved'));
	}

	/**
	 * Seed the form with defaults that are stored in the session
	 *
	 * @param Model $model
	 * @param CrudController $crudController
	 */
	public function onCrudSaved(Model $model, CrudController $crudController)
	{
		$fb = $crudController->getFormBuilder();

		foreach($fb->getElements() as $name => $element) {

			if(!$element instanceof FileElement) {
				continue;
			}

			if($model instanceof File) {
				$file = $model;
			}
			else {
				$file = new File;
			}

			if($uploaded = Input::file($name)) {

				// Save the file to the disk
				$uploaded->move(storage_path($element->getPath()), $uploaded->getClientOriginalName());

				// Update the file model with metadata
				$file->name 		= $uploaded->getClientOriginalName();
				$file->extension 	= $uploaded->getClientOriginalExtension();
				$file->size 		= $uploaded->getClientSize();
				$file->path 		= $element->getPath() . '/' . $uploaded->getClientOriginalName();
				$file->save();


				if(!$model instanceof File) {
					$model->$name = $element->getPath() . '/' . $uploaded->getClientOriginalName();
					$model->save();
				}

			}


		}

	}

}