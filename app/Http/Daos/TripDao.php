<?php

namespace App\Http\Daos;

use App\Trip;

class TripDao extends BaseDao
{
	public function __construct(Trip $trip)
	{
		$this->model = $trip;
	}

	// public function getTripsWithoutRegion($desId,$actId)
	// {
	// 	return  $this->model->where(['destination_id'=>$desId,'activity_id'=>$actId,'publish'=>1])->orderBy('order','ASC')->paginate(6);
	// }

	public function getTripDetail($slug)
	{
    	return $this->model->where(['slug'=>$slug,'publish'=>1])->with('itinerary')->with('album')->with('destinationId')->with('activity')->with('regionId')->first();
	}
        public function getTravelStyleDetail($slug)
    {

        return $this->model->where(['publish'=>1])->whereNotNull('id')->whereHas('travelStyles', function($query) use($slug){
        $query->where(['travel_style_id'=>$slug]);
    })->get();
    }

	// public function getTrekkingPackages($slug)
	// {
	// 	return $this->model->where('publish',1)->whereHas('destinationId',function($query) use($slug){
	// 		$query->where('slug',$slug);
	// 	})->whereHas('activityId', function($query){
	// 		$query->where('slug','LIKE','%trek%');
	// 	})->whereHas('regionId', function($query){
    //         $query->where('slug','LIKE','%region%');
    //     })->orderBy('order','ASC')->get();
	// }

    // public function getAdventurePackages($slug)
    // {
    //     return $this->model->where('publish',1)->whereHas('destinationId',function($query) use($slug){
    //         $query->where('slug',$slug);
    //     })->whereHas('activityId', function($query){
    //         $query->where('slug','LIKE','%adventure%');
    //     })->orderBy('order','ASC')->get();
    // }

	// public function getToursPackages($slug)
	// {
	// 	return $this->model->where('publish',1)->whereHas('destinationId',function($query) use($slug){
	// 		$query->where('slug',$slug);
	// 	})->whereHas('activityId', function($query){
	// 		$query->where('slug','LIKE','%tour%');
	// 	})->orderBy('order','ASC')->limit(12)->get();
	// }
	// public function getTrekPackages($slug)
    // {
    //     return $this->model->where('publish',1)->whereHas('destinationId',function($query) use($slug){
    //         $query->where('slug',$slug);
    //     })->whereHas('activityId', function($query){
    //         $query->where('slug','LIKE','%trek%');
    //     })->orderBy('order','ASC')->limit(12)->get();
    // }

	public function getRelatedByRegion($regId,$tripId)
	{
		return $this->model->where(['region_id'=>$regId,'publish'=>1])->where('id','!=',$tripId)->limit(5)->get();
	}

	public function getRelatedByActivity($actId,$tripId)
	{
		return $this->model->where(['activity_id'=>$actId,'publish'=>1])->where('id','!=',$tripId)->limit(5)->get();
	}

	public function getRelatedByDestination($desId,$tripId)
	{
		return $this->model->where(['country_id'=>$desId,'publish'=>1])->where('id','!=',$tripId)->limit(5)->get();
	}

	public function getTripWithKeywords($keywords)
	{
		return $this->model->where('meta_keywords','LIKE',"%$keywords%")->orWhere('title','LIKE',"%$keywords%")->where('publish',1)->get();
	}

// 	public function getTripWithoutDurationPrice($searchArray,$travalArray)
// 	{
//         $this->model->where('publish',1)->where($searchArray);
//         if(isset($travalArray['travel_style_id']))
//         {
//             $travalArray = $travalArray['travel_style_id'];
//             $this->model->whereHas('travelStyles', function ($query) use ($travalArray) {
//             $query->where('travel_style_id', 'like', "%$travalArray%");
//         });
//         }
//         return $this->model->get();
// //		 exit;
// 	}



    // public function getTrekkingPackagesInNepal()
    // {
    //     return $this->model->where('publish',1)->with('destinationId')->orderBy('order','ASC')->limit(12)->get();
    // }
    // public function getLatestPackage()
    // {
    //     return $this->model->where('publish',1)->orderBy('id','DESC')->limit(8)->get();
    // }
}
