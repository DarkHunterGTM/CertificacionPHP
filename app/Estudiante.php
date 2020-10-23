<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $table = "estudiante";

  protected $fillable = [
    'id',
    'cui',
    'nombre',
    'telefono',
    'genero',
    'direccion',
    'carnet',
    'estadoId',
  ];
}
