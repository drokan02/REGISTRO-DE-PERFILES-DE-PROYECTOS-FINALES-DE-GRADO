<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesional_id')->unsigned();
            $table->integer('codigo_sis')->unsigned()->unique();
            $table->integer('cargahoraria_id')->unsigned();
            $table->integer('director_carrera')->unsigned()->unique()->nullable();
            $table->foreign('profesional_id')->references('id')->on('profesional')->onDelete('cascade');
            $table->foreign('cargahoraria_id')->references('id')->on('cargahoraria')->onDelete('cascade');
            $table->foreign('director_carrera')->references('id')->on('carrera')->onDelete('cascade');
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
        Schema::dropIfExists('docente');
    }
}
