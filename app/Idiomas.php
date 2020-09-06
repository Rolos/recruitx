<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiomas extends Model
{
    protected $table = 'idiomas';

    protected $fillable = [
        'nombre', 'estado'
    ];
}
