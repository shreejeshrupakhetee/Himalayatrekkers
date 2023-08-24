<?php

namespace App\Http\Daos;

use App\Slider;

class SliderDao extends BaseDao
{
	public function __construct(Slider $slider)
	{
		$this->model = $slider;
	}
	
}