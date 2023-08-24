<?php
/**
 * Created by PhpStorm.
 * User: saroj
 * Date: 10/2/19
 * Time: 9:31 PM
 */

namespace App\Http\ViewComposers\Front;

use App\Http\Daos\TravelStyleDao;
use Illuminate\View\View;
use App\Http\Daos\DestinationDao;
use App\Http\Daos\ActivityDao;
use App\Http\Daos\RegionDao;
class TravelStyleViewComposer
{
    public function __construct(DestinationDao $destinationDao,ActivityDao $activityDao,RegionDao $regionDao,TravelStyleDao $travelStyleDao)
    {
        $this->destinationDao = $destinationDao;
        $this->activityDao = $activityDao;
        $this->regionDao = $regionDao;
        $this->travelStyleDao = $travelStyleDao;
    }

    public function compose(View $view)
    {
        $view->with('destinations',$this->destinationDao->getByOrder('order','ASC',true));
        $view->with('activities',$this->activityDao->getByOrder('order','ASC',true));
        $view->with('regions',$this->regionDao->getByOrder('order','ASC',true));
        $view->with('travelstyles',$this->travelStyleDao->getByOrder('order','ASC',true));
    }
}