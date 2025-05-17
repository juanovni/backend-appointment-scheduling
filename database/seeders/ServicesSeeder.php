<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::create([
            'guid' => Str::uuid(),
            'nombre' =>   "Cambio de aceite"
        ]);
        Services::create([
            'guid' => Str::uuid(),
            'nombre' => "Alineación y balanceo",
        ]);
        Services::create([
            'guid' => Str::uuid(),
            'nombre' => "Revisión general",

        ]);
        Services::create([
            'guid' => Str::uuid(),
            'nombre' => "Diagnóstico electrónico",

        ]);
        Services::create([
            'guid' => Str::uuid(),
            'nombre' =>  "Cambio de frenos"
        ]);
    }
}
