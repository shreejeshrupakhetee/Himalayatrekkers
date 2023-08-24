<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Region;
use App\Tag;

class FaqViewComposer
{
	public function __construct(Region $region,Tag $tag)
	{
		$this->region = $region;
		$this->tag = $tag;
	}

	public function compose(View $view)
	{
		$view->with('regions',$this->region->where(['status'=>1])->with('faq')->get());
		// $view->with('trips',$this->trip->where(['publish'=>1])->with('faq')->get());
		$view->with('tags',$this->tag->where(['publish'=>1])->with('faq')->get());
	}
}
