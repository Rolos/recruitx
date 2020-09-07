<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puestos extends Model
{
    protected $table = 'puestos';

    protected $fillable = [
        'nombre', 'nivel_riesgo', 'salario_minimo', 'salario_maximo', 'estado'
    ];

    public function empleados()
    {
        return $this->hasMany('App\Empleados', 'puesto_id');
    }

    public function candidatos()
    {
        return $this->belongsToMany('App\Candidatos', 'candidatos_puestos', 'puesto_id', 'candidato_id');
    }
}
