<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicalWorkshop extends Model
{
    use HasFactory;

    protected $table = 'age_talleres';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'guid',
        'nombre',
        'empresa',
        'direccion',
        'ciudad',
        'telefono',
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

    public function businessWorkshops()
    {
        return $this->hasMany(BusinessWorkshop::class, 'id_taller');
    }

}
