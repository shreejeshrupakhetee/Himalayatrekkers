<?php
/**
 * Created by PhpStorm.
 * User: saroj
 * Date: 10/1/19
 * Time: 12:59 PM
 */

namespace App\Http\ViewComposers\Front;


use App\Http\Daos\FaqDao;
use Illuminate\View\View;

class FaqViewComposer
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