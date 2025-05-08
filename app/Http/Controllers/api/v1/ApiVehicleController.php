<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleStoreRequest;
use App\Http\Resources\VehicleResource;
use Illuminate\Support\Str;
use App\Models\Vehicle;

class ApiVehicleController extends Controller
{

    public function store(VehicleStoreRequest $request)
    {
        $vehicle = new Vehicle([
            'guid' => Str::uuid(),
            'placa' => $request->placa,
            'propietario' => $request->propietario,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'id_marca' => $request->id_marca,
            'id_modelo' => $request->id_modelo,
            'estado' => $request->estado,
        ]);

        $vehicle->save();
        $response = new VehicleResource($vehicle);

        return $this->successfulMessageShowOne($response);
    }

    public function getVehicleByPlate($code)
    {
        $vehicle = Vehicle::where('placa', $code)->first();
        $response = new VehicleResource($vehicle);

        return $this->successfulMessageShowOne($response);
    }
}
