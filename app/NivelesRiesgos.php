<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelesRiesgos extends Model
{
    protected $table = 'niveles_riesgos';

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function puestos()
    {
        return $this->hasMany('App\Puestos', 'nivel_riesgo_id');
    }
}
