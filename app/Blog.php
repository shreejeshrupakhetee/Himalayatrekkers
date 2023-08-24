<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blogs';

    public function parsedDate()
    {
        if(!empty($this->created_at))
        return Carbon::parse($this->created_at)->toFormattedDateString();
        else {
            return 'N/A';
        }
    }
}
