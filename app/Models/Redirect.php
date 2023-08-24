<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Redirect extends Model
{
    //
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::saved(function () {
            Cache::forget('redirect_cache_routes');
        });
    }
}
