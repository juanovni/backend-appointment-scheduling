<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisorResource;
use App\Models\Advisor;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ApiAdvisorController extends Controller
{

    public function getAdvisorsByMechanicalWorkshop()
    {
        $advisors = QueryBuilder::for(Advisor::class)
            ->allowedFilters([
                AllowedFilter::exact('id_taller')
            ])
            ->get();

        $response = AdvisorResource::collection($advisors);

        return $this->successfulMessageShowAll($response);
    }
}
