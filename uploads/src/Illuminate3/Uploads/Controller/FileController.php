<?php

namespace Illuminate3\Uploads\Controller;

use Illuminate3\Crud\CrudController;
use Illuminate3\Form\FormBuilder;
use Illuminate3\Model\ModelBuilder;
use Illuminate3\Overview\OverviewBuilder;

class FileController extends CrudController
{
	/**
     * @param FormBuilder $fb
     */
    public function buildForm(FormBuilder $fb)
    {
        $fb->image('path')->label('File');
        $fb->hidden('name')->label('Name');
        $fb->hidden('extension')->label('Extension');
        $fb->hidden('size')->label('Size');
    }

    /**
     * @param ModelBuilder $mb
     */
    public function buildModel(ModelBuilder $mb)
    {
        $mb->name('Illuminate3\Uploads\Model\File')->table('files');
    }

    /**
     * @param OverviewBuilder $ob
     */
    public function buildOverview(OverviewBuilder $ob)
    {
    }

}

