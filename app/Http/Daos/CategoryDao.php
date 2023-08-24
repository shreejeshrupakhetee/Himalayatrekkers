<?php

namespace App\Http\Daos;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category;

class CategoryDao extends BaseDao
{
	public function __construct(Category $model)
	{
		$this->model = $model;
	}

	public function getCategoryOrder()
	{
	    return $this->model->orderBy('order','ASC')->get();
	}

	public function getBySlug($slug)
	{
	    return $this->model->where('slug',$slug)->first();
	}

}