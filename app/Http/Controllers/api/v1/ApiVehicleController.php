<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleStoreRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Scheduling;
use Illuminate\Support\Str;
use App\Models\Vehicle;

class ApiVehicleController extends Controller
{

    public function store(VehicleStoreRequest $request)
    {
        if (!empty($request->id_vehiculo)) {
            $vehicle = Vehicle::find($request->id_vehiculo);
            if ($vehicle) {
                $vehicle->propietario = $request->propietario;
                $vehicle->email = $request->email;
                $vehicle->telefono = $request->telefono;
                $vehicle->id_marca = $request->id_marca;
                $vehicle->id_modelo = $request->id_modelo;
                $vehicle->save();
            }
        } else {
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
        }

        $scheduling = new Scheduling([
            'guid' => Str::uuid(),
            'autoriza_uso_datos' => 1,
            'id_vehiculo' => $vehicle->id,
            'placa' => $request->placa,
            'propietario' => $request->propietario,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'id_marca' => $request->id_marca,
            'id_modelo' => $request->id_modelo,
            'id_taller' => $request->id_taller,
            'id_tecnico' => $request->id_tecnico,
            'id_mantenimiento' => $request->id_mantenimiento,
            'id_correctivo' => $request->id_correctivo,
            'fecha_agenda' => $request->fecha_agenda,
            'hora_agenda' => $request->hora_agenda,
            'observacion' => $request->observacion,
        ]);
        $scheduling->save();

        $response = new VehicleResource($vehicle);

        return $this->successfulMessageShowOne($response);
    }

    public function getVehicleByPlate($code)
    {
        $response = [];
        if ($code) {
            $exist_vehicle = Vehicle::where('placa', $code)->exists();
            if (!$exist_vehicle) {
                return $this->showErrors('La placa no existe.', 202);
            }
            $vehicle = Vehicle::where('placa', $code)->first();
            $response = new VehicleResource($vehicle);
        }

        return $this->successfulMessageShowOne($response);
    }
}
