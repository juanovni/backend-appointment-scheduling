<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class ApiBrandController extends Controller
{

    public function getAllBrands()
    {
        $brands = Brand::where('estado', 1)
            ->orderBy('nombre', 'ASC')->get();

        $response = BrandResource::collection($brands);

        return $this->successfulMessageShowAll($response);
    }
}
