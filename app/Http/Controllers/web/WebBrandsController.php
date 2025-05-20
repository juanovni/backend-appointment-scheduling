<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Services\Brand\BrandService;
use Illuminate\Http\Request;

class WebBrandsController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $title = "Lista de Marcas";
        $brands = $this->brandService->getAll();

        return view('brands.index', compact('title', 'brands'));
    }

    public function store(BrandStoreRequest $request)
    {
        $this->brandService->create($request);

        return redirect()->route('brands.index')->with('success', 'Marca creada correctamente.');
    }

    public function edit($brand)
    {
        $brand = $this->brandService->edit($brand);
        if ($brand) return $brand;
    }

    public function update(Request $request)
    {
        $brand = $this->brandService->update($request);
        if ($brand) {
            return redirect()->route('brands.index')->with('success', 'Marca actualizado correctamente.');
        } else {
            return redirect()->route('brands.index')->with('error', 'Error al actaulizar el registro');
        }
    }
}
