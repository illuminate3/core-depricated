<?php namespace App\Http\Controllers\Admin\Images;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

	protected $fillable = array('title');

    protected $table = 'media';

    public function user()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Users\Users', 'id', 'user_id');
    }

}