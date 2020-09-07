<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatos extends Model
{
    protected $table = 'candidatos';

    protected $fillable = [
        'cedula', 'nombre', 'departamento_id', 'salario_al_que_aspira', 'recomendado_por'
    ];

    public function departamento()
    {
        return $this->belongsTo('App\Departamentos', 'departamento_id');
    }

    public function experienciaLaboral()
    {
        return $this->hasMany('App\ExperienciaLaboral', 'candidato_id');
    }

    public function competencias()
    {
        return $this->belongsToMany('App\Competencias', 'competencias_candidatos', 'candidato_id', 'competencia_id');
    }

    public function capacitaciones()
    {
        return $this->belongsToMany('App\Capacitaciones', 'capacitaciones_candidatos', 'candidato_id', 'capacitacion_id');
    }

    public function idiomas()
    {
        return $this->belongsToMany('App\Idiomas', 'candidatos_idiomas', 'candidato_id', 'idioma_id');
    }

    public function puestos()
    {
        return $this->belongsToMany('App\Puestos', 'candidatos_puestos', 'candidato_id', 'puesto_id');
    }
}
