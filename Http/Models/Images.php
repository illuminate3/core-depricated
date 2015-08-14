<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 14-12-20
 * Time: 下午11:18
 */

class Images extends \BaseModel
{
    protected $table = 'images';

    protected $enableOnSearch = [];

    public static function store($userId, $savePath, $name, $origName, $verb, $mime)
    {
        $model = new Images();
        $model->user_id = $userId;
        $model->name = $name;
        $model->orig_name = $origName;
        $model->verb = $verb;
        $model->mime = $mime;
        $model->path = $savePath;
        $model->loc_id = 0;
        if($model->save()) {
            return $model;
        }
        return null;
    }

} 