<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Http\Daos\VehicleDao;

class VehicleViewComposer
{
	public function __construct(VehicleDao $vehicleDao)
	{
		$this->vehicleDao = $vehicleDao;
	}

	public function compose(View $view)
	{
		$view->with('vehicles',$this->vehicleDao->getAll());
	}

}