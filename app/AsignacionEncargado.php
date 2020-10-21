<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionEncargado extends Model
{
  protected $table = "asignacion_encargado";

  protected $fillable = [
    'id',
    'rol',
    'personaId',
    'estudianteId',
  ];
}
