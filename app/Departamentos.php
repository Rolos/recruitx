<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $table = 'departamentos';

    protected $fillable = [
        'descripcion', 'nombre'
    ];

    public function candidatos()
    {
        return $this->hasMany('App\Candidatos', 'departamento_id');
    }

    public function empleados()
    {
        return $this->hasMany('App\Empleados', 'departamento_id');
    }
}
