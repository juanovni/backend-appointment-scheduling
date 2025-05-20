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

    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();

        return $brand;
    }

    public function update(Request $request)
    {
        $brand = Brand::where('id', $request->brand_id)->first();
        if ($brand) {
            $brand->nombre = $request->edit_nombre;
            $brand->estado = $request->edit_estado;
            $brand->save();
        }
        return $brand;
    }
}
