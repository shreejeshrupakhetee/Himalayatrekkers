<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Region;
use App\Trip;

class GalleryViewComposer
{
	public function __construct(Region $region,Trip $trip)
	{
		$this->region = $region;
		$this->trip = $trip;
	}

	public function compose(View $view)
	{
		// $view->with('regions',$this->region->where(['publish'=>1])->doesntHave('album')->get());
		// $view->with('trips',$this->trip->where(['publish'=>1])->doesntHave('album')->get());
		$view->with('regions',$this->region->where(['status'=>1])->with('album')->get());
		$view->with('trips',$this->trip->where(['publish'=>1])->with('album')->get());

	}
}
