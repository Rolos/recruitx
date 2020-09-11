<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NivelesCapacitaciones extends Model
{
    use SoftDeletes;

    protected $table = 'niveles_capacitaciones';

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function capacitaciones()
    {
        return $this->hasMany('App\Capacitaciones', 'nivel_id');
    }
}
