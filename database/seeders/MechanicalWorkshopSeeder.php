<?php

namespace Database\Seeders;

use App\Models\BusinessWorkshop;
use App\Models\MechanicalWorkshop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MechanicalWorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = array(
            'Mantenimientos Correctivos',
            'Mantenimientos Preventivos',
            'Venta de Repuestos y Accesorios genuinos',
            'Venta de repuestos'
        );

        $mechanical_workshop_1 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER CUENCA TRADICIONALES',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'CUENCA',
            'direccion' => 'AV. ESPAÑA / 10-28 / FRANCISCO PIZARRO 1',
            'telefono' => '0991050600'
        ]);

        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_1->id
            ]);
        }

        $mechanical_workshop_2 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER EL DORADO',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'GUAYAQUIL',
            'direccion' => 'KM. 10 FRENTE MATICE VIA LA AURORA / KM10 / VIA LA AURORA CC DORADO',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Mantenimientos Preventivos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_2->id
            ]);
        }

        $mechanical_workshop_3 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER AMERICAS',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'GUAYAQUIL',
            'direccion' => 'MZ. 0109 SOL 5 GARZOTA IV / 0109 / MZ. 0109 SOL 05 - AMERICAS',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Mantenimientos Preventivos',
            'Venta de Repuestos y Accesorios genuinos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_3->id
            ]);
        }

        $mechanical_workshop_4 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER ORELLANA',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'GUAYAQUIL',
            'direccion' => ' LA HERRADURA / SOL 1 18 / TARQUI',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Mantenimientos Preventivos',
            'Venta de Repuestos y Accesorios genuinos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_4->id
            ]);
        }

        $mechanical_workshop_5 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER CARLOS JULIO AROSEMENA',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'GUAYAQUIL',
            'direccion' => 'AV. CARLOS JULIO AROSEMENA KM 2.5 S/N',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Venta de repuestos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_5->id
            ]);
        }

        #QUITO
        $mechanical_workshop_q1 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER MARIANA DE JESÚS',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'QUITO',
            'direccion' => 'AV. N32 MARIANA DE JESUS / OE3 283 / AV. AMERICA',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Venta de repuestos',
            'Venta de Repuestos y Accesorios genuinos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_q1->id
            ]);
        }
        $mechanical_workshop_q2 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER MARIANA DE JESÚS',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'QUITO',
            'direccion' => 'AV. N32 MARIANA DE JESUS / OE3 283 / AV. AMERICA',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Venta de repuestos',
            'Venta de Repuestos y Accesorios genuinos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_q2->id
            ]);
        }
        $mechanical_workshop_q3 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER MARIANA DE JESÚS',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'QUITO',
            'direccion' => 'AV. N32 MARIANA DE JESUS / OE3 283 / AV. AMERICA',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Venta de repuestos',
            'Venta de Repuestos y Accesorios genuinos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_q3->id
            ]);
        }
        $mechanical_workshop_q4 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER MARIANA DE JESÚS',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'QUITO',
            'direccion' => 'AV. N32 MARIANA DE JESUS / OE3 283 / AV. AMERICA',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Venta de repuestos',
            'Venta de Repuestos y Accesorios genuinos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_q4->id
            ]);
        }
        $mechanical_workshop_q5 = MechanicalWorkshop::create([
            'guid' => Str::uuid(),
            'nombre' => 'TALLER MARESA CENTER MARIANA DE JESÚS',
            'empresa' => 'DGMOTORS',
            'ciudad' => 'QUITO',
            'direccion' => 'AV. N32 MARIANA DE JESUS / OE3 283 / AV. AMERICA',
            'telefono' => '0991050600'
        ]);
        $items = array(
            'Mantenimientos Correctivos',
            'Venta de repuestos',
        );
        foreach ($items as $item) {
            BusinessWorkshop::create([
                'guid' => Str::uuid(),
                'nombre' => $item,
                'id_taller' => $mechanical_workshop_q5->id
            ]);
        }

    }
}
