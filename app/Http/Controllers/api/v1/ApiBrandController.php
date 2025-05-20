<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Services\Brand\BrandService;
use Illuminate\Http\Request;

class ApiBrandController extends Controller
{

    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function getAllBrands()
    {
        $brands = $this->brandService->getAll();
        $response = BrandResource::collection($brands);

        return $this->successfulMessageShowAll($response);
    }

    public function createBrand(Request $request)
    {
        $brands = $this->brandService->create($request);
        $response = BrandResource::collection($brands);

        return $this->successfulMessageShowAll($response);
    }
}
