<?php

namespace Illuminate3\Uploads\Model;

class File extends \Eloquent
{
    protected $table = 'files';

    public $rules = array();

    protected $guarded = array('id');

    protected $fillable = array(
        'name',
        'path',
        'extension',
        'size',
    );

}

