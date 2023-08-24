<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SearchResource;
use App\Activity;
use App\Trip;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function mc()
    {
        $products = Trip::where('publish', '=', 1)
        ->where(function ($query) {
            $query->where('country_id', '>=',5);

        })
        ->with([
            'regionId',
            'activityId' => function ($q) {
                $q->select('activity_trip_pivot.id','title');
            },
        ])->withFilters()->get();
        // dd($products);
        return ProductResource::collection($products);
    }



    public function index(Request $request,$id)
    {
        if($request->has('asc')){
            $products = Trip::where('publish', '=', 1)
            ->orderBy('title','asc')
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
        ])->get();
        // $products = $products->paginate(12);
        // $products->appends($request->all());

        return ProductResource::collection($products);
        }
      $products = Trip::where('publish', '=', 1)
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
        ])->paginate(12);

        return ProductResource::collection($products);
    }

    public function frontsearch($id)
    {
        if (request()->q == '') {
            return redirect()->back();
        }
        $products = Trip::where('title', 'LIKE', '%' . request()->q . '%')
                ->distinct()->where(function ($query) use ($id) {
            $query->where('country_id', $id);

        })->withFilters()
        ->with([
            'regionId' => function ($q) {
                $q->select('id','title');
            },
            'activity' => function ($q) {
                $q->select('activity_trip_pivot.id','title');
            },
            ])->paginate(12);

        return ProductResource::collection($products);
    }


    public function bhutan()
    {

        // $products = Post::withFilters()->paginate(9);
        $products = Trip::where('country_id','=', '2')->with([
            'reviews',
            'tripgrade',
            'showcaseone',
            'tags' => function ($q) {
                $q->select('post_tag.id','tag','icon');
            },

        ])->withFilters()->get();


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
        $products = Trip::where('publish', '=', 1)
        ->get(['title','slug']);
        return SearchResource::collection($products);
    }
}
