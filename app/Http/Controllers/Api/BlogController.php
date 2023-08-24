<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogCategoryResource;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::withFilters()->get();

// dd($blogs);
        return $raju = BlogResource::collection($blogs);
        // dd($raju);
    }
    public function categories()
    {
        // $categories = Category::all();
        // return $raju = BlogCategoryResource::collection($categories);
        $categories = Category::withCount(['posts' => function ($query) {
            $query->withFilters();
        }])
        ->get();
        return $raju = BlogCategoryResource::collection($categories);

    }
}
