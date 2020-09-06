<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    protected $table = 'competencias';

    protected $fillable = [
        'descripcion', 'estado'
    ];

    public function candidatos()
    {
        return $this->belongsToMany('App\Candidatos', ' competencias_candidatos', 'competencia_id', 'candidato_id');
    }
}
