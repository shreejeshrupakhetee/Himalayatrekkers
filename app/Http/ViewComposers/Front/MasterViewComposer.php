<?php

namespace App\Http\ViewComposers\Front;

use App\Http\Daos\ActivityDao;
use App\Http\Daos\DestinationDao;
use App\Http\Daos\RegionDao;
use Illuminate\View\View;
use App\Http\Daos\TripDao;
use App\Http\Daos\TravelStyleDao;

class MasterViewComposer
{
    public function __construct(TripDao $tripDao,DestinationDao $destinationDao,ActivityDao $activityDao,RegionDao $regionDao, TravelStyleDao $travelStyleDao)
    {
        $this->tripDao = $tripDao;
        $this->destinationDao = $destinationDao;
        $this->activityDao = $activityDao;
        $this->regionDao = $regionDao;
        $this->destinationDao = $destinationDao;
        $this->travelStyleDao = $travelStyleDao;

    }


    public function compose(View $view)
	{
		$view->with('footer_activities',$this->activityDao->getByCondWithLimit([],'order','ASC',8,true));
		$view->with('popular_trips',$this->tripDao->getByCondWithLimit(['popular'=>1],'order','ASC',7,true));
        $view->with('footer_trekkings',$this->tripDao->getTrekkingPackages('nepal'));
        $view->with('footer_tours',$this->tripDao->getToursPackages('nepal'));
        $view->with('destinations',$this->destinationDao->getAll());
        $view->with('featured_travelstyle',$this->travelStyleDao->getFeaturedTravelStyle());
	}
}