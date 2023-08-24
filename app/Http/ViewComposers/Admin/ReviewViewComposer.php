<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
// use App\Region;
use App\Trip;

class ReviewViewComposer
{
	public function __construct(Trip $trip)
	{

		$this->trip = $trip;
	}

	public function compose(View $view)
	{
		// $view->with('regions',$this->region->where(['publish'=>1])->with('reviews')->get());
		$view->with('trips',$this->trip->where(['publish'=>1])->with('reviews')->get());
	}
}
