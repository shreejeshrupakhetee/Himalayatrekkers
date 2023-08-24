<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function faq()
    {
        return $this->hasMany('App\Faq','tag_id')->where('publish',1);
    }

}
