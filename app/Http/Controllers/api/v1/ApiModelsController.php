<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ModelResource;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Support\Str;

class ApiModelsController extends Controller
{

    public function getAllModels()
    {
        $models = CarModel::where('estado', 1)
            ->orderBy('nombre', 'ASC')->get();

        $response = ModelResource::collection($models);

        return $this->successfulMessageShowAll($response);
    }

    public function store(Request $request)
    {
        $model = new CarModel([
            'guid' => Str::uuid(),
            'nombre' => $request->nombre,
            'id_marca' => $request->id_marca,
            'estado' => $request->estado,
        ]);

        $model->save();
        $response = new ModelResource($model);

        return $this->successfulMessageShowOne($response);
    }

    public function getModelsByBrand(Brand $brand)
    {
        $models = CarModel::where('id_marca', $brand->id)
            ->where('estado', 1)
            ->orderBy('nombre', 'ASC')->get();

        $response = ModelResource::collection($models);

        return $this->successfulMessageShowAll($response);
    }
}
