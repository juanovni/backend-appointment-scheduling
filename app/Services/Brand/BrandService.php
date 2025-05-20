<?php

namespace App\Services\Brand;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandService
{
    public function getAll()
    {
        $brands = Brand::orderBy('nombre', 'ASC')->get();

        return $brands;
    }

    public function create(Request $request)
    {
        $brand = new Brand([
            'guid' => Str::uuid(),
            'nombre' => $request->nombre,
            'estado' => $request->estado,
        ]);

        $brand->save();

        return $brand;
    }
}
