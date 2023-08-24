<?php
//for frontend
namespace App\Http\Services;

use App\Http\Daos\PagesDao;
use App\Http\Daos\DestinationDao;
use App\Http\Daos\ActivityDao;
use App\Http\Daos\RegionDao;
use App\Http\Daos\SubscribeDao;
use App\Http\Daos\TravelStyleDao;
use App\Http\Daos\TripDao;
use App\Http\Daos\ReviewDao;
use App\Http\Daos\PostsDao;
use App\Http\Daos\CategoryDao;
// use App\Http\Daos\TagDao;
use App\TravelStyle;

class HomeService
{
    public function __construct(PagesDao $pagesDao, SubscribeDao $subscribeDao, DestinationDao $destinationDao, ActivityDao $activityDao, RegionDao $regionDao, TripDao $tripDao, ReviewDao $reviewDao, PostsDao $postsDao, CategoryDao $categoryDao, TravelStyleDao $travelStyleDao)
    {
        $this->pagesDao = $pagesDao;
        $this->destinationDao = $destinationDao;
        $this->activityDao = $activityDao;
        $this->regionDao = $regionDao;
        $this->tripDao = $tripDao;
        $this->reviewDao = $reviewDao;
        $this->postDao = $postsDao;
        $this->categoryDao = $categoryDao;
        // $this->tagDao = $tagDao;
        $this->travelStyleDao = $travelStyleDao;
        $this->subscribeDao = $subscribeDao;
    }

    public function getPageDetail($slug)
    {
        return $this->pagesDao->findBySlug($slug);
    }

    public function getBlogDetail($slug)
    {
        return $this->postDao->getOneByCondition(['status' => 'PUBLISHED', 'slug' => $slug], false);
        // return $this->postDao->getBlogDetail($slug);
    }

    public function getBlogData()
    {
        $data = [];
        $data['posts'] = $this->postDao->getAllPosts();
        $data['categories'] = $this->categoryDao->getCategoryOrder();
        //  $data['trips'] = $this->tripDao->getTrekkingPackagesInNepal();
        $data['archives'] = makeArchives($this->postDao->getArchives());

        return $data;
    }
    public function getAllActivities()
    {

        return $this->activityDao->getActivitiesWithTripCount();
    }



    public function getCatDetail($slug)
    {
        return $this->categoryDao->getBySlug($slug);
    }

    public function getBlogArchives($slug)
    {
        return $this->postDao->getArchivePosts($slug);
    }

    public function getUncategorizedBlog()
    {
        return $this->postDao->getUncatBlogs();
    }

    public function getTagDetail($slug)
    {
        return $this->tagDao->getTagDetail($slug);
    }

    public function getAllTags()
    {
        return $this->tagDao->getAll();
    }




    public function getBlogTags($postId)
    {
        return $this->tagDao->getBlogTags($postId);
    }

    public function getDestinationDetail($slug)
    {
        return $this->destinationDao->getOneByCondition(['slug' => $slug], true);
    }
    public function getTravelstyleDetail($slug)
    {
        return $this->travelStyleDao->getOneByCondition(['slug' => $slug], true);
    }

    public function getOtherActivities($desId)
    {
        return $this->activityDao->getOtherActivities($desId);
    }

    // 	public function getDestinationData($desId)
    // 	{
    // 	    $data = [];
    // 	    $data['activities'] = $this->activityDao->getActivitiesWithRegionCount($desId);
    // 	    $data['trips'] = $this->tripDao->getByCondWithOrder(['destination_id'=>$desId],'order','ASC');
    // //	    print_r($data['trips']); exit;
    // 	    return $data;
    // 	}

    public function getActivityDetail($actSlug)
    {
        return $this->activityDao->findBySlug(['slug' => $actSlug]);
    }


    // public function getActivityData($desId,$actId)
    // {
    // 	$data = [];
    // 	// $data['regions'] = $this->regionDao->getRegionsWithTripCount($desId,$actId);
    // 	// $data['trips'] = $this->tripDao->getTripsWithoutRegion($desId,$actId);
    // 	return $data;
    // }

