<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Facades\Voyager;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //nepal page ko filter resouce
        return [
            'id' => $this->id,
            'name' => $this->title,
            'slug' => $this->slug,
            'region' => $this->compute($this->regionId),
            'price' => $this->price,
            'discount' => $this->discount,
            'image' => Voyager::image($this->thumbnail('cropped')),
            'tripgrade' => $this->tripgrade,
            'tripdays' => $this->duration,

            'tags' => $this->activity



        ];
    }
    public function compute($value)
    {
        if($value == null){
            return 0;
        } else {
          return  $value->title;
        }
    }
}
