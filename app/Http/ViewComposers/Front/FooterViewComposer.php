<?php

namespace App\Http\ViewComposers\Front;
use Illuminate\View\View;

use App\Http\Daos\AffiliationDao;
use App\Http\Daos\PagesDao;

class FooterViewComposer
{
	public function __construct(AffiliationDao $affiliationDao,PagesDao $pagesDao)
	{
		$this->affiliationDao = $affiliationDao;
        $this->pagesDao = $pagesDao;
	}

	public function compose(View $view)
	{
		$view->with('affiliations',$this->affiliationDao->getAll());
        $view->with('pages',$this->pagesDao->getActivePages());

	}

}
