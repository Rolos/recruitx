<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Puestos extends Model
{
    use SoftDeletes;

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
