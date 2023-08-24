<?php

namespace App;
Use  \TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Region extends Model
{
    //
    public static function boot()
    {
        parent::boot();


        static::updating(function($instance){
            Cache::put('region.'.$instance->slug,$instance);
        });

        static::deleting(function($instance){
            Cache::forget('region.'.$instance->slug);
        });


    }
    use Translatable, Resizable;

    public function album()
    {
        return $this->hasOne('App\Gallery','region_id')->where('publish',1);
    }
    public function trips()
    {
        return $this->hasMany('App\Trip','region_id');
    }
    public function faq()
    {
        return $this->hasMany('App\Faq','region_id')->where('publish',1);
    }

}
