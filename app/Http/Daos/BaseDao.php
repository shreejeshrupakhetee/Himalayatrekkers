<?php

namespace App\Http\Daos;

use Illuminate\Database\Eloquent\Model;

class BaseDao
{
	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
    }
    public function getAlls()
	{
		return $this->model->where('status',1)->get();
	}

	public function getAll()
	{
		return $this->model->where('publish',1)->get();
	}

	public function find($id)
	{
		return $this->model->where('publish',1)->find($id);
	}

	public function findBySlug($slug)
	{
	    $cond = ['publish'=>1];
	    return $this->model->where($cond)->where('slug',$slug)->first();
	}

	public function getByCond($whereArray, $onlyPublish = true)
	{
	    $res = $this->model;
	    if($onlyPublish)
	    {
	        $res = $res->where('publish',1);
	    }
	    return $res ->where($whereArray)->get();
	}

	// public function getByConditionWith($whereArray, $with, $onlyPublish = true)
	// {
	//     $withString = implode(',',$with);
	//     return $this->model->where($whereArray)->with($withString)->where('publish',1)->get();
	// }

	public function getOneByCondition($whereArray,$onlyPublish = true)
	{
	    $res = $this->model;
	    if($onlyPublish)
	    {
	        $res = $res->where('publish',1);
	    }
	    return $res->where($whereArray)->first();
	}

	public function getOneByConditionWith($whereArray, $with)
	{
	    $withString = implode(',',$with);
	    return $this->model->where('publish',1)->where($whereArray)->with($withString)->first();
	}

	public function getByOrder($orderBy='id', $orderType='DESC', $onlyPublish = true)
	{
	    $res = $this->model;
	    if($onlyPublish){
	        $res = $res->where('publish',1);
	    }
	    return $res->orderBy($orderBy,$orderType)->get();
	}

	public function getByCondWithOrder($whereArray,$orderBy='id', $orderType='DESC', $onlyPublish = true)
	{
	    $res = $this->model;
	    if($onlyPublish)
	    {
	        $res = $res->where('publish',1);
	    }
	    return $res ->where($whereArray)->orderBy($orderBy,$orderType)->get();
	}
	public function getByCondWithLimit($with, $whereArray, $limit, $orderBy = 'id', $orderType = 'DESC', $onlyPublish = true)
	{
		$withString = implode(',', $with);
		$res = $this->model;
		if ($onlyPublish) {
			$res = $res->where('publish',1);
		}
		return $res->with($withString)->where($whereArray)->orderBy($orderBy,$orderType)->limit($limit)->get();
	}

    public function getByConditionWith($whereArray, $with, $onlyPublish = true)
	{
	    $withString = implode(',',$with);
	    return $this->model->where($whereArray)->with($withString)->where('publish',1)->get();
    }



}
