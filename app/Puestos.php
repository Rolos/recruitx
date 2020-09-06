<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puestos extends Model
{
    protected $table = 'puestos';

    protected $fillable = [
        'nombre', 'nivel_riesgo_id', 'salario_minimo', 'salario_maximo', 'estado'
    ];

    public function nivelesDeRiesgo()
    {
        return $this->belongsTo('App\NivelesRiesgos', 'nivel_riesgo_id');
    }

    public function candidatos()
    {
        return $this->hasMany('App\Candidatos', 'puesto_al_que_aspira_id');
    }

    public function empleados()
    {
        return $this->hasMany('App\Empleados', 'puesto_id');
    }
}