<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamentos extends Model
{
    use SoftDeletes;

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
