<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;

    protected $table = 'age_agendamientos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'guid',
        'autoriza_uso_datos',
        'id_vehiculo',
        'placa',
        'propetario',
        'telefono',
        'email',
        'id_marca',
        'id_modelo',
        'id_taller',
        'id_tecnico',
        'id_mantenimiento',
        'id_correctivo',
        'fecha_agenda',
        'hora_agenda',
        'observacion',
        'estado'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function carmodel()
    {
        return $this->belongsTo(CarModel::class, 'id_modelo');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_marca');
    }
}
