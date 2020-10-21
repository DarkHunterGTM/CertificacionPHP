<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
  protected $table = "asignacion";

  protected $fillable = [
    'id',
    'profesorId',
    'cicloId',
    'materiaId',
  ];
}
