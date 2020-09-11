<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienciaLaboral extends Model
{
    use SoftDeletes;

    protected $table = 'experiencia_laboral';

    protected $fillable = [
        'candidato_id', 'empresa', 'puesto_ocupado_id', 'fecha_desde', 'fecha_hasta', 'salario'
    ];

    public function candidato()
    {
        return $this->belongsTo('App\Candidatos', 'candidato_id');
    }

    public function puesto()
    {
        return $this->belongsTo('App\Puestos', 'puesto_ocupado_id');
    }
}
