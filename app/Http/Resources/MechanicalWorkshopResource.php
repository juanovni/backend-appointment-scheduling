<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MechanicalWorkshopResource extends JsonResource
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
            #'guid' => $this->guid,
            'nombre' => $this->nombre,
            'empresa' => $this->empresa,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'telefono' => $this->telefono,
            'estado' => (int)$this->estado,
            'mantenimientos' => BusinessWorkshopResource::collection($this->businessWorkshops)
        ];
    }
}
