<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Product
 *
 * @package App\Http\Resources
 *
 * @property int $id
 * @property string $name
 * @property float $price
 */
class Post extends JsonResource
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
            'title' => $this->title,
            'price1' => $this->price,
            'destimage' => $this->image,
            'tripdays' => $this->tripdays,
            'activity_level' => $this->activity_level,
            'country_id' => $this->country_id,
            'slug' => $this->slug,
            'alt' => $this->highest_point,
            // 'edit_url' => route('product.edit', $this->id),
            // 'destroy_url' => route('product.destroy', $this->id),
        ];
    }
}
