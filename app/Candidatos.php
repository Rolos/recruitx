<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidatos extends Model
{
    use SoftDeletes;

    protected $table = 'candidatos';

    protected $fillable = [
        'cedula', 'nombre', 'telefono', 'departamento_id', 'salario_al_que_aspira', 'recomendado_por', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
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

    public function scopeCedula($query, $request)
    {
        if ($request->has('cedula') && !empty($request->get('cedula'))) {
            return $query->where('cedula', 'like', '%'. $request->get('cedula') . '%');
        }
        return $query;
    }

    public function scopeNombre($query, $request)
    {
        if ($request->has('nombre') && !empty($request->get('nombre'))) {
            return $query->where('nombre', 'like', '%'. $request->get('nombre') . '%');
        }
        return $query;
    }

    public function scopeTelefono($query, $request)
    {
        if ($request->has('telefono') && !empty($request->get('telefono'))) {
            return $query->where('telefono', 'like', '%'. $request->get('telefono') . '%');
        }
        return $query;
    }

    public function scopeDepartamentos($query, $request)
    {
        if ($request->has('departamentos') && !empty($request->get('departamentos'))) {
            $query->whereIn('departamento_id', $request->get('departamentos'));
        }
        return $query;
    }

    public function scopePuestos($query, $request)
    {
        if ($request->has('puestos') && !empty($request->get('puestos'))) {
            return $query->whereHas('puestos', function ($query) use($request) {
                $query->whereIn('puestos.id', $request->get('puestos'));
            });
        }
        return $query;
    }

    public function scopeCapacitaciones($query, $request)
    {
        if ($request->has('capacitaciones') && !empty($request->get('capacitaciones'))) {
            return $query->whereHas('capacitaciones', function ($query) use($request) {
                $query->whereIn('capacitaciones.id', $request->get('capacitaciones'));
            });
        }
        return $query;
    }

    public function scopeCompetencias($query, $request)
    {
        if ($request->has('competencias') && !empty($request->get('competencias'))) {
            return $query->whereHas('competencias', function ($query) use($request) {
                $query->whereIn('competencias.id', $request->get('competencias'));
            });
        }
        return $query;
    }
    public function scopeIdiomas($query, $request)
    {
        if ($request->has('idiomas') && !empty($request->get('idiomas'))) {
            return $query->whereHas('idiomas', function ($query) use($request) {
                $query->whereIn('idiomas.id', $request->get('idiomas'));
            });
        }
        return $query;
    }
}
