<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->increments('id');


            $table->unsignedInteger('estudianteId')->nullable();
            $table->foreign('estudianteId')->references('id')->on('estudiante')->onDelete('cascade');

            $table->unsignedInteger('gradoId')->nullable();
            $table->foreign('gradoId')->references('id')->on('grado')->onDelete('cascade');

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
        Schema::dropIfExists('inscripcion');
    }
}
