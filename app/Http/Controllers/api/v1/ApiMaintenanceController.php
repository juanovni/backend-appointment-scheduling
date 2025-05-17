<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaintenanceResource;
use App\Models\Maintenance;

class ApiMaintenanceController extends Controller
{

    public function getMaintenance()
    {
        $services = Maintenance::where('estado', 1)
            ->orderBy('id', 'ASC')->get();

        $response = MaintenanceResource::collection($services);

        return $this->successfulMessageShowAll($response);
    }
}
