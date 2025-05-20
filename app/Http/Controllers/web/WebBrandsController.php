<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\Brand\BrandService;

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
}
