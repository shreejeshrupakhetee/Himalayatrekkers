<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BhutanCategoryResource extends JsonResource
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
            'name' => $this->tag,
            'image' => $this->svg,
            'products_count' => $this->posts()->where('country_id', 2)->count()
        ];
    }
}
