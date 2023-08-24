<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //
    public function tagId()
    {
        return $this->belongsTo('App\Tag','tag_id');
    }
    public function regionId()
    {
        return $this->belongsTo('App\Region','region_id');
    }
}
