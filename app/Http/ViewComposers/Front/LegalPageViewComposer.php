<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 8/9/18
 * Time: 11:53 AM
 */

namespace App\Http\ViewComposers\Front;


use App\Http\Daos\LegalDocumentDao;
use Illuminate\View\View;

class LegalPageViewComposer
{
    public function __construct(LegalDocumentDao $legalDocumentDao)
    {
        $this->legalDocumentDao = $legalDocumentDao;
    }

    public function compose(View $view)
    {
        $view->with('legal_docs',$this->legalDocumentDao->getByOrder('order','ASC',true));
    }
}