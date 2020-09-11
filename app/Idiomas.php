<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idiomas extends Model
{
    use SoftDeletes;

    protected $table = 'idiomas';

    protected $fillable = [
        'nombre', 'estado'
    ];
}
