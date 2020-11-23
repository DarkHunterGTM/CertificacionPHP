<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->required();
            $table->decimal('monto', 8, 2)->required();
            $table->string('descripcion', 50)->required();

            $table->unsignedInteger('tipoPagoId')->nullable();
            $table->foreign('tipoPagoId')->references('id')->on('tipoPago')->onDelete('cascade');

            $table->unsignedInteger('inscripcionId')->nullable();
            $table->foreign('inscripcionId')->references('id')->on('inscripcion')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago');
    }
}
