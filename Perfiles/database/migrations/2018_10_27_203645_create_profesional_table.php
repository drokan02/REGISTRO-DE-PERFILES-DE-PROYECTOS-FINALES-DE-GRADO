<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ci_prof')->unsigned()->unique();
            $table->string('nombre_prof',50);
            $table->string('ap_pa_prof',50);
            $table->string('ap_ma_prof',50);
            $table->string('correo_prof',50)->nullable()->unique();
            $table->integer('telef_prof')->unsigned()->unique()->nullable();
            $table->string('direc_prof',50)->nullable();
            $table->integer('titulo_id')->unsigned();
            $table->foreign('titulo_id')->references('id')->on('titulo')->onDelete('cascade');
            $table->integer('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('cascade');
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
        Schema::dropIfExists('profesional');
    }
}
