<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
    protected $table = 'gallery';

    public static function boot()
    {
    	static::saving(function($model){
    		if(request()->get('video')){
    		   $model->video = json_encode(array_filter(request()->get('video')));
    		}
    	});
    	parent::boot();
    }
}
