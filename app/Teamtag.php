<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Teamtag extends Model
{
    public function teams()
    {
        return $this->hasMany(Team::class,'teamtags_id');
    }
}
