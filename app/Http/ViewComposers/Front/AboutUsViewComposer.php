<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Http\Daos\TeamDao;


class AboutUsViewComposer
{
	public function __construct(TeamDao $teamDao)
	{
		$this->teamDao = $teamDao;
		// $this->guideDao = $guideDao;
	}

	public function compose(View $view)
	{
		$view->with('teams',$this->teamDao->getByOrder('order','ASC',true));
		// $view->with('guides',$this->guideDao->getByOrder('order','ASC',true));
	}
}
