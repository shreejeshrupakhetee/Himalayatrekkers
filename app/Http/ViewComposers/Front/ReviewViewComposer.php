<?php
/**
 * Created by PhpStorm.
 * User: saroj
 * Date: 8/27/20
 * Time: 4:43 PM
 */

namespace App\Http\ViewComposers\Front;


use App\Http\Daos\ReviewDao;
use Illuminate\View\View;

class ReviewViewComposer
{
    public function __construct(ReviewDao $reviewDao)
    {
        $this->reviewDao = $reviewDao;
    }

    public function compose(View $view)
    {
        $view->with('allreviews',$this->reviewDao->getPublishReview());
    }
}
