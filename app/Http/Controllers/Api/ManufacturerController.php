<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionResource;
use App\Region;

use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        $regions = Region::where('status',1)->withCount(['trips' => function ($query) {
                $query->withFilters();
            }])
            ->get();

        return RegionResource::collection($regions);
    }
}
