<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'enquiry';
    protected $fillable = ['name','email','message','phone','country'];
}
