<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";

    protected $fillable = [
      'id',
      'nombre',
      'apellido',
      'direccion',
      'telefono',
      'dpi',
      'genero',
    ];
}
