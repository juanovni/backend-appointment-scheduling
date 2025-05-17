<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MechanicalWorkshopResource;
use App\Models\MechanicalWorkshop;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MechanicalWorkshopController extends Controller
{

    public function index()
    {
        $mechanical_workshops = MechanicalWorkshop::all();

        $mechanical_workshops = QueryBuilder::for(MechanicalWorkshop::class)
            ->allowedFilters([
                AllowedFilter::exact('ciudad')
            ])
            ->get();

        $response = MechanicalWorkshopResource::collection($mechanical_workshops);

        return $this->successfulMessageShowAll($response);
    }
}
