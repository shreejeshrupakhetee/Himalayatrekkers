<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelStyle extends Model
{
    //
    protected $table = 'travel_style';

public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trips_travelstyle_pivot_table', 'trip_id', 'travel_style_id')
        ->where('publish',1);
    }

}
