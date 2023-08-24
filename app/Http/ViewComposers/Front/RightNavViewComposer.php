<?php
/**
 * Created by PhpStorm.
 * User: saroj
 * Date: 10/2/19
 * Time: 3:07 PM
 */

namespace App\Http\ViewComposers\Front;


use App\Http\Daos\TripDao;
use Illuminate\View\View;

class RightNavViewComposer
{
    public function __construct(TripDao $tripDao)
    {
        $this->tripDao = $tripDao;
    }
    public function compose(View $view)
    {
        $view->with('adventure',$this->tripDao->getAdventurePackages('nepal'));
    }
}