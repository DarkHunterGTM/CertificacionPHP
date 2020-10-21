<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cui', 15)->required();
            $table->string('nombre', 200)->required();
            $table->string('telefono', 9)->required();
            $table->string('genero', 25)->required();
            $table->string('direccion', 200)->required();
            $table->string('carnet', 25)->required();


            $table->unsignedInteger('municipioId')->nullable();
            $table->foreign('municipioId')->references('id')->on('municipio')->onDelete('cascade');

            $table->unsignedInteger('estadoId')->nullable();
            $table->foreign('estadoId')->references('id')->on('estado')->onDelete('cascade');

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
        Schema::dropIfExists('estudiante');
    }
}
