<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
  protected $table = "inscripcion";

  protected $fillable = [
    'id',
    'estudianteId',
    'gradoId',
  ];
}
