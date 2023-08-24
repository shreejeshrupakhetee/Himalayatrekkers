<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->title,
            'products_count' => $this->trips()->where('publish', '=', 1)
            ->where(function ($query)  {
                $query->where('country_id', 1);

            })->count()
        ];
    }
}

