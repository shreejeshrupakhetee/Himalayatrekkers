<?php

namespace App;

use App\Trip;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

trait ModelFinder
{

    public function getBudgetTreks($key)
    {
        return Cache::remember("'first.$key'", Carbon::parse('5 days'), function () {

            $get = ['id','type', 'title', 'duration', 'price', 'image', 'slug', 'discount'];
             return Trip::with('reviews')->where('type', 'BUDGET')->limit(16)->orderBy('title', 'ASC')->get($get);

        });



    }
    public function getMotorbikeTours($key)
    {
        return Cache::remember("'first.$key'", Carbon::parse('5 days'), function () {

            $get = ['id', 'type', 'title', 'duration', 'price', 'image', 'slug', 'discount'];
            return Trip::with('reviews')->where('type', 'MOTORBIKE')->limit(16)->orderBy('title', 'ASC')->get($get);
        });



    }
    public function getMountainbikeTours($key)
    {
        return Cache::remember("'first.$key'", Carbon::parse('5 days'), function () {

            $get = ['id', 'type', 'title', 'duration', 'price', 'image', 'slug', 'discount'];
            return Trip::with('reviews')->where('type', 'MOUNTAINBIKE')->limit(16)->orderBy('title', 'ASC')->get($get);
        });



    }

    public function getTrendingBlogs()
    {
        return Blog::where('is_trending', '=', 1)->get();
    }






    public function getActivities()
    {
        return Cache::remember('activity.getactivity', 1440, function () {

            return Tag::all('image', 'slug', 'content', 'tag');
        });
    }


    public function getCountries()
    {
        return Cache::remember('activity.getcountry', 1440, function () {

            return Country::all('image', 'content', 'title');
        });
    }
}
