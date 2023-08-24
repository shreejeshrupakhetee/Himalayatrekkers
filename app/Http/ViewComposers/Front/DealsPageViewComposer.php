<?php

namespace App\Http\ViewComposers\Front;

use App\Http\Daos\DestinationDao;
use Illuminate\View\View;

use App\Http\Daos\TripDao;


class DealsPageViewComposer
{
	public function __construct(TripDao $tripDao,DestinationDao $destinationDao)
	{

		$this->tripDao = $tripDao;
		$this->destinationDao = $destinationDao;

	}

	public function compose(View $view)
	{



		$view->with('deals',$this->tripDao->getByCondWithLimit(['activity'],['ondeal'=>1],'order','ASC',8,true));


	}

}
