<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->title,
            'products_count' => $this->trips()->where('publish', 1)
            ->where(function ($query) use ($request) {
                $query->where('country_id', $request->id);

            })->count()
        ];
    }
}
