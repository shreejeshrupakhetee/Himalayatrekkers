<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class BlogCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //right side is database
        return [

            'name' => $this->name,
            'id' => $this->id,
            'products_count' => $this->posts()->count()
         ];

    }
}
