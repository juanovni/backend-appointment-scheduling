<?php

namespace Database\Seeders;

use App\Models\Advisor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advisor::create([
            'guid' => Str::uuid(),
            'id_taller' => 1,
            'nombre' => "Luis Veloz Murillo"
        ]);
        Advisor::create([
            'guid' => Str::uuid(),
            'id_taller' => 1,
            'nombre' => "Carlos Vera"
        ]);

        Advisor::create([
            'guid' => Str::uuid(),
            'id_taller' => 2,
            'nombre' => "Juan Luis Loor Vera"
        ]);
        Advisor::create([
            'guid' => Str::uuid(),
            'id_taller' => 3,
            'nombre' => "Gabriel Loor Murillo"
        ]);
    }
}
