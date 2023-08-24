<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //right side is database/model
        return [
            'id' => $this->id,
            'name' => $this->title,
            'image' => $this->icon,
            'products_count' => $this->trips()->withCount('activity')->first()
        ];
    }
}
