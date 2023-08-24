<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Facades\Voyager;

class SliderResource extends JsonResource
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
            'id' => $this->id,
            'image' => Voyager::image($this->image),
            'link' => $this->link,
            'desc' => $this->description,


        ];

    }
}
