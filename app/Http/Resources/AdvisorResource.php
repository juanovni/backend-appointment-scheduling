<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvisorResource extends JsonResource
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
            'id' => $this->id,
            'guid' => $this->guid,
            'nombre' => $this->nombre,
            //'taller' => MechanicalWorkshopResource::collection($this->mechanicalWorkshop),
            'estado' => (int)$this->estado,
        ];
    }
}
