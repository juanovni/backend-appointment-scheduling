<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'age_vehiculos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'guid',
        'placa',
        'propietario',
        'email',
        'telefono',
        'id_marca',
        'id_modelo',
        'estado',
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
