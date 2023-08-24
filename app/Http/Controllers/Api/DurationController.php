<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Trip;
use App\Services\DurationService;
use App\Activity;
use Illuminate\Http\Request;

class DurationController extends Controller
{
    public function index($id,DurationService $durationService)
    {
        $durations = $durationService->getdurations($id);

        return response()->json($durations);
    }
    public function mc(DurationService $durationService)
    {
        $durations = $durationService->getmdurations();

        return response()->json($durations);
    }



    public function kaju($id)
    {
        // return "i am called";
        $prices = $this->activityDurations($id);

        return response()->json($prices);
    }





    //activity prices

    public function activityDurations($id)
    {

        $durations = [];

        foreach(Trip::DURATIONS as $index => $name) {
            $day_hike = Activity::where(['publish'=>1,'id'=> $id])->first();
            $durations[] = [
                'name' => $name,
                'products_count' => $this->getmProductCount($index,$day_hike)
            ];
        }

        return $durations;

    }
    private function getmProductCount($index,$day_hike)
    {
        return $day_hike->trips()->where('publish',1)->withmFilters()
        ->when($index == 0, function ($query) {
            $query->where('duration', '<=', '5');
        })
        ->when($index == 1, function ($query) {
            $query->whereBetween('duration', ['6', '10']);
        })
        ->when($index == 2, function ($query) {
            $query->whereBetween('duration', ['11', '15']);
        })
        ->when($index == 3, function ($query) {
            $query->whereBetween('duration', ['16', '24']);
        })
        ->when($index == 4, function ($query) {
            $query->where('duration', '>=', '24');
        })
        ->count();
    }


}
