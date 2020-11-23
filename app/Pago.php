<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $table = "pago";

  protected $fillable = [
    'id',
    'fecha',
    'monto',
    'descripcion',
    'tipoPagoId',
    'inscripcionId',
  ];
}
