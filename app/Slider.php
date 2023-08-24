<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
Use  \TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;
class Slider extends Model
{
    //
    public static function boot()
    {
        parent::boot();


        static::updating(function(){
            Cache::flush();
        });

        static::deleting(function(){
            Cache::flush();
        });


    }
    use Translatable, Resizable;
}
