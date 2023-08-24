<?php

namespace App;

use TCG\Voyager\Traits\Resizable;
Use  \TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    use Translatable,Resizable;
    public function trips()
    {
    	return $this->hasMany('App\Trip','country_id');
    }
}
