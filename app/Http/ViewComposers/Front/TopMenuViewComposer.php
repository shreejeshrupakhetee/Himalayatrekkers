<?php
/**
 * Created by PhpStorm.
 * User: saroj
 * Date: 10/3/19
 * Time: 11:17 AM
 */

namespace App\Http\ViewComposers\Front;


use App\Http\Daos\TravelStyleDao;
use Illuminate\View\View;

class TopMenuViewComposer
{
    public function __construct(TravelStyleDao $travelStyleDao)
    {
        $this->travelStyleDao=$travelStyleDao;
    }

    public function compose(View $view)
    {
        $view->with('travelstyles',$this->travelStyleDao->getAll());
    }
}