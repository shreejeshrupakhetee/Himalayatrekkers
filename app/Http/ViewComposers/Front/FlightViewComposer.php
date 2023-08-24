<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Http\Daos\FlightDao;

class FlightViewComposer
{
	public function __construct(FlightDao $flightDao)
	{
		$this->flightDao = $flightDao;
	}

	public function compose(View $view)
	{
		$view->with('flights',$this->flightDao->getByOrder('order','ASC',true));
	}
}