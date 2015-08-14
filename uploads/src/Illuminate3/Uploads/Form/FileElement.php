<?php

namespace Illuminate3\Uploads\Form;

use Illuminate3\Form\Element\AbstractElement as Element;
use Illuminate3\Form\Element\Type;

class FileElement extends Element implements Type\Input
{
	protected $view = 'uploads::file-element';

	protected $path = 'uploads';

	protected $attributes = array();

	/**
	 * @param string $path
	 * @return $this
	 */
	public function path($path)
	{
		$this->path = $path;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPath()
	{
		return $this->path;
	}
}