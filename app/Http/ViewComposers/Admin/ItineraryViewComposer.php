<?php

namespace App\Http\ViewComposers\Admin;

use App\Trip;
use App\Region;
use Illuminate\View\View;

class ItineraryViewComposer
{
	public function __construct(Trip $trip, Region $region)
	{
		$this->trip = $trip;
		$this->region = $region;
	}

	public function compose(View $view)
	{

		$view->with('trips',$this->trip->where('publish',1)->with('itinerary')->get());
		// $view->with('regions',$this->region->where('status',1)->with('itinerary')->get());
	}
}
