<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MechanicalWorkshopResource;
use App\Models\MechanicalWorkshop;

class MechanicalWorkshopController extends Controller
{

    public function index()
    {
        $mechanical_workshops = MechanicalWorkshop::all();
        $response = MechanicalWorkshopResource::collection($mechanical_workshops);

        return $this->successfulMessageShowAll($response);
    }
}
