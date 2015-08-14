<?php

namespace Illuminate3\Uploads\Subscriber;

use Illuminate\Events\Dispatcher as Events;
use Illuminate3\Form\FormBuilder;
use Illuminate3\Uploads\Form\FileElement;

/**
 * 
 * If there are any validation errors in a previous
 * form post, then set the errors in the current form.
 * This will show a help text with each element that
 * contains errors.
 */
class EnableFormFileUploads
{
    /**
	 * Register the listeners for the subscriber.
	 *
	 * @param Events $events
	 */
	public function subscribe(Events $events)
	{
		$events->listen('form.formBuilder.build.before', array($this, 'onBuildForm'));
	}

	/**
	 * Seed the form with defaults that are stored in the session
	 *
	 * @param FormBuilder $fb
	 */
	public function onBuildForm(FormBuilder $fb)
	{
		foreach($fb->getElements() as $element) {

			if(!$element instanceof FileElement) {
				continue;
			}

			if(!$fb->getAttribute('enctype') == 'multipart/form-data') {
				$fb->attr('enctype', 'multipart/form-data');
			}
		}
	}

}