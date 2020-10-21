<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionEncargadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_encargado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rol', 25)->required();

            $table->unsignedInteger('personaId')->nullable();
            $table->foreign('personaId')->references('id')->on('persona')->onDelete('cascade');

            $table->unsignedInteger('estudianteId')->nullable();
            $table->foreign('estudianteId')->references('id')->on('estudiante')->onDelete('cascade');

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
        Schema::dropIfExists('asignacion_encargado');
    }
}
