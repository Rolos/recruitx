<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacitaciones extends Model
{
    protected $table = 'capacitaciones';

    protected $fillable = [
        'descripcion', 'nivel_id', 'fecha_desde', 'fecha_hasta', 'institucion'
    ];

    public function nivel()
    {
        return $this->belongsTo('App\NivelesCapacitaciones', 'nivel_id');
    }

    public function candidatos()
    {
        return $this->belongsToMany('App\Candidatos', ' capacitaciones_candidatos', 'capacitacion_id', 'candidato_id');
    }
}
