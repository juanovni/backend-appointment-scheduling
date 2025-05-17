<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Services;

class ApiServicesController extends Controller
{

    public function getServices()
    {
        $services = Services::where('estado', 1)
            ->orderBy('nombre', 'ASC')->get();

        $response = ServiceResource::collection($services);

        return $this->successfulMessageShowAll($response);
    }
}
