<?php

namespace App\Http\Controllers\Api;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\BhutanCategoryResource;
use App\Http\Resources\McCategoryResource;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function mc($id = null)
    {
        $categories = Activity::withCount(['trips' => function ($query) {
            $query->withFilters();
        }])
        ->get();
        // dd($categories);
        return $raju = McCategoryResource::collection($categories,$id);
    }
    public function index($id)
    {
        $categories = Activity::withCount(['trips' => function ($query) {
                $query->where('publish', 1)->withFilters();
            }])
            ->get();
            // dd($categories);


        return $raju = CategoryResource::collection($categories,$id);
        // dd($raju);
    }

}
