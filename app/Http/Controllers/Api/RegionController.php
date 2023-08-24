<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionResource;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::where('publish', '=', 1)
        ->where(function ($query)  {
            $query->where('country_id', 1);

        })->withCount(['trips' => function ($query) {
                $query->withFilters();
            }])
            ->get();

        // dd($regions);

        return RegionResource::collection($regions);
    }
}
