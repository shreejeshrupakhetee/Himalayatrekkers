<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Region;



class TripViewComposer
{
	public function __construct(Region $region)
	{
		$this->region = $region;

		// $this->activity = $activity;
	}

	public function compose(View $view)
	{
		// $view->with('regions',$this->region->where(['trip'=>1,'publish'=>1])->get());


		$view->with('regions',$this->region->where(['publish'=>1])->get());

		// $view->with('activities',$this->activity->where(['trip'=>1,'publish'=>1])->get());
	}
}
