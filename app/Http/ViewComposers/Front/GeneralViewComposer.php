<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Http\Daos\TripDao;
use App\Http\Daos\ActivityDao;
// use App\Http\Daos\TestimonialDao;

class GeneralViewComposer
{
	public function __construct(TripDao $tripDao,ActivityDao $activityDao)
	{
		$this->tripDao = $tripDao;
		$this->activityDao = $activityDao;
		// $this->testimonialDao = $testimonialDao;
	}

	public function compose(View $view)
	{
		// $view->with('popular_trips',$this->tripDao->getByCond(['popular'=>1],true));
		// $view->with('popular_activities',$this->activityDao->getByConditionWith(['popular'=>1],['destinationId']));
		// $view->with('sidebar_testimonial',$this->testimonialDao->getOneByCondition(['featured'=>1],true));
	}
}