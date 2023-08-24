<?php
/**
 * Created by PhpStorm.
 * User: saroj
 * Date: 8/25/20
 * Time: 6:48 PM
 */

namespace App\Http\ViewComposers\Front;


use App\Http\Daos\FaqDao;
use Illuminate\View\View;

class FaqViewComposerFront
{
    public function __construct(FaqDao $faqDao)
    {
        $this->faqDao = $faqDao;
    }
    public function compose(View $view)
    {
        $view->with('faqs',$this->faqDao->getPublishfaq());
    }
}