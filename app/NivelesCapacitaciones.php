<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelesCapacitaciones extends Model
{
    protected $table = 'niveles_capacitaciones';

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function capacitaciones()
    {
        return $this->hasMany('App\Capacitaciones', 'nivel_id');
    }
}
