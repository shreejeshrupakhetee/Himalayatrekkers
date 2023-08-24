<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;


class BlogResource extends JsonResource
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

            'title' => $this->title,
            'path' => $this->slug,

        ];

    }
}
