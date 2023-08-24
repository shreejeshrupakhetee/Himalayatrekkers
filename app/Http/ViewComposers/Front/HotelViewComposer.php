<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Http\Daos\HotelDao;

class HotelViewComposer
{
	public function __construct(HotelDao $hotelDao)
	{
		$this->hotelDao = $hotelDao;
	}

	public function compose(View $view)
	{
		$view->with('hotels',$this->hotelDao->getByOrder('order','ASC',true));
	}
}