<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class FaqCategoryResource extends JsonResource
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
            'title' => $this->title,

            'products_count' => $this->faq()->count()
         ];

    }
}
