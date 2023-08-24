<?php

namespace App\Http\Daos;

use App\Region;

class RegionDao extends BaseDao
{
	public function __construct(Region $region)
	{
		$this->model = $region;
    }
    public function getAllRegions()
    {
    	return $this->model->where('status',1)->orderBy('id','DESC')->get();
    }

	// public function getRegionsWithTripCount($desId,$actId)
	// {
	// 	return $this->model->where(['country_id'=>$desId,'activity_id'=>$actId,''=>1])->orderBy('order','ASC')->withCount('trips')->get();
	// }

}
