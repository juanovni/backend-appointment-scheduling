<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'placa' => $this->placa,
            'propietario' => $this->propietario,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'marca' => new BrandResource($this->brand),
            'modelo' => new ModelResource($this->carmodel),
            'estado' => (int)$this->estado,
        ];
    }
}
