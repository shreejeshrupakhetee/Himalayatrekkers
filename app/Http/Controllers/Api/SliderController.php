<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('publish',1)->get();

// dd($sliders);
        return $raju = SliderResource::collection($sliders);
        // dd($raju);
    }

}
