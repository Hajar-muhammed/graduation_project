<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiseaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [ 
            "id"=>$this->id,
            "name"=>$this->name,
            "img"=> asset('storage')."/". $this->img,
            "intro"=>$this->intro,
            "symptoms"=>$this->Symptoms,
            "reasons"=>$this->reasons,
            "protection"=>$this->protection,
            "treatment"=>$this->treatment
        ];
    }
}
