<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class diseasesSignsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return[
            'disease_id'=>$this->disease_id,
            'sign_id'=>$this->sign_id,
            'updated_by'=>$this->updated_by,

        ];
    }
}
