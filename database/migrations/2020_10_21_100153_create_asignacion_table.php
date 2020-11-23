<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('profesorId')->nullable();
            $table->foreign('profesorId')->references('id')->on('profesor')->onDelete('cascade');

            $table->unsignedInteger('materiaId')->nullable();
            $table->foreign('materiaId')->references('id')->on('materia')->onDelete('cascade');

            $table->unsignedInteger('cicloId')->nullable();
            $table->foreign('cicloId')->references('id')->on('ciclo')->onDelete('cascade');

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
        Schema::dropIfExists('asignacion');
    }
}