    public function getActivity($id, $actSlug)
    {
        return $this->activityDao->getOneByCondition(['slug' => $actSlug, 'country_id' => $id], true);
    }

    public function getRegionDetail($slug)
    {
        return $this->regionDao->getOneByCondition(['status' => 1, 'slug' => $slug], false);
    }
    public function getRegionData()
    {
        $data = [];
        $data['regions'] = $this->regionDao->getAllRegions();
        return $data;
    }

    // public function getRegionData($desId,$actId,$regId)
    // {
    // 	$data = [];
    // 	$data['trips'] = $this->tripDao->getByCond(['destination_id'=>$desId,'activity_id'=>$actId,'region_id'=>$regId],true);
    // 	return $data;
    // }
    public function getTravelData($travelSlug)
    {
        $data = [];
        $data['trips'] = $this->tripDao->getTravelStyleDetail($travelSlug);
        return $data;
    }





    public function getTripDetail($slug)
    {
        return $this->tripDao->getTripDetail($slug);
    }

    public function getRelatedTrips($desId, $actId, $regId, $tripId)
    {
        if ($regId > 0) {
            return $this->tripDao->getRelatedByRegion($regId, $tripId);
        } else {
            if ($actId > 0) {
                return $this->tripDao->getRelatedByActivity($actId, $tripId);
            } else {
                return $this->tripDao->getRelatedByDestination($desId, $tripId);
            }
        }

    }

    public function getSearchTrips($data)
    {
        $searchArray = [];
        $travalArray = [];
        //		if(isset($data['destination'])){
        //            $dest = $this->destinationDao->findBySlug($data['destination']);
        //            if($dest){
        //            	$searchArray['destination_id'] = $dest->id;
        //            }
        //		}
        //		if(isset($data['activity'])){
        //			$act = $this->activityDao->findBySlug($data['activity']);
        //			if($act){
        //				$searchArray['activity_id'] = $act->id;
        //			}
        //		}
        //		if(isset($data['region'])){
        //			$reg = $this->regionDao->findBySlug($data['region']);
        //			if($reg){
        //				$searchArray['region_id'] = $reg->id;
        //			}
        //		}
        //        if(isset($data['travelstyle'])){
        //            $ts = $this->travelStyleDao->findBySlug($data['travelstyle']);
        //
        //            if($ts){
        //                $travalArray['travel_style_id'] = $ts->id;
        ////                return $this->travelStyleDao->getTripWithoutDurationPrice($searchArray,$travalArray);
        //            }
        //        }
        if (isset($data['keywords'])) {
            return $this->tripDao->getTripWithKeywords($data['keywords']);
        } else {
            if (isset($data['duration']) || isset($data['price'])) {
                // if(isset($data['duration'])){
                // 	$dArray = explode('-',$data['duration']);
                // }
                // if(isset($data['price'])){
                //                 $pArray = explode('-',$data['price']);
                // }
                return $this->tripDao->getTripWithDurationPrice($searchArray, $data);
            } else {
                //			    print_r($data);exit;
                //			    print_r($this->tripDao->getAjaxTrips($data));exit;
                return $this->tripDao->getAjaxTrips($data);
            }
        }
    }

    public function getActivityByDestination($destSlug)
    {
        $destination = $this->destinationDao->findBySlug($destSlug);
        return $this->activityDao->getByCond(['destination_id' => $destination['id']], true);
    }

    public function getRegionByActivity($actSlug)
    {
        $activity = $this->activityDao->findBySlug($actSlug);
        return $this->regionDao->getByCond(['activity_id' => $activity['id']], true);
    }

    // public function getRegionTrips($d,$a,$r)
    // {
    // 	return $this->tripDao->getRegionTrips($d,$a,$r);
    // }
    public function getAjaxTrips($data)
    {
        return $this->tripDao->getAjaxTrips($data);
    }

    public function getSubscribeEmail($email)
    {
        return $this->subscribeDao->getEmail($email);
    }
    public function getRelatedBlog($id, $categoryId)

    {
        return $this->postDao->getRelatedBlog($id, $categoryId);
    }
}
