<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripBooking extends Model
{
     protected $fillable = ['name','email','subject','address','persons','country','phone','departure_date','trip_name','message','ipaddress','arrival_date','cost','user_title'];
}
