<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 5000; $i <= 55000; $i += 5000) {
            Maintenance::create([
                'guid' => Str::uuid(),
                'nombre' => $i,
            ]);
        }
    }
}
