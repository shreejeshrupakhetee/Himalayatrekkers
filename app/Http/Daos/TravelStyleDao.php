<?php

namespace App\Http\Daos;


use App\TravelStyle;
use Illuminate\Database\Eloquent\Model;

class TravelStyleDao extends BaseDao
{
    public function __construct(TravelStyle $model)
    {
        $this->model= $model;
    }

    public function getFeaturedTravelStyle()
    {
        // return $this->model->where(['publish'=>1,'featured'=>1])->orderBy('created_at','DESC')->get();
        return $this->model->where('publish',1)->orderBy('id','DESC')->get();
    }

    public function getTripWithoutDurationPrice($searchArray,$travalArray)
    {

        return $this->model->where('publish',1)->with(['trips' => function($query) use ($travalArray){
            $query->where('travel_style_id', 'like', '%'.$travalArray['travel_style_id'].'%');
        }])->get();

    }
}
