<?php

namespace App\Http\Daos;

use App\Activity;

class ActivityDao extends BaseDao
{
	public function __construct(Activity $activity)
	{
		$this->model = $activity;
	}


	public function getActivitiesWithTripCount()
	{
		return $this->model->where('publish',1)->withCount('trips')->get();
	}

    public function getFeaturedActivity()
	{
			return $this->model->where(['publish'=>1,'featured'=>1])->get();
	}

}
