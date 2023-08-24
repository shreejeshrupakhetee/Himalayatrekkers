<?php

namespace App\Http\Daos;

use App\Country;

class DestinationDao extends BaseDao
{
	public function __construct(Country $destination)
	{
		$this->model = $destination;
	}
	public function getNavListDestination()
    {
    return $this->model->where(['publish'=>1,'show_navbar'=>1])->orderBy('order','ASC')->get();
    }

}
