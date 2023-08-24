<?php

namespace App\Http\Daos;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Page;

class PagesDao extends BaseDao
{
	public function __construct(Page $page)
	{
		$this->model = $page;
	}

	public static function getActivePages()
	{
		return Page::where('status','PUBLISHED')->get();
	}

	public function findBySlug($slug)
	{
	    return $this->model->where('status','PUBLISHED')->where('slug',$slug)->first();
	}

}
