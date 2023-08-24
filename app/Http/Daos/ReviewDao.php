<?php

namespace App\Http\Daos;

use App\Review;

class ReviewDao extends BaseDao
{
	public function __construct(Review $review)
	{
		$this->model = $review;
	}

    public function getFeaturedReview()
    {
        return $this->model->where(['publish'=>1,'featured'=>1])->limit(3)->orderBy('created_at','DESC')->get();
    }
    public function getPublishReview()
    {
        return $this->model->with(['tripId'])->where(['publish'=>1])->orderBy('created_at','DESC')->get();
    }

}
