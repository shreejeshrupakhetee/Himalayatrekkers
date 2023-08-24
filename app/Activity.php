<?php

namespace App;

use TCG\Voyager\Traits\Resizable;
Use  \TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    use Translatable,Resizable;
    protected $table = 'activity';
    public function trips()
    {
        return $this->belongsToMany(Trip::class,'activity_trip_pivot','activity_id','trip_id')->where('publish',1);
        // return $this->belongsToMany(Trip::class,'activity_trip_pivot','activity_id','trip_id');
    }
}
