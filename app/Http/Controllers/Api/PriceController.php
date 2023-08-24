<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Post;
use App\Services\PriceService;
use App\Services\DiffService;
use App\Activity;
use App\Trip;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index($id,PriceService $priceService)
    {
        $prices = $priceService->getPrices($id);

        return response()->json($prices);
    }
    public function mc(PriceService $priceService)
    {
        $prices = $priceService->getmPrices();

        return response()->json($prices);
    }

    public function diff($id,DiffService $diffService)
    {
        $diff = $diffService->getDiff($id);

        return response()->json($diff);
    }

    public function mdiff(DiffService $diffService)
    {
        $diff = $diffService->getmDiff();

        return response()->json($diff);
    }




    public function raju($id)
    {
        // return "i am called";
        $prices = $this->activityPrices($id);

        return response()->json($prices);
    }





    //activity prices

    public function activityPrices($id)
    {
        $prices = [];





        foreach(Trip::PRICES as $index => $name) {
        $day_hike = Activity::where('id', $id)->first();

            $prices[] = [
                'name' => $name,
                'products_count' => $this->getmProductCount($index,$day_hike)
            ];
        }

        return $prices;

    }
    private function getmProductCount($index,$day_hike)
    {
        return $day_hike->trips()->withmFilters()
            ->when($index == 0, function ($query) {
                $query->where('price', '<', '500');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('price', ['500', '1500']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('price', ['1500', '2500']);
            })
            ->when($index == 3, function ($query) {
                $query->where('price', '>', '2500');
            })
            ->count();
    }
}
