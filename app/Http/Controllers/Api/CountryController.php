<?php

namespace App\Http\Controllers\Api;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    public function index($id)
    {

        // $dayhikes = Activity::find($id);
        // $countries = $dayhikes->withCount(['trips' => function ($query) {
        //     $query->withFilters();
        // }])
        // ->get();

        // dd($countries);

        return Cache::remember('countries', Carbon::parse('10 minutes'), function () use ($id) {
            $countries = Country::withCount(['trips' => function ($query) {
                $query->withmFilters();
            }])
            ->get();
            return $raju = CountryResource::collection($countries,$id);
        });



        // dd($raju);
    }
}
