<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ageGroupTreatmentResource extends JsonResource
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
            'ageGroup_id'=>$this->ageGroup,
            'treatment_id'=>$this->treatment,
            'updated_by'=>$this->updated_by
        ];
    }
}
