<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
    use SoftDeletes;

    protected $table = 'empleados';

    protected $fillable = [
        'cedula', 'nombre', 'fecha_ingreso', 'departamento_id', 'puesto_id', 'candidato_id', 'salario_mensual', 'estado'
    ];

    public function departamento()
    {
        return $this->belongsTo('App\Departamentos', 'departamento_id');
    }

    public function puesto()
    {
        return $this->belongsTo('App\Puestos', 'puesto_id');
    }
}
