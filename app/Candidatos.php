<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatos extends Model
{
    protected $table = 'candidatos';

    protected $fillable = [
        'cedula', 'nombre', 'puesto_al_que_aspira_id', 'departamento_id', 'salario_al_que_aspira', 'recomendado_por'
    ];

    public function puestoAlQueAspira()
    {
        return $this->belongsTo('App\Puestos', 'puesto_al_que_aspira_id');
    }

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
        return $this->belongsToMany('App\Competencias', ' competencias_candidatos', 'candidato_id', 'competencia_id');
    }

    public function capacitaciones()
    {
        return $this->belongsToMany('App\Capacitaciones', ' capacitaciones_candidatos', 'candidato_id', 'capacitacion_id');
    }
}
