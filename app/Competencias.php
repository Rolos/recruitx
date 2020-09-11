<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competencias extends Model
{
    use SoftDeletes;

    protected $table = 'competencias';

    protected $fillable = [
        'descripcion', 'estado'
    ];

    public function candidatos()
    {
        return $this->belongsToMany('App\Candidatos', ' competencias_candidatos', 'competencia_id', 'candidato_id');
    }
}
