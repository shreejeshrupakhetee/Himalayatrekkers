<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Review extends Model
{
    protected $appends = ['date'];
	public function tripId()
	{
		return $this->belongsTo('App\Trip','trip_id');
	}

	public function regionId()
	{
		return $this->belongsTo('App\Region','region_id');
    }
    public function parsedDate()
    {
        return Carbon::parse($this->created_at)->toFormattedDateString();
    }
    public function getDateAttribute()
    {
        return $this->parsedDate();
    }
    public function getImageAttribute($file, $default = '')
    {
        
        if (!empty($file)) {
            return Storage::disk(config('voyager.storage.disk'))->url($file);
        }
        return $default;
    }



}
