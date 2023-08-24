<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

use App\Http\Resources\ProductResource;
use App\Http\Resources\SearchResource;
use App\Http\Resources\ReviewResource;
use App\Activity;
use App\Http\Resources\BlogResource;
use App\Review;
use App\Trip;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Models\Post;

class ProductController extends Controller
{
    public function mc()
    {
        $sort_feild = request('sort_feild','id');
        if(!in_array($sort_feild,['id','title','price'])){
           $sort_feild = 'id';
        }
        $sort_direction = request('sort_direction','desc');
        if(!in_array($sort_direction,['asc','desc'])){
           $sort_direction = 'asc';
        }

        $filled = array_filter(request()->only([
           'id',
           'title',
           'price'
        ]));

         $products = Trip::when(count($filled) > 0, function ($query) use ($filled){
             foreach ($filled as $column => $value){
                 $query->where($column,'LIKE','%' . $value . '%');

         }
       })->when(request('search') != '', function ($query){
           $query->where(function ($q){
               $q->where('title','LIKE', '%'. request('search') . '%');
           });
       })->where('publish', '=', 1)
           ->where(function ($query)  {
               $query->where('country_id', '>=', 5);

           })->withFilters()
           ->with([

               'regionId' => function ($q) {
                   $q->select('id','title');
               },
               'activity' => function ($q) {
                   $q->select('activity_trip_pivot.id','title');
               },
           ])->orderBy($sort_feild,$sort_direction)->paginate(15);
        return ProductResource::collection($products);
    }


    public function index($id)
    {

     $sort_feild = request('sort_feild','id');
     if(!in_array($sort_feild,['id','title','price'])){
        $sort_feild = 'id';
     }
     $sort_direction = request('sort_direction','desc');
     if(!in_array($sort_direction,['asc','desc'])){
        $sort_direction = 'asc';
     }

     $filled = array_filter(request()->only([
        'id',
        'title',
        'price'
     ]));

      $products = Trip::when(count($filled) > 0, function ($query) use ($filled){
          foreach ($filled as $column => $value){
              $query->where($column,'LIKE','%' . $value . '%');

      }
    })->when(request('search') != '', function ($query){
        $query->where(function ($q){
            $q->where('title','LIKE', '%'. request('search') . '%');
        });
    })->where('publish', '=', 1)
        ->where(function ($query) use ($id) {
            $query->where('country_id', $id);

        })->withFilters()
        ->with([

            'regionId' => function ($q) {
                $q->select('id','title');
            },
            'activity' => function ($q) {
                $q->select('activity_trip_pivot.id','title');
            },
        ])->orderBy($sort_feild,$sort_direction)->paginate(15);




        return ProductResource::collection($products);
    }







    public function activity($id)
    {


        $activity = Activity::where('id', $id)->first();


        $products = $activity->trips()->with([
            'activity' => function ($q) {
                $q->select('activity_trip_pivot.id','title');
            },
            'destinationId' => function ($q) {
                $q->select('id','title');
            },

        ])->withmFilters()->get();


        return ProductResource::collection($products);
    }
    public function search()
    {
        $products = Trip::where('publish', 1)
        ->get(['title','slug']);
        return SearchResource::collection($products);
    }
    public function blogsearch()
    {
        $products = Post::where('status','=','PUBLISHED')
        ->get(['title','slug']);
        return BlogResource::collection($products);
    }


        public function reviews($id)
    {


        $post = Trip::where('id', $id)->first();
        if (!$post) {
            return  App::abort(404);
        }


        $post_id = $post->id;
        $result = Review::where('trip_id', $post_id)->paginate(5);
        // $result['items'] = $result['data'];
        // $result['next'] = $result['next_page_url'];
        // unset($result['data']);

        $new = $result;
        // return $result;
        return ReviewResource::collection($new);

        // dd($result);



    }
}
