<?php

namespace App\Http\ViewComposers\Front;

use App\Http\Daos\ActivityDao;
use App\Http\Daos\DestinationDao;
use App\Http\Daos\RegionDao;
use App\Http\Daos\TravelStyleDao;
use Illuminate\View\View;
use App\Http\Daos\TripDao;
use App\Http\Daos\PagesDao;

class NavViewComposer
{
	public function __construct(TripDao $tripDao,DestinationDao $destinationDao,ActivityDao $activityDao,RegionDao $regionDao,TravelStyleDao $travelStyleDao,PagesDao $pagesDao)
	{
		$this->tripDao = $tripDao;
		$this->destinationDao = $destinationDao;
		$this->activityDao = $activityDao;
		$this->regionDao = $regionDao;
        $this->travelStyleDao = $travelStyleDao;
        $this->pagesDao = $pagesDao;
	}

	public function compose(View $view)
	{
		// $view->with('trekkings',$this->tripDao->getTrekkingPackages('nepal'));
		// $view->with('tours',$this->tripDao->getToursPackages('nepal'));
		// $view->with('treks',$this->tripDao->getTrekPackages('nepal'));
        // $view->with('activities',$this->tripDao->getToursPackages('nepal'));
        $view->with('activities',$this->activityDao->getAll());

		// $view->with('destinations',$this->destinationDao->getNavListDestination());
		$view->with('regions',$this->regionDao->getAlls());
        $view->with('travelstyles',$this->travelStyleDao->getAll());
        $view->with('pages',$this->pagesDao->getActivePages());
	}
}
