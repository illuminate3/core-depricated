<?php

namespace Illuminate3\Uploads\Form;

class ImageElement extends FileElement
{
	protected $view = 'uploads::image-element';

	protected $rules = 'image';

}